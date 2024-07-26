<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Promotion extends Model
{
    use HasFactory;

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

    public function branch() : BelongsTo
    {
        return $this->belongsTo(Branch::class);
    }

    public function category() : BelongsTo
    {
        return $this->belongsTo(Category::class);
    }


}
