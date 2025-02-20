<?php

namespace App\Http\Controllers;

use App\Http\Resources\MapResource;
use App\Models\Business;
use App\Models\Category;
use App\Models\Rating;
use App\Services\MapService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class BusinessController extends Controller
{
    public function __construct(protected MapService $mapService) {}

    public function index(Request $rq)
    {
        $businesses = MapResource::collection($this->mapService->promotions($rq));

        return ['businesses' => $businesses];
    }

    public function categories()
    {
        return Category::all();
    }

    public function show(Business $business)
    {
        $business->load('promotions', 'types');

        return view('businesses.promotions', compact('business'));
    }

    public function ratings(Business $business)
    {
        $userId = auth()?->user()?->id;

        $can_rating = $userId
            ? ! Rating::where(['user_id' => $userId, 'business_id' => $business->id])->exists()
            : false;

        $ratings = $business->ratings()
            ->with('user:id,name')
            ->when($userId, function ($q) use ($userId) {
                $q->orderByRaw('user_id = ? DESC', $userId);
            })
            ->paginate($can_rating ? 8 : 12);

        return view('businesses.ratings', compact('business', 'ratings', 'can_rating'));
    }

    public function ratingStore(Request $r, Business $business)
    {
        $data = $r->validate([
            'comment' => 'nullable|max:200',
            'stars' => 'required|max:5|min:1|numeric|integer',
        ]);

        $r->user()->ratings()->create([
            'business_id' => $business->id,
            ...$data,
        ]);

        return redirect()->back();
    }

    public function ratingDelete(Rating $rating)
    {
        Gate::authorize('author', $rating);

        $rating->delete();

        return redirect()->back();
    }
}
