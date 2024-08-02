<?php

namespace App\Http\Controllers;

use App\Models\Promotion;
use Illuminate\Http\Request;

class MapController extends Controller
{
    public function index()
    {
        $promos = Promotion::with(['branch:id,name', 'category'])->paginate(100);
    
        return view('promotions.index', [
            'promotions' => $promos
        ]);
    }

    public function promotions(Request $r){
        return [
            'promotions' => Promotion::paginate(100)
        ];

    }
}
