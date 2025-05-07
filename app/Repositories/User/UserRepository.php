<?php

namespace App\Repositories\User;

use App\Models\User;
use App\Repositories\Contracts\User\IUserRepository;
use App\Repositories\CrudRepository;

class UserRepository extends CrudRepository implements IUserRepository
{
    public function __construct(User $model)
    {
        parent::__construct($model);
    }
}
