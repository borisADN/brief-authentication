<?php

namespace App\Interfaces;

interface AuthenticationInterface
{
    public function login($data);
    public function registeration( $data);
}
