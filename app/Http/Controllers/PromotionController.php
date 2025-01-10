<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use App\Models\Business;
use App\Models\Promotion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class PromotionController extends Controller
{


    public function store(Request $r, Business $business, Branch $branch) 
    {
        Gate::authorize('author', $business);

        if($branch->promotions()->count() > 0 || $branch->status != 'aprobado'){
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

        $data['image'] = basename($r->file('image')->store('public/promotions'));


        $data['slug'] = Str::slug($data['title']) . now();

        $data['category_id'] = $data['category'];

        $data['longitude'] = $branch->longitude;

        $data['latitude'] = $branch->latitude;


        $branch->promotions()->create($data);
        
        return to_route('businesses.show', $business);
    }

    public function update(Request $r, Business $business, Branch $branch, Promotion $promotion) 
    {
        Gate::authorize('author', $business);

        if($branch->status != 'aprobado'){
            return abort(401);
        }

        $data = $r->validate([
            'category' => 'required|integer|exists:categories,id',
            'title' => 'required|string|max:50',
            'image' => 'nullable|image|mimes:jpg,svg,png,webp|max:5120',
            'description' => 'required|max:500|string',
            'start_date' => 'required|date|before_or_equal:end_date',
            'end_date' => 'required|date|after_or_equal:start_date',
        ]);

        if($r->hasFile('image')){
            Storage::disk('promotions')->delete($promotion->image);

            $data['image'] = basename($r->file('image')->store('public/promotions'));
        }

        $data['image'] = $data['image'] ?? $promotion->image;

        $data['category_id'] = $data['category'];


        $promotion->update($data);
        
        return to_route('businesses.show', $business);
    }



    public function destroy(Business $business, Branch $branch, Promotion $promotion) {
        Gate::authorize('author', $business);

        Storage::disk('promotions')->delete($promotion->image);

        $promotion->delete();

        return to_route('businesses.show', $business);
    }
}
