<?php
/**
 * Created by PhpStorm.
 * User: Comp2
 * Date: 2/8/2017
 * Time: 2:17 PM
 */

namespace Btybug\FrontSite\Models;

use Btybug\User\User;
use Illuminate\Database\Eloquent\Model;
use Btybug\btybug\Models\Urlmanager;
use Btybug\User\Models\Membership;

/**
 * Class FrontendPage
 * @package Btybug\FrontSite\Models
 */
class FrontendPage extends Model
{
    /**
     * @var string
     */
    protected $table = 'frontend_pages';

    /**
     * @var array
     */
    protected $guarded = ['id'];

    protected $casts = [
        'page_layout_settings' => 'json',
        'memberships' => 'json',
        'special_access' => 'json',
        'css' => 'json',
        'js' => 'json',
        'js_cms' => 'json',
        'css_cms' => 'json',
    ];

    public static function addTags($tags, $id)
    {
        $tags = explode(',', $tags);
        $page = self::find($id);

        if (count($tags) && $page) {
            foreach ($tags as $tag) {
                $isTag = Tag::where('name', $tag)->first();
                if (!$isTag) {
                    $isTag = Tag::create(['name' => $tag]);
                }

                if (!$isTag->pages()->where('frontend_page_id', $id)->first()) {
                    $page->tags()->attach($isTag, ['id' => uniqid()]);
                }
            }
        }
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'frontend_pages_tags', 'frontend_page_id', 'tags_id', 'id');
    }

    public static function getMembershipByPage($id, $imploded = true)
    {
        $page = self::find($id);

        $page_membershipes = [];
        if ($page) {
            $parent = $page->parent;
            if (count($page->permission_membership)) {
                foreach ($page->permission_membership as $perm) {
                    if ($parent) {
                        if ($parent->permission_membership()->where('membership_id', $perm->membership->id)->first()) {
                            $page_membershipes[] = $perm->membership->slug;
                        }
                    } else {
                        $page_membershipes[] = $perm->membership->slug;
                    }

                }

                if ($imploded) {
                    return implode(',', $page_membershipes);
                } else {
                    return $page_membershipes;
                }

            }
        }
        if ($imploded) {
            return null;
        } else {
            return [];
        }
    }

    public static function getRolesByPage($id, $imploded = true)
    {
        $page = self::find($id);

        $page_roles = [];
        if ($page) {
            $parent = $page->parent;
            if (count($page->permission_role)) {
                foreach ($page->permission_role as $perm) {
                    if ($parent) {
                        if ($parent->permission_role()->where('role_id', $perm->role->id)->first()) {
                            $page_roles[] = $perm->role->slug;
                        }
                    } else {
                        if(isset($perm->role->slug)){
                            $page_roles[] = $perm->role->slug;
                        }

                    }

                }

                if ($imploded) {
                    return implode(',', $page_roles);
                } else {
                    return $page_roles;
                }

            }
        }
        if ($imploded) {
            return null;
        } else {
            return [];
        }
    }

    public static function checkAccess($page, $membership_slug)
    {
        $membership = Membership::where('slug', $membership_slug)->first();
        if ($page && $membership) {
            $access = $page->permission_membership()->where('membership_id', $membership->id)->first();
            if ($access) return true;
        }

        return false;
    }

    public static function PagesByModulesParent($module)
    {
        return self::where('module_id', $module->slug)->where('parent_id', NULL)->get();
    }

    protected static function boot()
    {

        parent::boot();
        static::deleting(
            function ($model) {
                if (count($model->childs)) {
                    foreach ($model->childs as $child) {
                        $child->delete();
                    }
                }
//                if ($model->urlmanager) {
//                    $manager = $model->urlmanager;
//                    $manager->delete();
//                }
            }
        );

//        static::created(
//            function ($model) {
//                Urlmanager::create([
//                    'front_page_id' => $model->id,
//                    'type' => $model->type,
//                    'url' => $model->url
//                ]);
//            }
//        );
//
//        static::updated(
//            function ($model) {
//                $url = Urlmanager::where('front_page_id', $model->id)->first();
//                if (!$url) {
//                    $url = Urlmanager::create(['front_page_id' => $model->id, 'url' => $model->url, 'type' => $model->type]);
//                } else {
//                    $url->update([
//                        'url' => $model->url
//                    ]);
//                }
//
//            }
//        );
    }

    public function permission_membership()
    {
        return $this->hasMany('Btybug\User\Models\MembershipPermissions', 'page_id', 'id');
    }

    public function permission_role()
    {
        return $this->hasMany('Btybug\User\Models\PermissionRole', 'page_id', 'id')->where('page_type', 'front');
    }

    /**
     * @param $query
     */
    public function scopeMain($query)
    {
        return $query->where('parent_id', NULL);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function parent()
    {
        return $this->belongsTo(FrontendPage::class, 'parent_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function childs()
    {
        return $this->hasMany(FrontendPage::class, 'parent_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function editor()
    {
        return $this->belongsTo('Btybug\User\User', 'edited_by', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function urlManager()
    {
        return $this->hasOne(Urlmanager::class, 'front_page_id');
    }
    public static function getMenus(){
        $front_pages = self::where('content_type','template')->with('childs')->get();
        return $front_pages;
    }
    public static function renderMenu($data){

        if(!count($data)){
            return '<li><a href="#">No menu items</a></li>';
        }
        $html = '';
        foreach ($data as $key => $settings){
            $children = $settings->childs;
            if(count($children)){
                $sub_menu = '';
                foreach ($children as $ch){
                    $sub_menu .= '<li><a href="'.$ch->url.'">'.$ch->title.'</a></li>';
                }
                $html .= '<li><a href="'.$settings->url.'">'.$settings->title.'</a><ul>'.$sub_menu.'</ul></li>';
            }else{
                $html .= '<li><a href="'.$settings->url.'">'.$settings->title.'</a></li>';
            }
        }
        return $html;
    }
}