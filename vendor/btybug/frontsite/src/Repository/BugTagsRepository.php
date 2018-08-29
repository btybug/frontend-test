<?php

namespace Btybug\FrontSite\Repository;

use Btybug\btybug\Repositories\GeneralRepository;
use Btybug\FrontSite\Models\Bugs;
use Btybug\FrontSite\Models\BugTags;
use Btybug\FrontSite\Models\SocialProfile;

class BugTagsRepository extends GeneralRepository
{

    public function model()
    {
        return new BugTags();
    }

}