<?php

namespace Btybug\Uploads\Repository;

use Btybug\btybug\Repositories\GeneralRepository;
use Btybug\Uploads\Models\Units;

class UnitsRepository extends GeneralRepository
{
    /**
     * @return mixed
     */

    public function model ()
    {
        return new Units();
    }

    public function getWithGroupBy ($column = 'slug')
    {
        return $this->model()->get()->groupBy($column);
    }
}