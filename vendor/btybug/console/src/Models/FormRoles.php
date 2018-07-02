<?php

namespace Btybug\Console\Models;

use Illuminate\Database\Eloquent\Model;

class FormRoles extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'forms_roles';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = ['created_at'];
    /**
     * The attributes which using Carbon.
     *
     * @var array
     */
    protected $dates = ['created_at', 'updated_at'];

    public function form()
    {
        return $this->belongsTo(\Btybug\Console\Models\Forms::class, 'form_id');
    }

    public function role()
    {
        return $this->belongsTo(\Btybug\User\Models\Roles::class, 'role_id');
    }
}
