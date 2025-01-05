<?php

namespace App\Http\Controllers;

use App\Http\Resources\BusinessResource;
use App\Models\Business;
use App\Models\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;
use Inertia\Inertia;

class BusinessController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $r)
    {
        $businesses = $r->user()->businesses()
                        ->select('name', 'image')
                        ->get();

        return Inertia::render('Businesses/Index', [
            'businesses' => $businesses
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('Businesses/Form', [
            'title' => 'Crear Negocio',
            'types' => Type::get() 
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $r)
    {
        $data = $r->validate([
            'name' => 'required|string|max:100|unique:businesses,name',
            'description' => 'required|string',
            'image' => 'required|image|mimes:jpg,svg,png,webp|max:5120',
            'email' => 'required|string|email|max:255',
            'phone' => 'required|string|max:255',
            'types' => 'required|array|min:1|max:4',
            'types.*' => 'exists:types,id|integer|distinct|required'
        ]);

        $data['image'] = basename($r->file('image')->store('public/businesses'));
        
        $business = $r->user()->businesses()->create($data);

        $business->types()->attach($data['types']);

        return to_route('businesses.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $name )
    {
        $business = Business::with('types')
                    ->whereName($name)->firstOrFail();

        Gate::authorize('author', $business);

        return Inertia::render('Businesses/Show', [
            'business' => $business,
            'branches' => $business->branches()->paginate(5),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Business $business)
    {
        Gate::authorize('author', $business);

        $typesB = $business->types()->pluck('id');

        return Inertia::render('Businesses/Form', [
            'title' => 'Editar Negocio',
            'types' => Type::get(),
            'typesBusiness' => $typesB,
            'business' => $business
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $r, Business $business)
    {
        Gate::authorize('author', $business);

        $data = $r->validate([
            'name' => 'required|string|max:100|unique:businesses,name,'.$business->id,
            'description' => 'required|string',
            'image' => 'sometimes',
            'email' => 'required|string|email|max:255',
            'phone' => 'required|string|max:255',
            'types' => 'required|array|min:1|max:4',
            'types.*' => 'exists:types,id|integer|distinct|required'
        ]);

        if($r->hasFile('image')){
            Storage::disk('businesses')->delete($business->image ?? '');

            $data['image'] = basename($r->file('image')->store('public/businesses'));
        }

        $data['image'] = $data['image'] ?? $business->image;

        $business->update($data);

        $business->types()->sync($data['types']);

        return to_route('businesses.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Business $business)
    {
        Gate::authorize('author', $business);

        if($business->image){
            Storage::disk('businesses')->delete($business->image);
        }

        $business->delete();

        return to_route('businesses.index');
    }
}
