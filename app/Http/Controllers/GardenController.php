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
    	$goalList = $this->party->where('has_drawn', true)->get();

		return response()->json([
			'baseList' => $baseList,
			'goalList' => $goalList
		]);
    }


    public function update()
    {
    	# code...
    }


    public function reset()
    {
    	# code...
    }
}
