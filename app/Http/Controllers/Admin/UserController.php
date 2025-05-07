<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Common\PaginationRequest;
use App\Http\Requests\Admin\User\StoreUserRequest;
use App\Services\Admin\User\UserService;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct(protected UserService $userService)
    {
        $this->middleware('auth:admins');
    }

    public function index(PaginationRequest $request)
    {
        can_user('content.view');

        $data = $request->validated();
        $id = $data["id"] ?? 0;

        return $this->userService->getPaginate($id);
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return JsonResponse
     */
    public function store(StoreUserRequest $request)
    {
        $data = $request->validated();

        return $this->userService->create($data);
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return JsonResponse
     */
    public function show($user)
    {
        can_user('content.view');
        return $this->userService->getById((int)$user);
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $brand
     * @return JsonResponse
     */
    public function update(Request $request, $user)
    {
        can_user('content.update');

        $data = $request->validated();
        $user = (int)$user;

        return $this->userService->update($data, $user);
    }

    /**
     * Remove the specified resource from storage.
     * @param Brand $brand
     * @return JsonResponse
     */
    public function destroy($user)
    {
        can_user('content.delete');
        return $this->userService->delete($user);
    }
}
