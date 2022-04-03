<?php

namespace App\Http\Controllers;

use App\Actions\Expense\AddExpenseAction;
use App\Actions\Expense\GetExpenseAction;
use App\Http\Requests\Expense\ExpenseRequest;
use Illuminate\Http\Request;

class ExpenseController extends Controller
{
   public function addExpense(ExpenseRequest $request) 
   {
       return (new AddExpenseAction())->execute($request->validated());
   }

   public function getExpense()
   {
       return (new GetExpenseAction())->execute();
   } 
}
