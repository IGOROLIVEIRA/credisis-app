<?php
namespace App\Services\Country;

use App\Repositories\CountryRepository;
use App\Repositories\StateRepository;
use App\Services\ServiceInterface;
use Exception;
use Illuminate\Support\Facades\DB;

final class DeleteService implements ServiceInterface
{

    /**
     * Delete a Country
     *
     * @param array $data
     * @return bool
     */
    public static function run($data): bool
    {
        DB::beginTransaction();
        $countryRepository = new CountryRepository();
        $country = $countryRepository->find($data['id']);
        if($country==null){
            throw new Exception("Country not found.");
        }

        $stateRepository = new StateRepository();
        $state = $stateRepository->findBy('country_id', $data['id']);
        if($state!=null){
            throw new Exception("Country in use.");
        }
        $country = $countryRepository->delete($data['id']);
        DB::commit();

        return $country;
    }

}
