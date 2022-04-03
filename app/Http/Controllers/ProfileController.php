<?php

namespace App\Http\Controllers;

use App\Actions\User\GetUserDetailsAction;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function getuserDetails()
    {
        return (new GetUserDetailsAction())->execute();
    }
}
