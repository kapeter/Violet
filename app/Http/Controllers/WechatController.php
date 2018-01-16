<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Overtrue\Socialite\User as SocialiteUser;

class WechatController extends Controller
{

    /**
     * 处理微信的请求消息
     *
     * @return string
     */
    public function serve()
    {
        $app = app('wechat.official_account');

        $app->server->push(function($message){
            return "欢迎关注 kapeter";
        });

        return $app->server->serve();
    }
}
