<?php

namespace Btybug\Mini\Repositories;

use Btybug\btybug\Repositories\GeneralRepository;
use Btybug\Mini\Model\FormBuilderFor;

class FormBuilderForRepository extends GeneralRepository
{
    public function model()
    {
        return new FormBuilderFor;
    }
}