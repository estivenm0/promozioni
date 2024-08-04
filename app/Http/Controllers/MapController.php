<?php

namespace App\Http\Controllers;

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

    public function show(Promotion $promotion){
        return view('promotions.show', [
            'promotion' => $promotion
        ]);
    }
}
