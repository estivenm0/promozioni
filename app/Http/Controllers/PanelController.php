<?php

namespace App\Http\Controllers;

use App\Models\Business;
use App\Models\Category;
use App\Models\Promotion;
use App\Models\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Inertia\Inertia;

class PanelController extends Controller
{
    public function indexBusiness(Request $r)
    {
        return Inertia::render('Panel', [
            'businesses' => $r->user()->businesses()
                ->withCount('promotions')
                ->with('types')
                ->get(),
        ]);
    }

    public function createBusiness()
    {
        return Inertia::render('FBusinesses', [
            'types' => Type::all(),
        ]);
    }

    public function storeBusiness(Request $r)
    {
        $data = $r->validate([
            'name' => 'required|string|max:100|unique:businesses,name',
            'address' => 'required|string|max:255',
            'latitude' => 'required|numeric|between:-90,90',
            'longitude' => 'required|numeric|between:-180,180',
            'description' => 'required|string|max:250',
            'image' => 'required|image|mimes:jpg,svg,png,webp|max:5120',
            'email' => 'required|string|email|max:255',
            'phone' => 'required|string|max:255',
            'types' => 'required|array|min:1|max:3',
            'types.*' => 'exists:types,id|integer|distinct|required',
        ]);

        $data['image'] = basename($r->file('image')->store('businesses', 'public'));

        $business = $r->user()->businesses()->create($data);

        $business->types()->attach($data['types']);

        return to_route('panel');
    }

    public function editBusiness(Business $business)
    {
        Gate::authorize('author', $business);

        $business->load('types');

        return Inertia::render('FBusinesses', [
            'types' => Type::all(),
            'business' => $business,
        ]);
    }

    public function updateBusiness(Request $r, Business $business)
    {
        Gate::authorize('author', $business);

        $data = $r->validate([
            'name' => 'required|string|max:100|unique:businesses,name,'.$business->id,
            'description' => 'required|string|max:250',
            'latitude' => 'required|numeric|between:-90,90',
            'longitude' => 'required|numeric|between:-180,180',
            'image' => 'nullable|image|mimes:jpg,svg,png,webp|max:5120',
            'email' => 'required|string|email|max:255',
            'address' => 'required|string|max:250',
            'phone' => 'required|max:12',
            'types' => 'required|array|min:1|max:3',
            'types.*' => 'exists:types,id|integer|distinct|required',
        ]);

        if ($r->hasFile('image')) {
            Storage::disk('businesses')->delete($business->image ?? '');

            $data['image'] = basename($r->file('image')->store('businesses', 'public'));
        }

        $data['image'] = $data['image'] ?? $business->image;

        $business->update($data);

        $business->types()->sync($data['types']);

        return to_route('panel');
    }

    public function destroyBusiness(Business $business)
    {
        Gate::authorize('author', $business);

        // if ($business->image) {
        //     Storage::disk('businesses')->delete($business->image);
        // }

        $business->delete();

        return to_route('panel');
    }

    public function indexPromotion(Business $business)
    {
        Gate::authorize('author', $business);

        if ($business->status != 'aprobado') {
            return abort(401);
        }

        $business->load('promotions');

        return Inertia::render('indexPromotions', [
            'business' => $business,
        ]);
    }

    public function createPromotion(Business $business)
    {
        Gate::authorize('author', $business);

        if ($business->status != 'aprobado') {
            return abort(401);
        }

        return Inertia::render('FPromotions', [
            'business' => $business,
            'categories' => Category::all(),
        ]);
    }

    public function storePromotion(Request $r, Business $business)
    {
        Gate::authorize('author', $business);

        if ($business->promotions()->count() > 5 || $business->status != 'aprobado') {
            return abort(401);
        }

        $data = $r->validate([
            'category' => 'required|integer|exists:categories,id',
            'title' => 'required|string|max:50',
            'image' => 'required|image|mimes:jpg,svg,png,webp|max:5120',
            'description' => 'required|max:500|string',
            'start_date' => 'required|date|before_or_equal:end_date',
            'end_date' => 'required|date|after_or_equal:start_date',
        ]);

        $data['image'] = basename($r->file('image')->store('promotions', 'public'));

        $data['slug'] = Str::slug($data['title']).now();

        $data['category_id'] = $data['category'];

        $business->promotions()->create($data);

        return to_route('promotions.index', $business);
    }

    public function editPromotion(Business $business, Promotion $promotion)
    {
        Gate::authorize('author', $business);

        return Inertia::render('FPromotions', [
            'promotion' => $promotion,
            'business' => $business,
            'categories' => Category::all(),
        ]);
    }

    public function updatePromotion(Request $r, Business $business, Promotion $promotion)
    {
        Gate::authorize('author', $business);

        $data = $r->validate([
            'category' => 'required|integer|exists:categories,id',
            'title' => 'required|string|max:50',
            'image' => 'nullable|image|mimes:jpg,svg,png,webp|max:5120',
            'description' => 'required|max:500|string',
            'start_date' => 'required|date|before_or_equal:end_date',
            'end_date' => 'required|date|after_or_equal:start_date',
        ]);

        if ($r->hasFile('image')) {
            Storage::disk('promotions')->delete($promotion->image);

            $data['image'] = basename($r->file('image')->store('promotions', 'public'));
        }

        $data['image'] = $data['image'] ?? $promotion->image;

        $data['category_id'] = $data['category'];

        $promotion->update($data);

        return to_route('promotions.index', $business);
    }

    public function destroyPromotion(Business $business, Promotion $promotion)
    {
        Gate::authorize('author', $business);

        // Storage::disk('promotions')->delete($promotion->image);

        $promotion->delete();

        return to_route('promotions.index', $business);
    }
}
