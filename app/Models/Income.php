<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Income extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'amount',
        'date'
    ];

    public function user() :BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    public function budget() :HasOne
    {
        return $this->hasOne(Budget::class);
    }
   
}
