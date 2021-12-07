<?php

namespace App\Repositories;

use App\Models\City;
use App\Repositories\Traits\Create;
use App\Repositories\Traits\Find;
use App\Repositories\Traits\FindAll;
use App\Repositories\Traits\Delete;
use App\Repositories\Traits\FindBy;
use App\Repositories\Traits\Update;

final class CityRepository extends BaseRepository
{

    use Find, Create, Update, FindAll, Find, Delete, FindBy;
    /**
     * create a isntance of country for entiry
     *
     * @param City $entity
     */
    public function __construct()
    {
        parent::__construct(new City());
    }

}
