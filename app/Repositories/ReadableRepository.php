<?php

namespace App\Repositories;

use App\Repositories\Contracts\IReadableRepository;
use App\Traits\Repositories\TReadable;

class ReadableRepository extends BaseRepository implements IReadableRepository
{
    use TReadable;
}
