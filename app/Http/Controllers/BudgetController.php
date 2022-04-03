<?php

namespace App\Http\Controllers;

use App\Actions\Budget\CreateBudgetAction;
use App\Http\Requests\CreateBudgetRequest;
use Illuminate\Http\Request;

class BudgetController extends Controller
{
    public function createBudget(CreateBudgetRequest $request)
    {
        return (new CreateBudgetAction())->execute($request->validated());
    }
}
