<?php

namespace Btybug\Framework\Models;

use Illuminate\Database\Eloquent\Model;


/**
 * Class Versions
 * @package Btybug\Framework\Models
 */
class Versions extends Model
{
    protected $table = 'versions';

    protected $guarded = ['id'];

    protected $dates = ['created_at', 'updated_at'];

    protected $appends = array('path');

    public function getPathAttribute()
    {
        if($this->env){
            return $this->file_name;
        }else{
            if ($this->type == 'css' || $this->type == 'framework') {
                $type = 'css';
            }else{
                $type = 'js';
            }
            if (\File::exists(public_path($type . "/versions/" . $this->name . "/" . $this->version . "/" . $this->file_name))) {
                return public_path($type . "/versions/" . $this->name . "/" . $this->version . "/" . $this->file_name);
            } else {
                if (\File::exists(public_path($type . "/versions/" . $this->file_name))) {
                    return public_path($type . "/versions/" . $this->file_name);
                }
            }
        }

        return null;
    }
}
