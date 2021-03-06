<?php
/**
 * Created by PhpStorm.
 * User: shojan
 * Date: 11/27/2016
 * Time: 6:03 AM
 */

namespace Btybug\Console\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Forms
 * @package Btybug\Modules\Models\Models
 */
class Forms extends Model
{
    /**
     * @var string
     */
    public static $form_path = 'views' . DS . 'forms' . DS;
    /**
     * @var string
     */
    public static $form_file_ext = '.blade.php';
    public $fields;
    public $formData;
    public $collected;
    /**
     * @var string
     */
    protected $table = 'forms';
    /**
     * @var array
     */
    protected $guarded = ['id'];
    protected $casts = [
        'settings' => 'json'
    ];
    /**
     * The attributes which using Carbon.
     *
     * @var array
     */
    protected $dates = ['created_at', 'updated_at'];


    public function form_fields()
    {
        return $this->hasMany('\Btybug\Console\Models\FormFields', 'form_id', 'id');
    }

    public function form_roles()
    {
        return $this->hasMany('\Btybug\Console\Models\FormRoles', 'form_id', 'id');
    }


    public function fields()
    {
//        return $this->belongsToMany('\Btybug\Console\Models\Fields','form_fields','field_slug','form_id','id');
        return $this->hasManyThrough('\Btybug\Console\Models\Fields', '\Btybug\Console\Models\FormFields', 'form_id', 'slug','field_slug');
    }

    public function entries()
    {
        return $this->hasMany('\Btybug\Console\Models\FormEntries', 'form_id', 'id');
    }
}