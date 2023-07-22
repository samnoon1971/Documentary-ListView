<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DocController;



// define all routes with laravel 9 standard 

Route::post('login', [AuthController::class, 'login']);
Route::post('logout', [AuthController::class, 'logout']);
Route::post('refresh', [AuthController::class, 'refresh']);
Route::post('me', [AuthController::class, 'me']);
Route::post('add', [DocController::class, 'store']);
Route::get('list', [DocController::class, 'index']);
Route::get('list/{id}', [DocController::class, 'show']);
Route::put('update/{id}', [DocController::class, 'update']);
Route::delete('delete/{id}', [DocController::class, 'destroy']);
