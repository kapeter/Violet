<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Party;

class GardenController extends Controller
{
    protected $party;

    public function __construct(Party $party)
    {   
        $this->party = $party;
    }

    public function index()
    {
    	$baseList = $this->party->where('has_drawn', false)->get();
    	$goalList = $this->party->where('has_drawn', true)->latest('updated_at')->get();

		return response()->json([
			'baseList' => $baseList,
			'goalList' => $goalList
		]);
    }


    public function update(Request $request)
    {
        
        $baseList = $this->party->where('has_drawn', false)->get();
        // 生成随机数列
        $len = sizeof($baseList);
        $chaos = [];
        $randArr = [];
        for ($i = 0; $i < $len; $i++) {
            $r = rand(0, $len - 1);
            while(in_array($r, $randArr)){
                $r = rand(0, $len - 1);
            }
            array_push($chaos, $baseList[$r]);
            array_push($randArr, $r);
        }

        // 随机获取获奖用户
        $count = $request->get('count');
        $result = [];
        for ($i = 0; $i < $count; $i++) {
            $r = rand(0, $len - 1);
            $data = $chaos[$r]->toArray();
            $temp = false;
            while(!$temp){
                $model = $this->party->find($data['id']);
                if ($model->has_drawn){
                    $r = rand(0, $len - 1);
                    $data = $chaos[$r]->toArray(); 
                }else{
                    $temp = true;
                    $data['has_drawn'] = true;
                    $model->fill($data);
                    $model->save();
                }
                
            }
            array_push($result, $data);
        }

        return $result;

    }


    public function reset()
    {
    	$this->party->where('has_drawn', true)->update(['has_drawn' => false]);

        $baseList = $this->party->where('has_drawn', false)->get();
        $goalList = $this->party->where('has_drawn', true)->get();

        return response()->json([
            'baseList' => $baseList,
            'goalList' => $goalList
        ]);
    }
}
