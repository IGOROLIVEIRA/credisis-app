<?php
namespace App\Services\State;

use App\Models\State;
use App\Repositories\CountryRepository;
use App\Validators\StateValidator;
use App\Repositories\StateRepository;
use App\Services\ServiceInterface;
use Exception;
use Illuminate\Support\Facades\DB;

final class UpdateService implements ServiceInterface
{

    /**
     * Update a State
     *
     * @param array $data
     * @return State
     */
    public static function run($data): State
    {
        $stateValidator = new StateValidator($data['data']);
        $stateValidator->validate();

        $stateRepository = new StateRepository();
        $state = $stateRepository->find($data['id']);
        if($state==null){
            throw new Exception("State not found.");
        }

        $countryRepository = new CountryRepository();
        $country = $countryRepository->find($data['data']['country_id']);
        if($country==null){
            throw new Exception("Country not found.");
        }

        DB::beginTransaction();
        $state = $stateRepository->update($data['data'], $data['id']);
        DB::commit();

        return $state;
    }

}
