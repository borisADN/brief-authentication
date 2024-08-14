<?php

namespace App;

use App\Interfaces\AuthenticationInterface;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AuthenticationRepository implements AuthenticationInterface
{
    /**
     * Create a new class instance.
     */
    
    public function login($data)
    {
        return Auth::attempt($data);
    }
    public function registeration($data)
    {
        return User::create($data);
    }
}
