<?php
/**
 * Created by PhpStorm.
 * User: Comp1
 * Date: 12/5/2016
 * Time: 4:39 PM
 */

namespace Btybug\User\Models;

use Illuminate\Database\Eloquent\Model;


class Membership extends Model
{
    protected $table = 'memberships';
    protected $guarded = ['id'];
}