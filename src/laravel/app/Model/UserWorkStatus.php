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

            // Get current log.
            $currentUserWorkStatus = \App\Orm\UserWorkStatus::where('user_id', $userId)->first();

            // Insert new log.
            $nextUserWorkStatusLog = UserWorkStatusLog::create([
                'user_id' => $userId,
                'work_state_id' => $workStateId,
                'prev_user_work_status_log_id' => $currentUserWorkStatus['user_work_status_log_id'] ?? null
            ]);

            // Update current log.
            if (isset($currentUserWorkStatus)) {
                UserWorkStatusLog::find(
                    $currentUserWorkStatus['user_work_status_log_id']
                )->update([
                    'next_user_work_status_log_id' => $nextUserWorkStatusLog['user_work_status_log_id']
                ]);
            }

            // Update user state by log id.
            $userWorkStatus = \App\Orm\UserWorkStatus::updateOrCreate([
                'user_id' => $userId
            ], [
                'user_work_status_log_id' => $nextUserWorkStatusLog['user_work_status_log_id']
            ]);

            return $userWorkStatus;
        });

        return $userWorkStatus;
    }

    /**
     * Revert user work status log.
     * @param $userId
     * @param $times
     * @return mixed
     */
    public static function revert($userId, $times = 1)
    {
        $userWorkStatus = \DB::transaction(function () use ($userId, $times) {

            // Get user work state.
            $userWorkStatus = \App\Orm\UserWorkStatus::where('user_id', $userId)->first();
            if (isset($userWorkStatus) === false) {
                return null;
            }

            for ($i = 0 ; $i < $times; ++$i) {

                // Get current Log.
                $userWorkStatusLog = UserWorkStatusLog::find($userWorkStatus['user_work_status_log_id']);

                // Update user state by log id.
                $userWorkStatus->update([
                    'user_work_status_log_id' => $userWorkStatusLog['prev_user_work_status_log_id']
                ]);

                // Update next log id to null.
                UserWorkStatusLog::find(
                    $userWorkStatusLog['prev_user_work_status_log_id']
                )->update([
                    'next_user_work_status_log_id' => null
                ]);

                // Delete current log.
                $userWorkStatusLog->delete();
            }

            return $userWorkStatus;
        });

        return $userWorkStatus;
    }
}
