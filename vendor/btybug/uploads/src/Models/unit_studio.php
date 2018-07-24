<?php

namespace App;

namespace Btybug\Uploads\Models;

use Illuminate\Database\Eloquent\Model;


class unit_studio extends Model
{
    /**
     * @var string
     */
    protected $table = 'unit_studio';
    /**
     * @var array
     */
    protected $guarded = ['id'];

    protected $casts = [
        'form_json' => 'json',
        'css' => 'json',
        'js' => 'json',
        'images' => 'json',
        'options' => 'json'
    ];

}
