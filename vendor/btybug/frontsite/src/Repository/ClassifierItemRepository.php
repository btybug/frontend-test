<?php

namespace Btybug\FrontSite\Repository;

use Btybug\btybug\Repositories\GeneralRepository;
use Btybug\FrontSite\Models\ClassifierItem;


class ClassifierItemRepository extends GeneralRepository
{

    public function model()
    {
        return new ClassifierItem();
    }

    public function getAll ($columns = ['*'])
    {
        return $this->model()->get($columns);
    }

}