<?php

namespace Btybug\Uploads\Repository;

use Btybug\btybug\Repositories\GeneralRepository;
use Btybug\Uploads\Models\UnitStudio;

class UnitStudioRepository extends GeneralRepository
{
    /**
     * @return mixed
     */

    public function model ()
    {
        return new UnitStudio();
    }

}