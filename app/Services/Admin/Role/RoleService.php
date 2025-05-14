<?php

namespace App\Services\Admin\Role;

use App\Http\Resources\Admin\Role\RoleResource;
use App\Repositories\Contracts\Role\IRoleRepository;
use App\Services\BaseService;
use Exception;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

class RoleService extends BaseService
{
    public function __construct(private IRoleRepository $repository)
    {
    }

    public function getPaginate($id, $perPage = 15)
    {
        [$data, $count] = Cache::remember('roles_list', 60, function () use ($id, $perPage) {
            return $this->repository->getPagination($id, $perPage, relations: ['permissions']);
        });

        return $this->jsonSuccess([
            'data' => RoleResource::collection($data),
            'count' => $count
        ]);
    }

    public function getById($id)
    {
        $role = $this->repository->find($id);
        abort_if(!$role, 404, message: "Role not found!");

        return $this->jsonSuccess($role);
    }

    public function create(array $data)
    {
        // TODO: rol saqlashni to'g'rilash
        try {
            DB::beginTransaction();

            try {
                $this->repository->create($data);
                DB::commit();
            } catch (Exception $e) {
                DB::rollBack();
                return $this->jsonError($e->getMessage());
            }

            return $this->jsonSuccess(['message' => "Created!"]);
        } catch (Exception $e) {
            return $this->jsonError(
                envDependedError($e->getMessage())
            );
        }
    }

    public function update(array $data, int|string $id)
    {
        try {
            $role = $this->repository->find($id);
            abort_if(!$role, 404, message: "Role not found");

            $role->update($data);

            return $this->jsonSuccess(['message' => "Updated!"]);
        } catch (Exception $e) {
            return $this->jsonError(
                envDependedError($e->getMessage())
            );
        }
    }

    public function delete(int $id)
    {
        try {
            $this->repository->delete($id);
            return $this->jsonSuccess(["message"=> "Deleted!"]);
        } catch (Exception $e) {
            return $this->jsonError(
                envDependedError($e->getMessage())
            );
        }
    }
}
