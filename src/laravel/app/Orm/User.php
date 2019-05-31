<?php

namespace App\Orm;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Hash;
use Laravel\Passport\HasApiTokens;

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
        $this->setRawAttributes(array_merge($this->attributes, [
            'unique_id' => self::generateUniqueId()
        ]), true);

        parent::__construct($attributes);
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
}
