<?php

use Illuminate\Support\Facades\Route;

Route::prefix('admin')->group(function () {
    Route::controller(App\Http\Controllers\Auth\AuthAdminController::class)->group(function () {
        Route::post('auth/register', 'register');
        Route::post('auth/login', 'login');
        Route::get('auth/account', 'me');
        Route::post('auth/logout', 'logout');
    });
});
