<?php

namespace Btybug\FrontSite\Models;

use Illuminate\Database\Eloquent\Model;
use Btybug\User\User;

class Bugs extends Model
{
    protected $table = 'bugs';

    protected $guarded = ['id'];

    protected $dates = ['created_at', 'updated_at'];

    protected $casts = [
        'img_url' => 'json',
        'gif' => 'json',
        'location' => 'json'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id');
    }
}