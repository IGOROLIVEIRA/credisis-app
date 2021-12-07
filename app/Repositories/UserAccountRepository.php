<?php

namespace App\Repositories;

use App\Models\UserAccount;
use App\Repositories\Traits\FindBy;
use App\Repositories\Traits\Update;

final class UserAccountRepository extends BaseRepository
{

    use FindBy, Update;
    /**
     * create a isntance of UserAccount for entiry
     *
     * @param State $entity
     */
    public function __construct()
    {
        parent::__construct(new UserAccount());
    }

}
