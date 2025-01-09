<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use App\Models\Business;
use App\Models\Promotion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;

class PromotionController extends Controller
{


    public function store(Request $r) {
        $data = $r->validate([
            'category_id' => 'required|integer|exists:categories,id',
            'title' => 'required|string|max:50',
            'image' => 'required|image|mimes:jpg,svg,png,webp|max:5120',
            'description' => 'required|string',
            'start_date' => 'required|date|before_or_equal:end_date',
            'end_date' => 'required|date|after_or_equal:start_date',
        ]);

        $data['image'] = basename($r->file('image')->store('public/promotionns'));

        
        
    }

    public function destroy(Business $business, Branch $branch, Promotion $promotion) {
        Gate::authorize('author', $business);

        Storage::disk('promotions')->delete($promotion->image);

        $promotion->delete();

        return to_route('businesses.show', $business);
    }
}
