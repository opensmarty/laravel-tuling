<?php

namespace Jormin\TuLing;

use GuzzleHttp\Client;

/**
 * 图灵SDK库
 * @package Jormin\TuLing
 */
class TuLing{

    public static $server = 'http://www.tuling123.com/openapi/api';

    /**
     * 聊天消息
     *
     * @param $message
     * @param $userID
     * @param $location
     * @return mixed
     */
    public static function chat($message, $userID, $location){
        $params = [
            'key' => config('laravel-tuling.api_key'),
            'info' => $message,
            'userid' => $userID,
            'loc' => $location
        ];
        $client = new Client();
        $response = $client->post(self::$server, [
            'body' => json_encode($params)
        ]);
        return json_decode($response->getBody()->getContents(), true);
    }
}