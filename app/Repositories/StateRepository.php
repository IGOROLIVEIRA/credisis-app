<?php

namespace App\Repositories;

use App\Models\State;
use App\Repositories\Traits\Create;
use App\Repositories\Traits\Find;
use App\Repositories\Traits\FindAll;
use App\Repositories\Traits\Delete;
use App\Repositories\Traits\Update;

final class StateRepository extends BaseRepository
{

    use Find, Create, Update, FindAll, Find, Delete;
    /**
     * create a isntance of state for entiry
     *
     * @param State $entity
     */
    public function __construct()
    {
        parent::__construct(new State());
    }

}
