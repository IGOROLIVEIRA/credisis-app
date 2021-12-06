<?php

namespace App\Repositories;

use App\Models\Country;
use App\Repositories\Traits\Create;
use App\Repositories\Traits\Find;
use App\Repositories\Traits\FindAll;
use App\Repositories\Traits\FindBy;
use App\Repositories\Traits\Update;

final class CountryRepository extends BaseRepository
{

    use Find, Create, Update, FindAll;
    /**
     * create a isntance of country for entiry
     *
     * @param Country $entity
     */
    public function __construct()
    {
        parent::__construct(new Country());
    }

}
