<?php
/**
 * Copyright (c) 2017.
 * *
 *  * Created by PhpStorm.
 *  * User: Sahak
 *  * Date: 10/3/2016
 *  * Time: 10:44 PM
 *
 */

namespace Btybug\Uploads\Models;

use Btybug\FrontSite\Models\FrontendPage;
use Illuminate\Database\Eloquent\Model;

class Units extends Model
{
    /**
     * @var string
     */
    protected $table = 'units';
    /**
     * @var array
     */
    protected $guarded = ['id'];

    /**
     * @var array
     */
    public function page ()
    {
        return $this->belongsTo(FrontendPage::class, 'page_id');
    }
}
