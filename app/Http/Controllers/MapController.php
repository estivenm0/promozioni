<?php

namespace App\Http\Controllers;

use App\Models\Promotion;
use App\Services\MapService;
use Illuminate\Http\Request;

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
        return [
            'promotions' => $promos
        ];

    }
}
