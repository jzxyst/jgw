<?php

namespace App\Orm;

use Illuminate\Database\Eloquent\Model;

class WorkState extends Model
{
    protected $primaryKey = 'work_state_id';

    protected $hidden = [
        'created_at', 'updated_at'
    ];

    public function workStateGroup()
    {
        return $this->hasOne(\App\Orm\WorkStateGroup::class, 'work_state_group_id', 'work_state_group_id');
    }
}
