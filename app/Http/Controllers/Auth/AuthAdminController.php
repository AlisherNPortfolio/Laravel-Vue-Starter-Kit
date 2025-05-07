<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegisterRequest;
use App\Services\Auth\AuthAdminService;

class AuthAdminController extends Controller
{
    public function __construct(private AuthAdminService $service)
    {
        $this->middleware('auth:admins', ['except' => ['login', 'register']]);
    }

    public function login(LoginRequest $request)
    {
        if ($request->isMethod('POST')) {
            $data = $request->validated();

            return $this->service->login($data);
        }
    }

    public function register(RegisterRequest $request)
    {
        if ($request->isMethod('POST')) {
            $data = $request->validated();

            return $this->service->register($data);
        }
    }

    public function me()
    {
        return $this->service->getAccount();
    }

    public function logout()
    {
        return $this->service->logout();
    }
}
