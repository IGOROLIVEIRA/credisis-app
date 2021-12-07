<?php

namespace App\Repositories;

use App\Models\Lounch;
use App\Repositories\Traits\Create;
use App\Repositories\Traits\Find;
use App\Repositories\Traits\FindAll;
use App\Repositories\Traits\FindBy;

final class LounchRepository extends BaseRepository
{

    use Find, Create, FindAll, FindBy;
    /**
     * create a isntance of Lounch for entiry
     *
     * @param State $entity
     */
    public function __construct()
    {
        parent::__construct(new Lounch());
    }

}
