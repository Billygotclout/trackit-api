<?php

namespace App\Http\Controllers;

use App\Traits\ApiResponse;
use Illuminate\Http\Request;

class LogoutController extends Controller
{

    use ApiResponse;

    public function logout()
    {
        auth()->user()->tokens()->delete();
  
       
        return [
            'message' => 'Successfully Logged out!'
        ];
    }
}
