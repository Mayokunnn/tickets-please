<?php

use App\Http\Controllers\Api\AuthController;
use Illuminate\Support\Facades\Route;

//https::localhost:3306/api
//universal resource locator
//tickets
//users


Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);
Route::middleware('auth:sanctum')->post('/logout', [AuthController::class, 'logout']);


