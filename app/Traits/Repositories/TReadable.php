<?php

namespace App\Traits\Repositories;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

trait TReadable
{
    public function find(int $id, array $relations = []): ?Model
    {
        $query = $this->getQuery($relations);

        return $query->find($id);
    }

    public function all(array $relations = []): Collection
    {
        $query = $this->getQuery($relations);
        return $query->get();
    }

    public function paginate($perPage = 20): Collection
    {
        return $this->model->paginate($perPage);
    }

    protected function getQuery(array $relations = [])
    {
        $query = $this->model::query();

        if (count($relations) > 0) {
            $query = $query->with($relations);
        }

        return $query;
    }

    public function getPagination(int $id, int $perPage, array $relations = []): array
    {
        $query = $this->getQuery($relations);
        $dataQuery = $query
        ->where('id', '>=', $id)
        ->orderBy('id', 'asc');

        $count = $query->count();
        $data = $dataQuery->limit($perPage)->get();

        return [$data, $count];
    }
}
