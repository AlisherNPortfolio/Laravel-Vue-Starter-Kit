<?php

namespace App\Repositories\User;

use App\Models\Admin;
use App\Repositories\Contracts\User\IAdminRepository;
use App\Repositories\CrudRepository;

class AdminRepository extends CrudRepository implements IAdminRepository {
    public function __construct(Admin $model)
    {
        parent::__construct($model);
    }

    public function getByEmail(string $email): ?Admin
    {
        return $this->getQuery()->where('email', $email)->first();
    }
}
