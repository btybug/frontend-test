<?php

namespace Btybug\FrontSite\Repository;

use Btybug\btybug\Repositories\GeneralRepository;
use Btybug\FrontSite\Models\SocialProfile;

class SocialProfileRepository extends GeneralRepository
{

    public function model()
    {
        return new SocialProfile();
    }
}