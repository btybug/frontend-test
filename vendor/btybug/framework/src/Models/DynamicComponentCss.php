<?php

namespace Btybug\Framework\Models;

use Illuminate\Database\Eloquent\Model;


/**
 * Class Versions
 * @package Btybug\Framework\Models
 */
class DynamicComponentCss extends Model
{
    protected $table = 'dynamic_component_css';

    protected $fillable = ["id","slug","html"];

    public function styles(){
        return $this->hasMany(DynamicComponentStyles::class, 'table_dynamic_component_id', 'id');
    }
    public static function getByName($name){
        return self::where("slug",$name)->first();
    }
}
