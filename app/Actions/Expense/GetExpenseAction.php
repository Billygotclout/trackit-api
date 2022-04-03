<?php



namespace App\Actions\Expense;

use App\Http\Resources\ExpenseResource;
use App\Models\Expense;

class GetExpenseAction {

    public function execute()
    {
        $userId = auth()->user()->id;

        $expense = Expense::where('user_id', $userId)->orderBy('id', 'desc')->get();
       

        return ExpenseResource::collection($expense);
    }
}