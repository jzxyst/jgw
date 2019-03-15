<?php

namespace App\Libs\Seeder;

class User
{
    private $request_interval = 1; // second

    public function getUser($num)
    {
        $results = [];
        while (count($results) < $num) {

            // 連続リクエスト時はインターバルを設ける
            if (count($results) > 0) {
                sleep($this->request_interval);
            }

            // 最大件数を超えないように取得
            $request_row_num = min($num - count($results), \App\Libs\ExternalApi\RomaziAiueo::getMaxResponseRowNum());
            $users = \App\Libs\ExternalApi\RomaziAiueo::getUser($request_row_num);

            // 取得件数が0件の場合は終了
            if (count($users) === 0) {
                break;
            }

            array_splice($results, count($results),0, $users);
        }

        return $results;
    }

    /**
     * @param int $request_interval
     * @return User
     */
    public function setRequestInterval($request_interval)
    {
        $this->request_interval = $request_interval;
        return $this;
    }

    /**
     * @return int
     */
    public function getRequestInterval()
    {
        return $this->request_interval;
    }
}