<?php

namespace App\Libs\ExternalApi;

class RomaziAiueo
{
    private static $maxResponseRowNum = 100;
    /**
     * randomnamen APIのレスポンスを返す
     * @param int $num
     * @return mixed|\Psr\Http\Message\ResponseInterface
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    private static function getRandomName($num)
    {
        $num = min($num, self::$maxResponseRowNum);

        $client = new \GuzzleHttp\Client([
        ]);

        $response = $client->request(
            'GET',
            'https://green.adam.ne.jp/roomazi/cgi-bin/randomname.cgi',
            [
                'allow_redirects' => true,
                'query' => [
                    'n' => $num
                ]
            ]
        );

        return $response;
    }


    /**
     * ランダムな氏名データを取得する
     * @param int $num
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public static function getUser($num = 1)
    {
        // レスポンスを取得
        $response = self::getRandomName($num);
        $jsonp = (string)$response->getBody();

        // JSONP→JSON
        $json = \Jzxyst\Util\Json::convertJsonpToJson($jsonp);

        // JSON→array
        $users = json_decode($json, true);

        // check error
        if ($users['err'] == 1) {
            return [];
        }

        return $users['name'];
    }

    /**
     * @return int
     */
    public static function getMaxResponseRowNum()
    {
        return self::$maxResponseRowNum;
    }
}