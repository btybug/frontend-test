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

namespace Btybug\Uploads\Models;

use Illuminate\Database\Eloquent\Model;

class VersionProfiles extends Model
{
    /**
     * @var string
     */
    protected $table = 'version_profiles';
    /**
     * @var array
     */
    protected $guarded = ['id'];
    /**
     * @var array
     */
    protected $dates = ['created_at', 'updated_at'];

    protected $casts = [
        'files' => 'json'
    ];

    public function user ()
    {
        return $this->belongsTo('Btybug\User\User', 'user_id', 'id');
    }
}
