<?php

namespace App\Http\Middleware;

use Overtrue\Socialite\User as SocialiteUser;
use Closure;

class GenerateUser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $user = [
            'openid' => 'qwertyuiopsxcvbn',
            'name' => 'kapeter',
            'nickname' => 'kapeter',
            'headimgurl' => 'https://www.kapeter.com/_nuxt/img/avatar.f936fc0.jpg'
        ];
        $user = new SocialiteUser([
            'id' => array_get($user, 'openid'),
            'name' => array_get($user, 'nickname'),
            'nickname' => array_get($user, 'nickname'),
            'avatar' => array_get($user, 'headimgurl'),
            'email' => null,
            'original' => [],
            'provider' => 'WeChat',
        ]);


        session(['wechat.oauth_user.default' => $user]);


        return $next($request);
    }
}
