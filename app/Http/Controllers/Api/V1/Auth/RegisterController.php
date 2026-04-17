<?php

namespace App\Http\Controllers\Api\V1\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRegisterRequest;
use App\Http\Resources\UserResource;
use App\Services\AuthService;

class RegisterController extends Controller
{
    public function __invoke(UserRegisterRequest $request, AuthService $authService)
    {
        $user = $authService->register($request);

        if(!$user) {
            return response()->json(['message' => 'Registration failed'], 500);
        }

        return UserResource::make($user);
    }
}
