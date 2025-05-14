<?php

namespace App\Repositories\Role;

use App\Repositories\Contracts\Role\IRoleRepository;
use App\Repositories\CrudRepository;
use Spatie\Permission\Models\Role;

class RoleRepository extends CrudRepository implements IRoleRepository
{
    public function __construct(Role $model)
    {
        parent::__construct($model);
    }
}
