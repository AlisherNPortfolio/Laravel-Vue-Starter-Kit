<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Common\PaginationRequest;
use App\Http\Requests\Admin\Role\StoreRoleRequest;
use App\Services\Admin\Role\RoleService;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function __construct(protected RoleService $roleService)
    {
        $this->middleware('auth:admins');
    }

    public function index(PaginationRequest $request)
    {
        can_user('content.view');

        $data = $request->validated();
        $id = $data["id"] ?? 0;

        return $this->roleService->getPaginate($id);
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
    public function store(StoreRoleRequest $request)
    {
        $data = $request->validated();

        return $this->roleService->create($data);
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return JsonResponse
     */
    public function show($role)
    {
        can_user(permissions: 'content.view');
        return $this->roleService->getById((int)$role);
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $brand
     * @return JsonResponse
     */
    public function update(Request $request, $role)
    {
        can_user('content.update');

        $data = $request->validated();
        $role = (int)$role;

        return $this->roleService->update($data, $role);
    }

    /**
     * Remove the specified resource from storage.
     * @param Brand $brand
     * @return JsonResponse
     */
    public function destroy($role)
    {
        can_user('content.delete');
        return $this->roleService->delete($role);
    }
}
