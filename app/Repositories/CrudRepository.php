<?php

namespace App\Repositories;

use App\Repositories\Contracts\ICrudRepository;
use App\Traits\Repositories\TEditable;
use App\Traits\Repositories\TReadable;

class CrudRepository extends BaseRepository implements ICrudRepository
{
    use TEditable;
    use TReadable;
}
