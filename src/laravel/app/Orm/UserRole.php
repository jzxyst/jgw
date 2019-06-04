<?php

namespace App\Orm;

use Illuminate\Database\Eloquent\Model;

class UserRole extends Model
{
    protected $primaryKey = 'user_role_id';

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function role()
    {
        return $this->hasOne(\App\Orm\Role::class, 'role_id', 'role_id');
    }
}
