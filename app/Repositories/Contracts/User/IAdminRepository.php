<?php

namespace App\Repositories\Contracts\User;

use App\Models\Admin;
use App\Repositories\Contracts\ICrudRepository;

interface IAdminRepository extends ICrudRepository {
    public function getByEmail(string $email): ?Admin;
}
