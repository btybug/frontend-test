<?php

namespace Btybug\Uploads\Repository;

use Btybug\btybug\Repositories\GeneralRepository;
use Btybug\Uploads\Models\formBuilder;

class FormBuilderRepository extends GeneralRepository
{
    /**
     * @return mixed
     */

    public function model ()
    {
        return new formBuilder();
    }

}