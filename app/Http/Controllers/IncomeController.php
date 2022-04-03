<?php

namespace App\Http\Controllers;

use App\Actions\Income\AddIncomeAction;
use App\Actions\Income\GetIncomeAction;
use App\Http\Requests\Income\AddIncomeRequest;
use Illuminate\Http\Request;

class IncomeController extends Controller
{
    public function addIncome(AddIncomeRequest $request)
    {
        return (new AddIncomeAction())->execute($request->validated());
    }
    public function getIncome()
    {
        return (new GetIncomeAction())->execute();
    }
}
