<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Malhal\Geographical\Geographical;

class Promotion extends Model
{
    use HasFactory, Geographical;

    protected static $kilometers = true;

    protected $fillable = [
        'branch_id',       
        'category_id',       
        'title',       
        'description',       
        'image',       
        'longitude',       
        'latitude',       
        'start_date',       
        'end_date',       
    ];

    public function getRouteKeyName(): string
    {
    return 'slug';
    }


    public function branch() : BelongsTo
    {
        return $this->belongsTo(Branch::class);
    }

    public function category() : BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function getImageURL()
    {
        if ($this->image) {
            return url('/storage/promotions/' . $this->image);
        }
    }



}
