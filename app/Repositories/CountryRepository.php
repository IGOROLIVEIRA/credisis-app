<?php

namespace App\Repositories;

use App\Models\Country;
use App\Repositories\Traits\Find;
use Ramsey\Uuid\Uuid;

final class CountryRepository extends BaseRepository
{

    use Find;
    /**
     * create a isntance of country for entiry
     *
     * @param Country $entity
     */
    public function __construct()
    {
        parent::__construct(new Country());
    }

    /**
     * Save a transaction between two users
     *
     * @param Country $country
     * @return Country
     */
    public function create(Country $country)
    {
        $country = $this->entity->create([
            'name' => $country->name,
            'initials' => $country->initials,
        ]);
        return $country;
    }

}
