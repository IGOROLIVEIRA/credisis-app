<?php
namespace App\Services;

use App\Validators\CountryValidator;
use App\Repositories\CountryRepository;
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

        DB::beginTransaction();
        $country = $countryRepository->create($data);

        // if(empty($country) || !AuthorizeTransactionService::run()) {
        //     DB::rollBack();
        //     throw new Exception("Unauthorized transaction.");
        // }
        DB::commit();


        return true;
    }

}
