<?php

namespace Btybug\Uploads\Repository;

use Btybug\btybug\Repositories\GeneralRepository;
use Btybug\Uploads\Models\Studios;

class StudiosReposiory extends GeneralRepository
{
    /**
     * @return mixed
     */

    public function model ()
    {
        return new Studios();
    }

}