<?php

namespace Btybug\FrontSite\Repository;

use Btybug\btybug\Repositories\GeneralRepository;
use Btybug\FrontSite\Models\BugUsers;
use Btybug\FrontSite\Models\Bugs;
use Btybug\FrontSite\Models\BugTags;
use Btybug\FrontSite\Models\SocialProfile;
use Btybug\FrontSite\Models\Score;

class ScoreRepository extends GeneralRepository
{

    public function model()
    {
        return new Score();
    }
}