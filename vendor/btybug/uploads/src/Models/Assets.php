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

use Illuminate\Database\Eloquent\Model;

class Assets extends Model
{
    /**
     * @var string
     */
    protected $table = 'assets';
    /**
     * @var array
     */
    protected $guarded = ['id'];

    /**
     * @var array
     */
    public function page ()
    {
        return $this->belongsTo(Units::class, 'unit_id');
    }
}
