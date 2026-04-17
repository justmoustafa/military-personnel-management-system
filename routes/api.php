<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\V1\Auth\RegisterController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::middleware('auth:sanctum')->get('/user', [RegisterController::class, 'user']);

Route::get('/register', RegisterController::class)
    ->name('register')
    ->middleware('auth:sanctum');