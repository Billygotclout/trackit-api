<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Expense extends Model
{
    use HasFactory;


    protected $fillable = [
        'amount',
        'date',
        'tags',
        'user_id'
    ];

    public function user() :BelongsTo
    {
        return $this->belongsTo(User::class);
    }
   
}
