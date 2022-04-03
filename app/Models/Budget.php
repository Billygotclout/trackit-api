<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Budget extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'amount',
        'start_date',
        'end_date',
        'name'
    ];

   
    public function user() : BelongsTo
    {
        return $this->belongsTo(User::class);
    }

  
   

    

}
