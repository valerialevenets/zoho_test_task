<?php
/**
 * Created by PhpStorm.
 * User: valeria
 * Date: 4/22/18
 * Time: 9:02 PM
 */

namespace App\Services;

use GuzzleHttp\Client;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Config;

class ZohoAuthorization
{
    public static function getAuthToken()
    {
        $token = self::getToken();
        if (!empty($token)) {
            return $token;
        }
        $token = self::parseToken(self::body());
        self::setToken($token);
        return $token;
    }

    private static function body()
    {
        return (new Client())->request(
            'GET',
            "https://accounts.zoho.com/apiauthtoken/nb/create", ['query' => self::requestParams()]
        )->getBody()->getContents();
    }

    private static function requestParams() {
        return [
            'SCOPE' => 'ZohoCRM/crmapi',
            'EMAIL_ID' => Config::get('settings.email'),
            'PASSWORD' => Config::get('settings.password'),
            'DISPLAY_NAME' => 'zohoapitest'
        ];
    }

    private static function parseToken($body)
    {
        $token = null;
        if (!preg_match("/AUTHTOKEN=(\w+)/", $body, $token)) {
            throw new \Exception('Cant Authorize');
        }
        return $token[1];
    }

    private static function getToken()
    {
        return Redis::get('token');
    }

    private static function setToken($value)
    {
        return Redis::set('token', $value);
    }
}