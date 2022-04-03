<?php

namespace App\Http\Controllers\Auth;

use App\Actions\Auth\RegisterAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\RegisterRequest;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function register(RegisterRequest $request)
    {
        return (new RegisterAction())->execute($request->validated());
    }
}
