<?php
/**
 * Copyright (c) 2017.
 * *
 *  * Created by PhpStorm.
 *  * User: Edo
 *  * Date: 10/3/2016
 *  * Time: 10:44 PM
 *
 */


namespace Btybug\Console\Models;

use Btybug\Uploads\Models\AppProduct;
use Illuminate\Database\Eloquent\Model;
use Laravel\Passport\Client;

class OauthClientProducts extends Model
{
    /**
     * @var string
     */
    protected $table = 'oauth_client_product';
    /**
     * @var array
     */
    protected $guarded = ['id'];
    /**
     * @var array
     */
    protected $dates = ['created_at', 'updated_at'];

    public function product()
    {
        return $this->belongsTo(AppProduct::class,'app_product_id');
    }

    public function client()
    {
        return $this->belongsTo(Client::class,'oauth_client_id');
    }


}
