<?php
namespace App\Services\City;

use App\Repositories\CityRepository;
use App\Services\ServiceInterface;
use Exception;
use Illuminate\Support\Facades\DB;

final class DeleteService implements ServiceInterface
{

    /**
     * Delete a City
     *
     * @param array $data
     * @return bool
     */
    public static function run($data): bool
    {
        DB::beginTransaction();
        $cityRepository = new CityRepository();
        $city = $cityRepository->find($data['id']);
        if($city==null){
            throw new Exception("City not found.");
        }
        $city = $cityRepository->delete($data['id']);
        DB::commit();

        return $city;
    }

}
