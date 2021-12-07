<?php

namespace App\Repositories\Traits;

use Illuminate\Database\Eloquent\Collection;

trait Where
{

    /**
     * Get results with multiple conditions
     * need to be tested
     * @param $match
     * @param array $columns
     * @return Collection
     */
    public function where($match, $columns = array('*')): Collection
    {
        return $this->entity->where($match)->get($columns);
    }
}
