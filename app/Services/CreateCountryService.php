<?php
namespace App\Services;

use App\Models\Country;
use App\Validators\CountryValidator;
use App\Repositories\CountryRepository;
use Exception;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;

final class CreateCountryService implements ServiceInterface
{

    /**
     * Create a Country
     *
     * @param array $data
     * @return void
     */
    public static function run($data): bool
    {
        $countryValidator = new CountryValidator($data);
        $countryValidator->validate();

        $countryRepository = new CountryRepository();
        $country = new Country($data);
        DB::beginTransaction();
        $country = $countryRepository->create($country);

        // if(empty($country) || !AuthorizeTransactionService::run()) {
        //     DB::rollBack();
        //     throw new Exception("Unauthorized transaction.");
        // }
        DB::commit();


        return true;
    }

}
