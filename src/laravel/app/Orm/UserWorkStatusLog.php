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

    protected $hidden = [
        'user_work_status_log_id', 'created_at', 'updated_at'
    ];

    protected $appends = [
        'work_state',
    ];

    public function workState()
    {
        return $this->hasOne(\App\Orm\WorkState::class, 'work_state_id', 'work_state_id');
    }

    /**
     * @return mixed
     * @todo 多分もっといい書き方がある...
     */
    public function getWorkStateAttribute()
    {
        return \App\Orm\WorkState::find($this->attributes['work_state_id']);
    }
}
