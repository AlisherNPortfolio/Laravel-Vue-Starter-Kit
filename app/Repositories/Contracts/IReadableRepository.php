<?php

namespace App\Repositories\Contracts;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

interface IReadableRepository
{
    public function find(int $id, array $relations = []): ?Model;

    public function all(array $relations = []): Collection;

    public function paginate($perPage = 20): Collection;

    public function getPagination(int $id, int $perPage, array $relations = []): array;
}
