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
     * 收集用户信息
     *
     * @return view
     */
    public function index()
    {
        $user = session('wechat.oauth_user.default');
       	
       	$userTest = $this->party->where('openid', $user['openid'])->first();

       	// 如果有记录，直接进入成功页面
       	if ($userTest){
       		return view('register.success', ['user' => $user]);
       	}else{
       		return view('register.form', ['user' => $user]);
       	}
    }
}
