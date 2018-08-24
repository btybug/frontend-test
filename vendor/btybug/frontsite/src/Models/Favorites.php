<?php

namespace Btybug\FrontSite\Models;

use Btybug\User\User;
use Btybug\FrontSite\Models\SocialProfile;
use Btybug\FrontSite\Models\Bugs;
use Illuminate\Database\Eloquent\Model;

class Favorites extends Model
{
    protected $table = 'favorites';

    protected $guarded = ['id'];

    protected $dates = ['created_at', 'updated_at'];


    public function SocialProfile()
    {
        return $this->hasMany(SocialProfile::class, 'user_id');
    }
    public function Bugs()
    {
        return $this->hasMany(Bugs::class, 'id');
    }
}
