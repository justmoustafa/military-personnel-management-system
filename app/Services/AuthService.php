<?php

namespace App\Services;
use App\DataTransferObjects\UserAuthDto;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Services\UserService;
class AuthService
{
    public function __construct(
        protected UserService $userService
    )
    {}
    public function register(UserAuthDto $userAuthDto) : ?User
    {
        $data = $userAuthDto->toArray();
        $data['username'] = $this->userService->generateUsername($userAuthDto->police_id);

        $user = User::create($data);

        return $user;
    }

    public function authenticate(string $username, string $password): ?User
    {
        $user = User::where('username', $username)->first();

        if ($user && Hash::check($password, $user->password)) {
            return $user;
        }

        return null;
    }
}
