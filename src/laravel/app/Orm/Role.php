<?php

namespace App\Orm;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $primaryKey = 'role_id';

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function rolePolicies()
    {
        return $this->hasMany(\App\Orm\RolePolicy::class, 'role_id', 'role_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function policies()
    {
        return $this->belongsToMany(\App\Orm\Policy::class, 'role_policies', 'role_id', 'policy_id');
    }
}
