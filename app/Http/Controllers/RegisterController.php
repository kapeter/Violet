<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Party;

class RegisterController extends Controller
{

	protected $party;

    public function __construct(Party $party)
    {   
        $this->party = $party;
    }
    /**
     * 处理页面请求
     *
     * @return view
     */
    public function index()
    {
        $wxUser = session('wechat.oauth_user.default');
       	
       	$userData = $this->party->where('openid', $wxUser['openid'])->first();

       	// 如果有记录，直接进入成功页面
       	if ($userData){
       		return view('register.success', ['user' => $userData]);
       	}else{
       		return view('register.form', ['user' => $wxUser]);
       	}
    }

    /**
     * 保存用户信息
     *
     * @return view
     */
    public function store(Request $request)
    {
        $wxUser = session('wechat.oauth_user.default');

        $userData = $this->party->where('openid', $wxUser['openid'])->first();

        if (!$userData){
          $userData = [
            'openid'     => $wxUser['id'],
            'nickname'   => $wxUser['nickname'], 
            'headimgurl' => $wxUser['avatar'], 
            'fullname'   => $request->get('name'), 
            'number'     => $request->get('number'), 
            'has_drawn'  => false
          ];

          $this->party->fill($userData);

          $this->party->save();          
        }

        return view('register.success', ['user' => $userData]);
    }
}
