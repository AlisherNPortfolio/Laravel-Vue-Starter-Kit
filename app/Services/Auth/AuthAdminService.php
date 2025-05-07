<?php

namespace App\Services\Auth;

use App\Repositories\Contracts\User\IAdminRepository;
use App\Services\BaseService;
use Exception;
use Illuminate\Support\Facades\Hash;
use Tymon\JWTAuth\Facades\JWTAuth;

class AuthAdminService extends BaseService
{
    public function __construct(protected IAdminRepository $adminRepository) {
    }

    /**
     * Auth service method.
     *
     * @param array $data validated data from UI
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function login(array $data)
    {
        try {
            $user = $this->adminRepository->getByEmail($data['email']);

            abort_if(!$user, 404, 'Bunday elektron manzilli foydalanuvchi topilmadi!');

            $credentials = [
                'email' => $data['email'],
                'password' => $data['password'],
            ];

            if (!$token = adminAuthGuard()->attempt($credentials)) {
                return $this->jsonError('Parol xato!');
            }

            return $this->respondWithToken($token);
        } catch (Exception $e) {
            return $this->jsonError(
                envDependedError($e->getMessage()),
            );
        }
    }

    public function register(array $data)
    {
        $user = $this->adminRepository->create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);

        $token = JWTAuth::fromUser($user);

        return $this->jsonSuccess([
            'message' => 'User successfully registered',
            'user' => $user,
            'token' => $token,
        ]);
    }

    public function logout()
    {
        adminAuthGuard()->logout();

        return $this->jsonSuccess([
            'message' => 'Success',
        ]);
    }

    protected function respondWithToken($token, $guard = 'admins')
    {
        $auth = adminAuthGuard();

        return $this->jsonSuccess([
            'token' => $token,
            'token_type' => 'bearer',
            'permissions' => $auth->user()->permissions->toArray(),
            'expire_time' => $auth->factory()->getTTL() * 60,
        ]);
    }

    public function getAccount()
    {
        return $this->jsonSuccess([
            'user' => adminAuthGuard()->user(),
        ]);
    }
}
