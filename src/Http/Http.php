<?php

namespace Paragraf\ViberBot\Http;

use Curl\Curl;

class Http
{
    public static $BASE_URL = 'https://chatapi.viber.com/pa/';

    public static $HEADERS = [
        'X-Viber-Auth-Token' => '',
        'Content-Type' => 'application/json',
    ];

    public static function call(string $method, string $url, array $body = [], bool $baseUrlActive = true)
    {
        static::$HEADERS['X-Viber-Auth-Token'] = config('viberbot.api-key');

        $curl = new Curl();
        $curl->setHeaders(static::$HEADERS);

        if ($method === 'POST') {
            $curl->post(($baseUrlActive ? static::$BASE_URL : '').$url, json_encode($body));

            if ($curl->error) {
                return json_encode('Error: '.$curl->errorCode.': '.$curl->errorMessage."\n");
            }

            return $curl->response;
        }

        if ($method === 'GET') {
            $curl->get(($baseUrlActive ? static::$BASE_URL : '').$url, $body);

            if ($curl->error) {
                return json_encode('Error: '.$curl->errorCode.': '.$curl->errorMessage."\n");
            }

            return $curl->response;
        }

        if ($method === 'PUT') {
            $curl->put(($baseUrlActive ? static::$BASE_URL : '').$url, json_encode($body));
        }

        if ($method === 'PATCH') {
            $curl->patch(($baseUrlActive ? static::$BASE_URL : '').$url, json_encode($body));
        }
    }
}
