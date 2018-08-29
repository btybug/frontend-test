<?php

namespace Btybug\FrontSite\Models;

use Btybug\User\User;
use Illuminate\Database\Eloquent\Model;


class BugUsers extends Model
{
    protected $table = 'bugs_users';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['bugs_id','user_id'];

    public function bugs()
    {
        return $this->belongsTo(Bugs::class, 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'id');
    }


}
