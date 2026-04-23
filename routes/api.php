<?php

use App\Http\Controllers\Api\V1\Auth\LoginController;
use App\Http\Controllers\Api\V1\Auth\LogoutController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\V1\Auth\RegisterController;

Route::get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/register', RegisterController::class)
    ->middleware('guest:sanctum')
    ->name('register');

Route::post('/login', LoginController::class)
    ->middleware('guest:sanctum')
    ->name('login');

Route::post('/logout', LogoutController::class)
    ->middleware('auth:sanctum')
    ->name('logout');

