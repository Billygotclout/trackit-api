<?php

namespace App\Actions\Income;

use App\Http\Resources\BalanceResource;
use App\Http\Resources\IncomeResource;
use App\Http\Resources\UserResource;
use App\Models\Balance;
use App\Models\Income;
use App\Traits\ApiResponse;

class GetIncomeAction
{
    use ApiResponse;


    public function execute()
    {

        $userId = auth()->user()->id;

        $income = Income::where('user_id', $userId)->orderBy('id', 'desc')->get();
       

        return IncomeResource::collection($income);


    }
}
