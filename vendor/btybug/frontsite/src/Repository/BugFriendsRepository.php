<?php

namespace Btybug\FrontSite\Repository;

use Btybug\btybug\Repositories\GeneralRepository;
use Btybug\FrontSite\Models\BugUsers;
use Btybug\FrontSite\Models\Bugs;
use Btybug\FrontSite\Models\BugTags;
use Btybug\FrontSite\Models\SocialProfile;

class BugFriendsRepository extends GeneralRepository
{

    public function model()
    {
        return new BugUsers();
    }

    public function save($bug_id,$friends)
    {
        foreach (explode(',',$friends) as $friend)
        {
            if ($friend != '')
            {
                $this->model->create(['user_id' => $friend,'bugs_id' => $bug_id]);
            }
        }
    }

}