<?php
/**
 * Created by PhpStorm.
 * User: menq
 * Date: 19.04.2018
 * Time: 11:07
 */

namespace Btybug\btybug\Models\Universal;


use Illuminate\Database\Eloquent\Model;

class CmsEditor extends Model
{
    protected $table = 'cms_editor';

    public static $instance;

    public function __construct()
    {

    }

    public function scopeShowEditor()
    {
        $settings = [];
        $html = \View::make('btybug::editor.show_editor', compact('settings'))->render();
        return $html;
    }

    public function showResult()
    {

    }
}