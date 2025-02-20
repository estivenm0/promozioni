<?php

namespace App\Services;

use App\Models\Business;

class MapService
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

    public function promotions($rq)
    {
        $lat = $rq->query('lat', 4.5981);
        $lon = $rq->query('lon', -74.0758);
        $km = $rq->query('km', 10);
        $category = $rq->query('category', 0);

        return Business::with('promotion')
                // ->whereStatus('aprobado')
            ->whereHas('promotion', function ($q) use ($category) {
                if ($category != 0) {
                    $q->whereCategoryId($category);
                }
            })
            ->geofence($lat, $lon, 0, $km)
            ->get('name');

    }
}
