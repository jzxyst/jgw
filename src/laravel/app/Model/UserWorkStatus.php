<?php
namespace App\Model;

use App\Orm\UserWorkStatusLog;

class UserWorkStatus extends ModelBase
{
    protected static $className = 'UserWorkStatus';

    /**
     * Change user work status.
     * @param int $userId
     * @param int $workStateId
     * @return mixed
     */
    public static function punch($userId, $workStateId)
    {
        $user = \App\Orm\User::find($userId);

        // No record.
        if (isset($user) === false) {
            return null;
        }

        $userWorkStatus = \DB::transaction(function () use ($userId, $workStateId) {

            // Insert log.
            $userWorkStatusLog = \App\Orm\UserWorkStatusLog::create([
                'user_id' => $userId,
                'work_state_id' => $workStateId
            ]);

            // Update user state by log id.
            $userWorkStatus = \App\Orm\UserWorkStatus::updateOrCreate([
                'user_id' => $userId
            ], [
                'user_work_status_log_id' => $userWorkStatusLog['user_work_status_log_id']
            ]);

            return $userWorkStatus;
        });

        return $userWorkStatus;
    }
}
