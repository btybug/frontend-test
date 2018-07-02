<?php

namespace Btybug\Framework\Models;

use Illuminate\Database\Eloquent\Model;


/**
 * Class Versions
 * @package Btybug\Framework\Models
 */
class DynamicComponentStyles extends Model
{
    protected $table = 'dynamic_component_styles';

    protected $fillable = ["id","table_dynamic_component_id","classname","styles"];
    protected $casts = [
        'styles' => 'json',
    ];
}
