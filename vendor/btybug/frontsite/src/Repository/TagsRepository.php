<?php

namespace Btybug\FrontSite\Repository;

use Btybug\btybug\Repositories\GeneralRepository;
use Btybug\FrontSite\Models\Tag;

class TagsRepository extends GeneralRepository
{
    public function model()
    {
        return new Tag();
    }
}