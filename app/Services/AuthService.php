<?php

namespace App\Services;
use App\DataTransferObjects\UserAuthDto;
use App\Http\Requests\UserRegisterRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthService
{
    public function register(UserRegisterRequest $request) : ?User
    {
        $user = User::create([
            UserAuthDto::fromRequest($request),
        ]);

        return $user;
    }

    public function authenticate(string $police_id, string $password): ?User
    {
        $user = User::where('police_id', $police_id)->first();

        if ($user && Hash::check($password, $user->password)) {
            return $user;
        }

        return null;
    }
}
