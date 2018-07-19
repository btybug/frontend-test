<?php

namespace Btybug\Uploads\Repository;

use Btybug\btybug\Repositories\GeneralRepository;
use Btybug\Uploads\Models\unit_studio;

class UnitStudioRepository extends GeneralRepository
{
    /**
     * @return mixed
     */

    public function model ()
    {
        return new unit_studio();
    }

}