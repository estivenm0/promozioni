<?php

namespace App\Http\Controllers;

use App\Http\Resources\BusinessResource;
use App\Models\Type;
use Illuminate\Http\Request;
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
        $r->validate([
            'name' => 'required|string|max:100|unique:businesses,name',
            'description' => 'nullable|string',
            'image' => 'nullable|string|max:255',
            'email' => 'nullable|string|email|max:255',
            'phone' => 'nullable|string|max:255',
        ]);
        
    }

    /**
     * Display the specified resource.
     */
    public function show(string $name, Request $r)
    {
        $business = $r->user()->businesses()
                    ->with('types')
                    ->whereName($name)->firstOrFail();

        return Inertia::render('Businesses/Show', [
            'business' => $business,
            'branches' => $business->branches()->paginate(5),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $name, Request $r)
    {
        $business = $r->user()->businesses()
                    ->whereName($name)->firstOrFail();

        return Inertia::render('Businesses/Form', [
            'title' => 'Editar Negocio',
            'types' => Type::get(),
            'business' => $business
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $name, Request $r)
    {
        $r->user()->businesses()
            ->whereName($name)
            ->firstOrFail()->delete();

        return to_route('businesses.index');
    }
}
