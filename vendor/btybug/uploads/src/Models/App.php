<?php namespace Btybug\Uploads\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Created by PhpStorm.
 * User: edo
 * Date: 08.01.2018
 * Time: 23:10
 */
class App extends Model
{
    protected $table = 'apps';

    protected $guarded = ['id'];

    const statuses = [
        'inactive' => 0,
        'active'   => 1
    ];

    public function products ()
    {
        return $this->hasMany(AppProduct::class, 'app_id');
    }
}