<?php

namespace App\Actions\Expense;

use App\Http\Resources\ExpenseResource;
use App\Models\Budget;
use App\Models\Expense;
use App\Traits\ApiResponse;

class AddExpenseAction
{
    use ApiResponse;

    public function execute($data)
    {
        $userId = auth()->user()->id;


       

        $budget = Budget::where('user_id', $userId)->first();

        $budgetAmount = $budget->amount;

        if ($data['amount'] >  $budgetAmount) {
            return $this->error("Insufficient Amount", 400);
        }
        $expense = Expense::create([
            'user_id' => $userId,
            'amount' => $data['amount'],
            'date' => $data['date'],
            'tags' => $data['tags']
        ]);

        $newbudget = $budgetAmount - $data['amount'];

        $budget->update(['amount' => $newbudget, ]);

        return  $this->success(['budget' => new ExpenseResource($expense), ], "Expense successfully created");

    }
}
