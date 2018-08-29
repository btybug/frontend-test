<?php

namespace Btybug\FrontSite\Repository;

use Btybug\btybug\Repositories\GeneralRepository;
use Btybug\FrontSite\Models\Bugs;
use Btybug\FrontSite\Models\SocialProfile;

class BugsRepository extends GeneralRepository
{

    public function model()
    {
        return new Bugs();
    }

    public function slectByuser($user){
        $bugs = Bugs::where('user_id',$user->user_id)->get();
        return $bugs;
    }
}