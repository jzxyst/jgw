<?php

namespace App\Orm;

use Illuminate\Database\Eloquent\Model;

class UserWorkStatus extends Model
{
    protected $primaryKey = 'user_work_status_id';

    protected $fillable = [
        'user_id', 'user_work_status_log_id'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function userWorkStatusLog()
    {
        return $this->hasOne('\App\Orm\UserWorkStatusLog', 'user_work_status_log_id', 'user_work_status_log_id');
    }
}
