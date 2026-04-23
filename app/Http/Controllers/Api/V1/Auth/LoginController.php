<?php

namespace App\Http\Controllers\Api\V1\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Resources\UserResource;
use App\Services\AuthService;

class LoginController extends Controller
{
    public function __invoke(LoginRequest $request, AuthService $authService)
    {
        $credentials = $request->only('username', 'password');
        $user = $authService->authenticate($credentials['username'], $credentials['password']);

        if (!$user) {
            return response()->json(['message' => 'Invalid credentials'], 401);
        }

        auth()->login($user);
        session()->regenerate();

        return UserResource::make($user);
    } 
}
