<?php
namespace App\Services\State;

use App\Repositories\CityRepository;
use App\Repositories\StateRepository;
use App\Services\ServiceInterface;
use Exception;
use Illuminate\Support\Facades\DB;

final class DeleteService implements ServiceInterface
{

    /**
     * Delete a State
     *
     * @param array $data
     * @return bool
     */
    public static function run($data): bool
    {
        DB::beginTransaction();
        $stateRepository = new StateRepository();
        $state = $stateRepository->find($data['id']);
        if($state==null){
            throw new Exception("State not found.");
        }

        $cityRepository = new CityRepository();
        $city = $cityRepository->findBy('state_id', $data['id']);
        if($city!=null){
            throw new Exception("State in use.");
        }
        $state = $stateRepository->delete($data['id']);
        DB::commit();

        return $state;
    }

}
