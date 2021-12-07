<?php
namespace App\Services\Country;

use App\Models\Country;
use App\Validators\CountryValidator;
use App\Repositories\CountryRepository;
use App\Services\ServiceInterface;
use Illuminate\Support\Facades\DB;

final class CreateService implements ServiceInterface
{

    /**
     * Create a Country
     *
     * @param array $data
     * @return Country
     */
    public static function run($data): Country
    {
        $countryValidator = new CountryValidator($data);
        $countryValidator->validate();

        $countryRepository = new CountryRepository();

        DB::beginTransaction();
        $country = $countryRepository->create($data);

        // if(empty($country) || !AuthorizeTransactionService::run()) {
        //     DB::rollBack();
        //     throw new Exception("Unauthorized transaction.");
        // }
        DB::commit();


        return $country;
    }

}
