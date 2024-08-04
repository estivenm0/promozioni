<?php

namespace App\Services;

use App\Models\Promotion;

class MapService
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

    public function promotions($r)  {
        $lat = $r->query('lat', 4.5981);
        $lon = $r->query('lon', -74.0758);
        $km = $r->query('km', 500);
        $category = $r->query('category', 0);

        return Promotion::with(['branch:id,name', 'category'])
        ->when($category != 0,  function($q) use ($category){
            return $q->where('category_id', $category);
        })
        ->distinct('branch_id')
        ->geofence($lat, $lon, 0, $km)->get();
    }


}
