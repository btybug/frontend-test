<?php

namespace Btybug\FrontSite\Models;

use Btybug\User\User;
use Illuminate\Database\Eloquent\Model;


class Score extends Model
{
    protected $table = 'score';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['user_id','bugs_id','ip_address','like_or_dislike'];

    public function bugs()
    {
        return $this->belongsTo(Bugs::class, 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'id');
    }


}
