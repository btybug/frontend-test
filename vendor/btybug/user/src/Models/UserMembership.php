<?php
/**
 * Created by PhpStorm.
 * User: Comp1
 * Date: 12/5/2016
 * Time: 4:25 PM
 */

namespace Btybug\User\Models;

use Illuminate\Database\Eloquent\Model;
use Btybug\User\Traits\ShinobiTrait;

class UserMembership extends Model
{
    use ShinobiTrait;
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'user_membership';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id'];
    /**
     * The attributes which using Carbon.
     *
     * @var array
     */
    protected $dates = ['created_at', 'updated_at'];


    public function membership()
    {
        return $this->belongsTo('Btybug\User\Models\Membership', 'membership_id', 'id');
    }
}