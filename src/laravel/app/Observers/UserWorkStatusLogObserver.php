<?php

namespace App\Observers;

use App\Orm\UserWorkStatusLog;

class UserWorkStatusLogObserver
{
    /**
     * Handle the user work status log "created" event.
     *
     * @param  \App\Orm\UserWorkStatusLog  $userWorkStatusLog
     * @return void
     */
    public function created(UserWorkStatusLog $userWorkStatusLog)
    {
        // 書き出したログのIDで更新する
        \App\Orm\UserWorkStatus::updateOrCreate([
            'user_id' => $userWorkStatusLog->user_id,
        ], [
            'user_work_status_log_id' => $userWorkStatusLog->user_work_status_log_id
        ]);
    }

    /**
     * Handle the user work status log "updated" event.
     *
     * @param  \App\Orm\UserWorkStatusLog  $userWorkStatusLog
     * @return void
     */
    public function updated(UserWorkStatusLog $userWorkStatusLog)
    {
        //
    }

    /**
     * Handle the user work status log "deleted" event.
     *
     * @param  \App\Orm\UserWorkStatusLog  $userWorkStatusLog
     * @return void
     */
    public function deleted(UserWorkStatusLog $userWorkStatusLog)
    {
        //
    }

    /**
     * Handle the user work status log "restored" event.
     *
     * @param  \App\Orm\UserWorkStatusLog  $userWorkStatusLog
     * @return void
     */
    public function restored(UserWorkStatusLog $userWorkStatusLog)
    {
        //
    }

    /**
     * Handle the user work status log "force deleted" event.
     *
     * @param  \App\Orm\UserWorkStatusLog  $userWorkStatusLog
     * @return void
     */
    public function forceDeleted(UserWorkStatusLog $userWorkStatusLog)
    {
        //
    }
}
