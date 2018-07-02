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

/**
 * Created by PhpStorm.
 * User: Comp2
 * Date: 11/8/2016
 * Time: 10:59 PM
 */

namespace Btybug\FrontSite\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class AdminPages
 * @package Btybug\Backend\Models
 */
class CmsConnections extends Model
{


    /**
     * @var string
     */
    protected $table = 'cms_connections';


    /**
     * @var array
     */
    protected $dates = ['created_at', 'updated_at'];


    /**
     * @var array
     */
    protected $guarded = ['id'];


}