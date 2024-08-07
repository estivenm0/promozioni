<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use App\Models\Category;
use App\Models\Promotion;
use App\Services\MapService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class MapController extends Controller
{

    public function __construct(protected MapService $mapService)
    {  
    }

    public function index()
    {    
        return view('promotions.index');
    }

    public function promotions(Request $r){
        $promos = $this->mapService->promotions($r);
        return [ 'promotions' => $promos ];
    }

    public function categories(){
        $categories = Cache::remember('categories', '1000', function () {
            return Category::all();
        });
        return $categories;
    }

    public function promotion(Promotion $promotion){
        return view('promotions.show', [
            'promotion' => $promotion
        ]);
    }

    public function branch(string $name)  {
        $branch = Branch::with('business')
        ->where('name', $name)
        ->firstOrFail();
        $promotions = $branch->promotions()->paginate(2);

        return view('branches.promotions', compact('branch', 'promotions'));
    }

    public function branchRatings(string $name)  {
        $user_id = auth()?->user()?->id;

        $branch = Branch::with('business')
        ->where('name', $name)
        ->firstOrFail();
        $ratings = $branch->ratings()
                    ->when($user_id, function($q) use ($user_id){
                        $q->orderByRaw('user_id = ? DESC', $user_id);
                    })
                    ->paginate(2);

        return view('branches.ratings', compact('branch', 'ratings'));
    }
}
