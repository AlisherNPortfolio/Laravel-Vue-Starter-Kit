<?php

namespace App\Traits\Repositories;

use Illuminate\Database\Eloquent\Model;

trait TEditable
{
    public function create(array $attributes): Model
    {
        return $this->model->create($attributes);
    }

    public function update(array $attributes): bool
    {
        return $this->model->fill($attributes)->save();
    }

    public function delete(int $id): ?bool
    {
        return $this->model->delete($id);
    }
}
