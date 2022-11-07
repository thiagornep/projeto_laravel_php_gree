<?php

use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('/user', [UserController::class, 'checkLogin']);
Route::match(['put', 'patch'], 'user/{user}', [UserController::class, 'update']);