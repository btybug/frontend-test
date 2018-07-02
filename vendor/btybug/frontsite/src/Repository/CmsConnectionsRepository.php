<?php
/**
 * Created by PhpStorm.
 * User: Arakelyan
 * Date: 31-Jul-17
 * Time: 18:05
 */

namespace Btybug\FrontSite\Repository;


use Btybug\btybug\Repositories\GeneralRepository;
use Btybug\FrontSite\Models\ClassifierItemPage;
use Btybug\FrontSite\Models\CmsConnections;

class CmsConnectionsRepository extends GeneralRepository
{
    public function model()
    {
        return new CmsConnections();
    }

}