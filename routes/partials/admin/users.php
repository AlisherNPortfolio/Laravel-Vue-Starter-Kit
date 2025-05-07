<?php

use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'admin', 'middleware' => 'auth:admins'], function () {
    Route::controller(UserController::class)->group(function () {
        Route::apiResource('users', UserController::class);
    });
});
