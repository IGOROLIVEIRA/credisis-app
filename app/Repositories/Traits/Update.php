<?php

namespace App\Repositories\Traits;

use Illuminate\Database\Eloquent\Model;

trait Update
{
    /**
     * Update a record
     *
     * @param array $data
     * @param int|string $id
     * @param string $field
     * @return bool
     */
    public function update(array $data, $id, $field = "id"): bool
    {
        return $this->entity->where($field, '=', $id)->update($data);
    }

}
