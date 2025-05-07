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
