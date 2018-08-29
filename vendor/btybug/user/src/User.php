<?php

namespace Btybug\User;

use Auth;
use Btybug\FrontSite\Models\Bugs;
use Btybug\FrontSite\Models\FrontendPage;
use Btybug\FrontSite\Models\SocialProfile;
use File;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Btybug\User\Models\Roles;
use Btybug\User\Models\UsersProfile;
use Btybug\User\Traits\ShinobiTrait;
use Illuminate\Notifications\Notifiable;
use Illuminate\Queue\SerializesModels;
use Laravel\Passport\HasApiTokens;

/**
 * Class User
 * @package Btybug\User
 */
class User extends Authenticatable
{

    use Notifiable,CanResetPassword, ShinobiTrait,HasApiTokens;
    /**
     *
     */
    const ROLE_SUPERADMIN = 1;
    /**
     *
     */
    const ROLE_SUPERADMIN_SLUG = 'superadmin';
    /**
     *
     */
    const ROLE_ADMIN = 2;
    /**
     *
     */
    const MAX_UPLOAD_FILE_SIZE = 10240;
    /**
     *
     */
    const PER_PAGE = 40;
    /**
     * @var string
     */
    public static $uploadPath = '/resources/assets/images/users/';
    /**
     * @var array
     */
    public static $defaultRoles = [
        self::ROLE_SUPERADMIN,
        self::ROLE_ADMIN
    ];
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $guarded = ['id'];
    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];
    /**
     * The attributes which using Carbon.
     *
     * @var array
     */
    protected $dates = ['created_at', 'updated_at'];

    protected $casts = [
        'memberships' => 'json',
        'special_access' => 'json',
    ];

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $_SESSION[$this->getTable()] = &$this;
    }

    /**
     * @param $username
     * @param $token
     * @return mixed
     */
    public static function checkUserActivation($username, $token)
    {
        return self::where('username', $username)->where('token', $token)->first();
    }

    /**
     *
     */
    protected static function boot()
    {
        parent::boot();
        static::deleting(function ($model) {
            $profile = UsersProfile::where('user_id', $model->id);
            if ($profile) $profile->delete();
        });
    }

    /**
     * @return array
     */
    public function getDates()
    {
        return ['created_at', 'updated_at'];
    }

    /**
     * @param $query
     */
    public function scopeActive($query)
    {
        $query->where('status', '=', 'active');
    }

    #region getUsersByRole

    /**
     * @return object
     */
    public function scopeAdmins($query)
    {

        return $query->whereHas('role', function ($relationQuery) {
            $relationQuery->where('access', Roles::ACCESS_TO_BACKEND)
                ->orWhere('access', Roles::ACCESS_TO_BOTH);
        });
    }
    #endregion getUsersByRole

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function role()
    {
        return $this->belongsTo('Btybug\User\Models\Roles', 'role_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function profile()
    {
        return $this->hasOne('Btybug\User\Models\UsersProfile');
    }

    public function usersActivity()
    {
        return $this->hasOne('Btybug\User\Models\UsersActivity');
    }

    public function membership()
    {
        return $this->hasOne(\Btybug\User\Models\Membership::class, 'id', 'membership_id');
    }

    public function frontPages()
    {
       return $this->hasMany(FrontendPage::class,'user_id') ;
    }

    public function socialProfile()
    {
        return $this->hasOne(SocialProfile::class,'user_id') ;
    }
    public function bugits()
    {
        return $this->hasMany(Bugs::class,'user_id','id') ;
    }

    public function recivesBroadcastNotificationsOn()
    {

    }
}

