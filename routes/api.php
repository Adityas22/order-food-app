<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\UserController;
use Illuminate\Container\Attributes\Auth;

// 
Route::prefix('auth')->group(function () {
    Route::post('/login', [AuthController::class, 'login']);
    // Route::post('/register', [AuthController::class, 'register']);
    // Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');
    Route::get('/me', [AuthController::class, 'me'])->middleware('auth:sanctum');
});

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/create-order', function () {
        return 'hmmm';
    })->middleware('role:1,3'); 

    Route::post('/finish-order', function () {
        return 'hmmm';
    })->middleware('role:2,4');

    Route::post('/user', [UserController::class, 'store'])->middleware('role:3'); //manager

    Route::post('/item', [ItemController::class, 'store'])->middleware('role:3'); //manager
    Route::post('/item/{id}', [ItemController::class, 'update'])->middleware('role:3'); //manager
});