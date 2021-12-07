<?php
namespace App\Services\City;

use App\Models\City;
use App\Repositories\StateRepository;
use App\Validators\CityValidator;
use App\Repositories\CityRepository;
use App\Services\ServiceInterface;
use Exception;
use Illuminate\Support\Facades\DB;

final class CreateService implements ServiceInterface
{

    /**
     * Create a City
     *
     * @param array $data
     * @return City
     */
    public static function run($data): City
    {
        $cityValidator = new CityValidator($data);
        $cityValidator->validate();

        $cityRepository = new cityRepository();

        $stateRepository = new StateRepository();
        $state = $stateRepository->find($data['state_id']);
        if($state==null){
            throw new Exception("State not found.");
        }

        DB::beginTransaction();
        $city = $cityRepository->create($data);

        // if(empty($State) || !AuthorizeTransactionService::run()) {
        //     DB::rollBack();
        //     throw new Exception("Unauthorized transaction.");
        // }
        DB::commit();

        return $city;
    }

}
