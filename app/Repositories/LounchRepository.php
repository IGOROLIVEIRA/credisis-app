<?php

namespace App\Repositories;

use App\Models\Lounch;
use App\Repositories\Traits\Create;
use App\Repositories\Traits\Find;
use App\Repositories\Traits\FindAll;
use App\Repositories\Traits\FindBy;
use App\Repositories\Traits\Where;

final class LounchRepository extends BaseRepository
{

    use Find, Create, FindAll, FindBy, Where;
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
