<?php

namespace App\Services\Admin\User;

use App\Http\Resources\Admin\User\UserResource;
use App\Repositories\Contracts\User\IUserRepository;
use App\Services\BaseService;
use Exception;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

class UserService extends BaseService
{
    public function __construct(private IUserRepository $repository)
    {
    }

    public function getPaginate($id, $perPage = 15)
    {
        [$data, $count] = Cache::remember('users_list', 60, function () use ($id, $perPage) {
            return $this->repository->getPagination($id, $perPage, ['roles']);
        });

        return $this->jsonSuccess([
            'data' => UserResource::collection($data),
            'count' => $count
        ]);
    }

    public function getById($id)
    {
        $category = $this->repository->find($id);
        abort_if(!$category, 404, "Category not found!");

        return $this->jsonSuccess($category);
    }

    public function create(array $data)
    {
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
            $category = $this->repository->find($id);
            abort_if(!$category, 404, "Category not found");

            $category->update($data);

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
