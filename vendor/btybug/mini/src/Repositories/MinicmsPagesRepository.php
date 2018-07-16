<?php
/**
 * Created by PhpStorm.
 * User: menq
 * Date: 16.07.2018
 * Time: 14:08
 */

namespace Btybug\Mini\Repositories;

use Btybug\btybug\Repositories\GeneralRepository;
use Btybug\Mini\Model\MiniPages;

class MinicmsPagesRepository extends GeneralRepository
{
    public function model()
    {
        return new MiniPages();
    }
}