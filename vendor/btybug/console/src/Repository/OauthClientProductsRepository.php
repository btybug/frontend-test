<?php
/**
 * Created by PhpStorm.
 * User: Sahak/Edo
 * Date: 8/8/2016
 * Time: 1:31 PM
 */

namespace Btybug\Console\Repository;

use Btybug\btybug\Repositories\GeneralRepository;
use Btybug\Console\Models\OauthClientProducts;

/**
 * Class OauthClientProductsRepository
 * @package Btybug\Console\Repository
 */
class OauthClientProductsRepository extends GeneralRepository
{


    /**
     * @return AdminPages
     */
    public function model()
    {
        return new OauthClientProducts();
    }

    public function onOff($client_id, $product_id)
    {
        $is_defined = $this->findOneByMultiple(['oauth_client_id' => $client_id, 'app_product_id' => $product_id, 'status' => 1]);
        ($is_defined) ? $i = 0 : $i = 1;
        return $this->updateOrCreate(['oauth_client_id' => $client_id, 'app_product_id' => $product_id], ['status' => $i]);
    }

}