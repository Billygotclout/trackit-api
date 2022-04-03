<?php

namespace App\Actions\User;

use App\Http\Resources\UserResource;
use App\Traits\ApiResponse;

class GetUserDetailsAction

{
    use ApiResponse;


    public function execute()
    {
        return $this->success(new UserResource(auth()->user()));
    }
}