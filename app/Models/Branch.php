<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Branch extends Model
{
    use HasFactory;

    protected $fillable = [
      'business_id',
      'name',  
      'status',  
      'status_description',  
      'address',  
      'longitude',  
      'latitude',  
    ];

    public function business() : BelongsTo
    {
        return $this->belongsTo(Business::class);
    }

    public function ratings() : HasMany
    {
        return $this->hasMany(Rating::class);
    }

    public function promotions() : HasMany 
    {
        return $this->hasMany(Promotion::class);
    }

}
