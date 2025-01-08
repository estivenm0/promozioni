<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use App\Models\Business;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Inertia\Inertia;

class BranchController extends Controller
{
 

    /**
     * Show the form for creating a new resource.
     */
    public function create(string $name, Request $r)
    {
        return Inertia::render('Branches/Form', [
            'title' => 'Crear Sucursal',
            'business' => $r->user()->businesses()->whereName($name)->firstOrFail()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $r, Business $business)
    {
        Gate::authorize('author', $business);
        $data = $r->validate([
            'name' => 'required|string|max:100|unique:branches,name',
            'address' => 'required|string|max:255',
            'latitude' => 'required|numeric|between:-90,90',
            'longitude' => 'required|numeric|between:-180,180',
        ]);

        $business->branches()->create($data);
        
        return to_route('businesses.show', $business);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Business $business, Branch $branch)
    {
        Gate::authorize('author', $business);
        
        return Inertia::render('Branches/Form', [
            'title' => 'Editar Sucursal',
            'business' => $business,
            'branch' => $branch
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
    public function destroy(Business $business, Branch $branch)
    {
        Gate::authorize('author', $business);

        $branch->delete();

        to_route('businesses.show', $business);

    }
}
