<?php
namespace App\Services\State;

use App\Repositories\StateRepository;
use App\Services\ServiceInterface;
use Illuminate\Database\Eloquent\Collection;

final class ListService implements ServiceInterface
{

    /**
     * List State
     *
     * @return Collection
     */
    public static function run($data): Collection
    {
        $stateRepository = new StateRepository();
        return $stateRepository->findAll();
    }

}
