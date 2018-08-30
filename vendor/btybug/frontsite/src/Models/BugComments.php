<?php
/**
 * Created by PhpStorm.
 * User: sahak
 * Date: 8/30/2018
 * Time: 10:20 PM
 */

namespace Btybug\FrontSite\Models;


use Btybug\User\User;
use Illuminate\Database\Eloquent\Model;

class BugComments extends Model
{
    protected $table = 'comments';

    protected $guarded = ['id'];

    protected $dates = ['created_at', 'updated_at'];

    public function bug()
    {
        return $this->belongsTo(Bugs::class,'bug_id');
    }
    public function author()
    {
        return $this->belongsTo(User::class,'author_id');
    }
    public function parent()
    {
        return $this->belongsTo(BugComments::class,'parent_id');
    }


}