<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use App\Models\Category;
use App\Models\Promotion;
use App\Models\Rating;
use App\Services\MapService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Gate;

class MapController extends Controller
{

    public function __construct(protected MapService $mapService) {}

    public function index()
    {
        return view('promotions.index');
    }

    public function promotions(Request $r)
    {
        $promos = $this->mapService->promotions($r);
        return ['promotions' => $promos];
    }

    public function categories()
    {
        $categories = Cache::remember('categories', '1000', function () {
            return Category::all();
        });
        return $categories;
    }

    public function promotion(Promotion $promotion)
    {
        return view('promotions.show', compact('promotion'));
    }

    public function branchPromotions(string $name)
    {
        $branch = Branch::with('business')
                    ->whereName($name)
                    ->firstOrFail();
        $promotions = $branch->promotions()->paginate(15);

        return view('branches.promotions', compact('branch', 'promotions'));
    }

    public function branchRatings(string $name)
    {
        $user_id = auth()?->user()?->id;

        $branch = Branch::with('business')
                    ->whereName($name)
                    ->firstOrFail();

        $ratings = $branch->ratings()
                    ->when($user_id, function ($q) use ($user_id) {
                        $q->orderByRaw('user_id = ? DESC', $user_id);
                    })
                    ->paginate(16);

        $can_rating = false;

        if ($user_id) {
            $can_rating = !Rating::whereUser_id($user_id)
                            ->whereBranch_id($branch->id)
                            ->exists();
        }

        return view('branches.ratings', compact('branch', 'ratings', 'can_rating'));
    }

    public function ratingStore(Request $r, Branch $branch)
    {
        $r->validate([
            'comentario' => 'nullable|max:200',
            'estrellas' => 'required|max:5|min:1|numeric|integer'
        ]);

        $r->user()->ratings()->create([
            'branch_id' => $branch->id,
            'content' => $r->comentario,
            'value' => $r->estrellas,
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
