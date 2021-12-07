<?php
namespace App\Services\Country;

use App\Models\Country;
use App\Validators\CountryValidator;
use App\Repositories\CountryRepository;
use App\Services\ServiceInterface;
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
        $countryValidator = new CountryValidator($data['data']);
        $countryValidator->validate();

        $countryRepository = new CountryRepository();

        DB::beginTransaction();
        $country = $countryRepository->delete($data['id']);
        DB::commit();

        return $country;
    }

}
