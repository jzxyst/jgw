<?php

namespace App\Orm;

use Illuminate\Database\Eloquent\Model;
use App\Traits\UserWorkStatusLogObservable;

class UserWorkStatusLog extends Model
{
    use UserWorkStatusLogObservable;

    protected $primaryKey = 'user_work_status_log_id';

    protected $fillable = [
        'user_id', 'work_state_id', 'punched_at'
    ];

    public function workState()
    {
        return $this->hasOne(\App\Orm\WorkState::class, 'work_state_id', 'work_state_id');
    }
}
