<?php
namespace App\Services\State;

use App\Models\State;
use App\Repositories\CountryRepository;
use App\Validators\StateValidator;
use App\Repositories\StateRepository;
use App\Services\ServiceInterface;
use Exception;
use Illuminate\Support\Facades\DB;

final class CreateService implements ServiceInterface
{

    /**
     * Create a State
     *
     * @param array $data
     * @return State
     */
    public static function run($data): State
    {
        $stateValidator = new StateValidator($data);
        $stateValidator->validate();

        $stateRepository = new StateRepository();

        $countryRepository = new CountryRepository();
        $country = $countryRepository->find($data['country_id']);
        if($country==null){
            throw new Exception("Country not found.");
        }

        DB::beginTransaction();
        $state = $stateRepository->create($data);

        // if(empty($country) || !AuthorizeTransactionService::run()) {
        //     DB::rollBack();
        //     throw new Exception("Unauthorized transaction.");
        // }
        DB::commit();


        return $state;
    }

}
