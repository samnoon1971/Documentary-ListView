<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\TodoController;

Route::controller(AuthController::class)->group(function () {
    Route::post('login', 'login');
    Route::post('register', 'register');
    Route::post('logout', 'logout');
    Route::post('refresh', 'refresh');

});

Route::controller(DocController::class)->group(function () {
    Route::get('docs', 'index');
    Route::post('doc', 'store');
    Route::get('doc/{id}', 'show');
    Route::put('doc/{id}', 'update');
    Route::delete('doc/{id}', 'destroy');
});
