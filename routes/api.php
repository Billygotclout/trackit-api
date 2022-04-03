<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\BudgetController;
use App\Http\Controllers\ExpenseController;
use App\Http\Controllers\IncomeController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\ProfileController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['prefix' => 'auth',], function () {
    Route::post('register', [RegisterController::class, 'register']);
    Route::post('login', [LoginController::class, 'login']);
});

Route::group(['middleware' => ['auth:sanctum']], function () {


    Route::group(['prefix' => 'income',], function () {
        Route::post('add-income', [IncomeController::class, 'addIncome']);
        Route::get('get-income', [IncomeController::class, 'getIncome']);
     
    });
    
    Route::group(['prefix' => 'budget',], function () {
        
     Route::post('create-budget', [BudgetController::class, 'createBudget']);
    });


    Route::group(['prefix' => 'profile'], function () {
        Route::get('user-details', [ProfileController::class, 'getUserDetails']);
      
    });

    Route::group(['prefix' =>'expense'], function (){
        Route::post('add-expense', [ExpenseController::class, 'addExpense']);
        Route::get('get-expense', [ExpenseController::class, 'getExpense']);
    });

    Route::post('/auth/logout', [LogoutController::class, 'logout']);
    
});
