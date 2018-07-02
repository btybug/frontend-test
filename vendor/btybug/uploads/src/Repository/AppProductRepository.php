<?php

namespace Btybug\Uploads\Repository;

use Btybug\btybug\Repositories\GeneralRepository;
use Btybug\Uploads\Models\AppProduct;

class AppProductRepository extends GeneralRepository
{
    /**
     * @return mixed
     */

    public function model ()
    {
        return new AppProduct();
    }

    public function allConnectedToClient ($client_id)
    {
        return $this->model()
            ->leftJoin('oauth_client_product', function ($join) use ($client_id) {
                $join->on('app_products.id', '=', 'oauth_client_product.app_product_id')->where('oauth_client_id', '=', $client_id);
            })->select('oauth_client_product.status as connection_status', 'app_products.*')
            ->get();
    }
}