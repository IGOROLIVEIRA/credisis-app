<?php
namespace App\Services\Country;

use App\Repositories\CountryRepository;
use App\Services\ServiceInterface;
use Illuminate\Database\Eloquent\Collection;

final class ListService implements ServiceInterface
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
