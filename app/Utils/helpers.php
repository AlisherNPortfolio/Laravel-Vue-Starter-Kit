<?php

use Illuminate\Support\Facades\Log;

if (!function_exists('cleanNullArray')) {
    function cleanNullArray(array $originArray)
    {
        return array_filter($originArray, fn ($val) => !is_null($val));
    }
}

if (!function_exists("adminAuthGuard")) {
    function adminAuthGuard()
    {
        return auth("admins");
    }
}

if (!function_exists("userAuthGuard")) {
    function userAuthGuard(): \Illuminate\Contracts\Auth\StatefulGuard
    {
        return auth("users");
    }
}

if (!function_exists('envDependedError')) {
    function envDependedError(string $message, string $prodMessage = 'Serverda xatolik yuz berdi!')
    {
        Log::error('Environment dependent error: '.$message);

        return \Illuminate\Support\Facades\App::environment('local') ? $message : $prodMessage;
    }
}

if (!function_exists('can_user')) {
    function can_user($permissions, $model = null, $primaryKey = 'user_id', $guard = 'admins') {
        $user = auth($guard)->user();
        $errorMessage = 'Sizda bu amalni bajarishga ruxsat yo\'q';
        abort_if(!$user->can($permissions), 403, $errorMessage);

        abort_if($model && ($user->id !== $model->{$primaryKey}), 403, $errorMessage);
    }
}
