<?php

namespace App\Services;
use App\DataTransferObjects\UserAuthDto;
use App\Models\User;

class AuthService
{
    public function register(UserAuthDto $user_auth_dto) ?User
    {
        // Registration logic
    }
}
