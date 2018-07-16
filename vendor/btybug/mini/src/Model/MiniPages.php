<?php
/**
 * Created by PhpStorm.
 * User: menq
 * Date: 07.07.2018
 * Time: 20:31
 */

namespace Btybug\Mini\Model;

use Illuminate\Database\Eloquent\Model;

class MiniPages extends Model
{
    protected $table = 'minicms_pages';
    protected $guarded = ['id'];
    protected $dates = ['created_at', 'updated_at'];
}