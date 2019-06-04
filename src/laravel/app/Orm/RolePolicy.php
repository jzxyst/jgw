<?php

namespace App\Orm;

use Illuminate\Database\Eloquent\Model;

class RolePolicy extends Model
{
    protected $primaryKey = 'role_policy_id';

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function policy()
    {
        return $this->hasOne(\App\Orm\Policy::class, 'policy_id', 'policy_id');
    }
}
