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
       	
       	$userData = $this->party->where('openid', $wxUser['id'])->first();

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

        $userData = $this->party->where('openid', $wxUser['id'])->first();

        $data = $request->all();

        if (!$userData){
          $userData = array_merge($data, [
            'openid'     => $wxUser['id'],
            'nickname'   => $wxUser['nickname'], 
            'headimgurl' => $wxUser['avatar'], 
            'has_drawn'  => false,
            'issue7'     => implode(',', $request->issue7)
          ]);

          $this->party->fill($userData);

          $this->party->save();          
        }

        return view('register.success', ['user' => $userData]);
    }
}
