<?php

namespace App\Repositories\Traits;

use Illuminate\Database\Eloquent\Model;

trait Delete
{
    /**
     * Delete a record
     *
     * @param $id
     * @return bool
     */
    public function delete($id): bool
    {
        return $this->entity->destroy($id);
    }
}
