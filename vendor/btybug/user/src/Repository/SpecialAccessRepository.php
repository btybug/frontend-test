<?php
/**
 * Created by PhpStorm.
 * User: Sahak/Edo
 * Date: 8/8/2016
 * Time: 1:31 PM
 */

namespace Btybug\User\Repository;

use Btybug\btybug\Repositories\GeneralRepository;
use Btybug\User\Models\SpecialAccess;

class SpecialAccessRepository extends GeneralRepository
{
    public function model()
    {
        return new SpecialAccess();
    }
}