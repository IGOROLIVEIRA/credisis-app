<?php
namespace App\Services\City;

use App\Models\City;
use App\Repositories\StateRepository;
use App\Validators\CityValidator;
use App\Repositories\CityRepository;
use App\Services\ServiceInterface;
use Exception;
use Illuminate\Support\Facades\DB;

final class UpdateService implements ServiceInterface
{

    /**
     * Update a City
     *
     * @param array $data
     * @return City
     */
    public static function run($data): City
    {
        $cityValidator = new CityValidator($data['data']);
        $cityValidator->validate();

        $cityRepository = new CityRepository();
        $city = $cityRepository->find($data['id']);
        if($city==null){
            throw new Exception("City not found.");
        }

        $stateRepository = new StateRepository();
        $state = $stateRepository->find($data['data']['state_id']);
        if($state==null){
            throw new Exception("State not found.");
        }

        DB::beginTransaction();
        $city = $cityRepository->update($data['data'], $data['id']);
        DB::commit();

        return $city;
    }

}
