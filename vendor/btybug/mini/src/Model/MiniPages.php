<?php
/**
 * Created by PhpStorm.
 * User: menq
 * Date: 07.07.2018
 * Time: 20:31
 */

namespace Btybug\Mini\Model;

use Btybug\FrontSite\Models\FrontendPage;
use Illuminate\Database\Eloquent\Model;

class MiniPages extends Model
{
    protected $table = 'minicms_pages';
    protected $guarded = ['id'];
    protected $dates = ['created_at', 'updated_at'];

    public function front_pages()
    {
        return $this->hasMany(FrontendPage::class,'mini_page_id');
    }
}