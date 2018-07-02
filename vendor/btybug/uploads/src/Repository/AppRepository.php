<?php

namespace Btybug\Uploads\Repository;

use Btybug\btybug\Repositories\GeneralRepository;
use Btybug\Uploads\Models\App;

class AppRepository extends GeneralRepository
{
    /**
     * @return mixed
     */

    public function model ()
    {
        return new App();
    }
}