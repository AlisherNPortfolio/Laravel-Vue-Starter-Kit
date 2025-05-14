<?php

use App\Http\Controllers\Admin\RoleController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'admin', 'middleware' => 'auth:admins'], function () {
    Route::controller(controller: RoleController::class)->group(function () {
        Route::apiResource( 'roles', RoleController::class);
    });
});
