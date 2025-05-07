<?php

namespace App\Repositories;

use App\Repositories\Contracts\IEditableRepository;
use App\Traits\Repositories\TEditable;

class EditableRepository extends BaseRepository implements IEditableRepository
{
    use TEditable;
}
