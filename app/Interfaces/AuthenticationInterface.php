<?php

namespace App\Interfaces;

interface AuthenticationInterface
{
    public function login($data);
    public function registeration($data);
    public function forgottenPassword($email);
    public function checkOtpCode($data);
    public function newPassword($data);
}
