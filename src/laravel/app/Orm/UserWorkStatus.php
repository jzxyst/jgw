<?php

namespace App\Orm;

use Illuminate\Database\Eloquent\Model;

class UserWorkStatus extends Model
{
    protected $primaryKey = 'user_work_status_id';

    protected $fillable = [
        'user_id', 'user_work_status_log_id'
    ];

    protected $hidden = [
        'user_work_status_id', 'user_work_status_log_id', 'created_at', 'updated_at'
    ];

    protected $appends = [
        'work_state_log',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function userWorkStatusLog()
    {
        return $this->hasOne(\App\Orm\UserWorkStatusLog::class, 'user_work_status_log_id', 'user_work_status_log_id');
    }

    /**
     * @return mixed
     * @todo 多分もっといい書き方がある...
     */
    public function getWorkStateLogAttribute()
    {
        return \App\Orm\UserWorkStatusLog::find($this->attributes['user_work_status_log_id']);
    }
}
