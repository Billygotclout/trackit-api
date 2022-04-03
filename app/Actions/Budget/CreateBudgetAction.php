<?php

namespace App\Actions\Budget;

use App\Http\Resources\BalanceResource;
use App\Http\Resources\BudgetResource;
use App\Models\Balance;
use App\Models\Budget;
use App\Traits\ApiResponse;

class CreateBudgetAction
{
    use ApiResponse;

    public function execute($data)
    {
        $userId = auth()->user()->id;

       

        $balance = Balance::where('user_id', $userId)->first();

        $balanceAmount = $balance->amount;

        $percentBal = $balanceAmount * (95 / 100);

        if ($data['amount'] >  $percentBal) {
            return $this->error("Balance cannot be created, please reduce amount", 400);
        }

        if ($balanceAmount < $data['amount']) {
            return $this->error("Insufficient Balance", 400);
        }
        $budget = Budget::create([
            'name' => $data['name'],
            'amount' => $data['amount'],
            'start_date' => $data['start_date'],
            'end_date' => $data['end_date'],
            'user_id' => $userId
        ]);

        

        $newbalance = $balanceAmount - $data['amount'];

        $balance->update(['amount' => $newbalance, ]);

      

        return  $this->success(['budget' => new BudgetResource($budget), ], "Budget successfully created");
    }
}
