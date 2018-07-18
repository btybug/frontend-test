<?php

namespace Btybug\FrontSite\Models;

use Illuminate\Database\Eloquent\Model;


class Tag extends Model
{
    /**
     * @var string
     */
    protected $table = 'tags';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name'];

    public static function boot()
    {
        self::creating(function ($model) {
            if (self::where('name', $model->name)->count()) {
                return false;
            }
        });
    }

}
