<?php

namespace App\Orm;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Hash;
use Laravel\Passport\HasApiTokens;
use phpDocumentor\Reflection\Types\Integer;

class User extends Authenticatable
{
    use SoftDeletes, HasApiTokens, Notifiable;

    protected $primaryKey = 'user_id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'email', 'first_name', 'last_name', 'sex_id', 'position_id', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'email_verified_at'
    ];

    /**
     * The attributes that default value for create.
     *
     * @var array
     */
    protected $attributes = [
        'sex_id' => \App\Enums\Sex::NOT_KNOWN,
        'position_id' => \App\Enums\Position::NotSet,
    ];

    /**
     * The attributes that append to array.
     *
     * @var array
     */
    protected $appends = [
        'sex',
        'position',
    ];

    /**
     * User constructor.
     * @param array $attributes
     */
    public function __construct(array $attributes = [])
    {
        $this->setRawAttributes(
            array_merge(
                $this->attributes,
                self::getDefaultValue()
            ),
            true
        );

        parent::__construct($attributes);
    }

    /**
     * @return array
     */
    public static function getDefaultValue()
    {
        return [
            'unique_id' => self::generateUniqueId()
        ];
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function sex()
    {
        return $this->hasOne(\App\Orm\Sex::class, 'sex_id', 'sex_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function position()
    {
        return $this->hasOne(\App\Orm\Position::class, 'position_id', 'position_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function userWorkStatus()
    {
        return $this->hasOne(\App\Orm\UserWorkStatus::class, 'user_id', 'user_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function userRoles()
    {
        return $this->hasMany(\App\Orm\UserRole::class, 'user_id', 'user_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function roles()
    {
        return $this->belongsToMany(\App\Orm\Role::class, 'user_roles', 'user_id', 'role_id');
    }

    /**
     * @return mixed
     * @todo 多分もっといい書き方がある...
     */
    public function getSexAttribute()
    {
        return \App\Orm\Sex::find($this->attributes['sex_id']);
    }

    /**
     * @return mixed
     * @todo 多分もっといい書き方がある...
     */
    public function getPositionAttribute()
    {
        return \App\Orm\Position::find($this->attributes['position_id']);
    }

    /**
     * @param $value
     * @return mixed
     */
    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = self::hashPassword($value);
    }

    /**
     * @param $value
     * @return mixed
     */
    public function setUniqueIdAttribute($value)
    {
        $this->attributes['unique_id'] = self::generateUniqueId();
    }

    /**
     * Hash password.
     * @param $password
     * @return string
     */
    public static function hashPassword($password)
    {
        // Hash password
        return Hash::make($password);
    }

    /**
     * Return whether password match.
     * @param $password
     * @param User $orm
     * @return bool
     */
    public static function isMatchPassword($password, User $orm)
    {
        return Hash::check($password, $orm['password']);
    }

    /**
     * Generate unique id.
     * @return string
     */
    public static function generateUniqueId()
    {
        return uniqid(rand(), true);
    }

    /**
     * Return that is match user id.
     * @param $user
     * @return bool
     */
    public function isSameUser($user)
    {
        $userId = null;

        if (is_integer($user)) {
            $userId = $user;
        } elseif (get_class($user) === User::class) {
            $userId = $user->user_id;
        }

        return $this->user_id === $userId;
    }

    /**
     * Return policy collection.
     * @return \Illuminate\Support\Collection
     */
    public function getPolicies()
    {
        $policies = collect();
        foreach ($this->roles as $role) {
            $policies = $policies->concat($role->policies);
        }

        return $policies;
    }

    /**
     * @param $entryPoint
     * @return bool
     */
    public function hasPolicy($entryPoint)
    {
        $policies = $this->getPolicies();
        return boolval($policies->filter(function($policy) use ($entryPoint) {
            return $policy->isMatchEntryPoint($entryPoint);
        })->count());
    }
}
