<?php

namespace App\Actions\Income;

use App\Http\Resources\BalanceResource;
use App\Http\Resources\IncomeResource;
use App\Models\Balance;
use App\Models\Income;
use App\Traits\ApiResponse;

class AddIncomeAction
{
    use ApiResponse;


    public function execute($data)
    {
        $userId = auth()->user()->id;


        $userBalance = Balance::where('user_id', $userId)->first();
        $userBal = $userBalance->amount;


        $income = Income::create([
            'amount' => $data['amount'],
            'date' => $data['date'],
            'user_id' => $userId 
            
        ]);
        

         $newBalance = $data['amount'] + $userBal;

         $userBalance->update(['amount' => $newBalance]);







       return  $this->success(['new_balance' => new BalanceResource($userBalance),], "Income successfully created");


    }
}
