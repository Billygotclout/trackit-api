<?php

namespace App\Actions\Auth;

use App\Http\Resources\UserResource;
use App\Models\Balance;
use App\Models\User;
use App\Traits\ApiResponse;

class RegisterAction
{

    use ApiResponse;

    protected $user;

    public function execute(array $data)
    {
        $this->user = User::create([
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'password' => bcrypt($data['password']),
        ]);

        if (!$this->user) {
            return $this->error("User not created", 400);
        }

        $this->createBalance();

        return $this->success([
            'token' => $this->user->createToken('API Token')->plainTextToken,
            'user_details' => new UserResource($this->user)
        ], 200);
    }

    protected function createBalance()
    {
        $balance = new Balance();

        $balance->user_id = $this->user->id;

       
        $balance->save();
    }
}
