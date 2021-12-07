<?php
namespace App\Services\Country;

use App\Models\Country;
use App\Validators\CountryValidator;
use App\Repositories\CountryRepository;
use App\Services\ServiceInterface;
use Illuminate\Support\Facades\DB;

final class UpdateService implements ServiceInterface
{

    /**
     * Update a Country
     *
     * @param array $data
     * @return Country
     */
    public static function run($data): Country
    {
        $countryValidator = new CountryValidator($data['data']);
        $countryValidator->validate();

        $countryRepository = new CountryRepository();

        DB::beginTransaction();
        $country = $countryRepository->update($data['data'], $data['id']);
        DB::commit();

        return $country;
    }

}
