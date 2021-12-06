<?php
namespace App\Services;

use App\Repositories\CountryRepository;
use Illuminate\Database\Eloquent\Collection;

final class ListCountryService implements ServiceInterface
{

    /**
     * List Country
     *
     * @return Collection
     */
    public static function run($data): Collection
    {
        $countryRepository = new CountryRepository();
        return $countryRepository->findAll();
    }

}
