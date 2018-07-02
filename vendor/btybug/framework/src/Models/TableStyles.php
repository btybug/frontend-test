<?php

namespace Btybug\Framework\Models;

use Illuminate\Database\Eloquent\Model;


/**
 * Class Versions
 * @package Btybug\Framework\Models
 */
class TableStyles extends Model
{
    protected $table = 'table_styles';

    protected $fillable = ["id","table_css_id","classname","styles"];
    protected $casts = [
        'styles' => 'json',
    ];
}
