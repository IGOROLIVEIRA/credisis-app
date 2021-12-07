<?php
namespace App\Services\City;

use App\Repositories\CityRepository;
use App\Services\ServiceInterface;
use Illuminate\Database\Eloquent\Collection;

final class ListService implements ServiceInterface
{

    /**
     * List City
     *
     * @return Collection
     */
    public static function run($data): Collection
    {
        $cityRepository = new CityRepository();
        return $cityRepository->findAll();
    }

}
