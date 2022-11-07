<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', [UserController::class, 'indexLogin']);
Route::post('/', [UserController::class, 'checkLogin']);

Route::get('/home', [UserController::class, 'indexHome']);
Route::post('/home', [UserController::class, 'registerLogin']);

Route::get('home/lista', [UserController::class, 'indexList']);
Route::patch('home/lista/{user}', [UserController::class, 'update']);
Route::delete('home/lista/{user}', [UserController::class, 'delete']);

Route::get('/home/sair', [UserController::class, 'logout']);
