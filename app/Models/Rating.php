<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Rating extends Model
{
    use HasFactory;

    protected $fillable = [
      'user_id',  
      'branch_id',  
      'value',  
      'content',  
    ];

    public function user() : BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function branch() : BelongsTo
    {
        return $this->belongsTo(Branch::class);
    }
}
