<?php

namespace Btybug\FrontSite\Models;

use Illuminate\Database\Eloquent\Model;


class BugTags extends Model
{
    protected $table = 'bug_tags';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['bug_id','tag_id'];

    public function bugs()
    {
        return $this->belongsTo(Bugs::class, 'id');
    }

    public function tags()
    {
        return $this->belongsTo(Tag::class, 'id');
    }


}
