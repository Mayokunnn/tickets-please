<?php

use App\Http\Controllers\Api\v1\AuthController;
use Illuminate\Support\Facades\Route;

//https::localhost:3306/api
//universal resource locator
//tickets
//users


Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);

Route::get('/tickets', function (){
   return \App\Models\Ticket::all();
});

