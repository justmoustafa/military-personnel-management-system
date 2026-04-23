<?php

namespace App\Http\Controllers\Api\V1\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRegisterRequest;
use App\Http\Resources\UserResource;
use App\Services\AuthService;
use App\DataTransferObjects\UserAuthDto;

class RegisterController extends Controller
{
    public function __invoke(UserRegisterRequest $request, AuthService $authService)
    {
        $userAuthdto = UserAuthDto::fromRequest($request);
        $user = $authService->register($userAuthdto);

        if(!$user) {
            return response()->json(['message' => 'Registration failed'], 500);
        }

        return UserResource::make($user);
    }
}
