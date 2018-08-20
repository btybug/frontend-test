<?php

namespace Btybug\FrontSite\Models;

use Btybug\User\User;
use Illuminate\Database\Eloquent\Model;

class SocialProfile extends Model
{
    protected $table = 'social_profile';

    protected $guarded = ['id'];

    protected $dates = ['created_at', 'updated_at'];

    protected $casts = [
        'tags' => 'json',
        'social_media' => 'json',
        'location' => 'json'
    ];
    public function user()
    {
        return $this->belongsTo(User::class, 'id');
    }
}
