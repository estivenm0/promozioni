<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Type extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
      'name'  
    ];

    public function businesses(): BelongsToMany
    {
        return $this->belongsToMany(Business::class,'business_types' );
    }
}
