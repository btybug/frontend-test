<?php

namespace Btybug\Mini\Repositories;

use Btybug\btybug\Repositories\GeneralRepository;
use Btybug\Mini\Model\FormBuildedFor;

class FormBuildedForRepository extends GeneralRepository
{
    public function model()
    {
        return new FormBuildedFor();
    }
}