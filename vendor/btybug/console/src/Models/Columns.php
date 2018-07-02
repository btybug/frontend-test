<?php
/**
 * Created by PhpStorm.
 * User: menq
 * Date: 19.12.2017
 * Time: 13:51
 */

namespace Btybug\Console\Models;


use Btybug\User\User;
use Illuminate\Database\Eloquent\Model;

class Columns extends Model
{
    /**
     * @var string
     */
    protected $table = 'columns';
    /**
     * @var array
     */
    protected $dates = ['created_at', 'updated_at'];
    /**
     * @var array
     */
    protected $guarded = array('id');

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}