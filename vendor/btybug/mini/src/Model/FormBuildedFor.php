<?php

namespace Btybug\Mini\Model;

use Illuminate\Database\Eloquent\Model;


class FormBuildedFor extends Model
{
    /**
     * @var string
     */
    protected $table = 'form_builded_for';
    /**
     * @var array
     */
    protected $guarded = ['id'];

    protected $casts = [
        'form_data' => 'json'
    ];

    public function users(){

    }

}
