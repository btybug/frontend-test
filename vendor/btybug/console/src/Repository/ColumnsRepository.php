<?php
/**
 * Created by PhpStorm.
 * User: Sahak/Edo
 * Date: 8/8/2016
 * Time: 1:31 PM
 */

namespace Btybug\Console\Repository;

use Btybug\btybug\Repositories\GeneralRepository;
use Btybug\Console\Models\Columns;

/**
 * Class AdminPagesRepository
 * @package Btybug\Console\Repository
 */
class ColumnsRepository extends GeneralRepository
{


    /**
     * @return AdminPages
     */
    public function model()
    {
        return new Columns();
    }

}