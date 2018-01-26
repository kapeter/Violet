<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Party extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'openid', 
        'nickname', 
        'headimgurl', 
        'fullname', 
        'phone', 
        'has_drawn',
        'topic3',
        'topic4',
        'topic5',
        'topic6',
        'topic7',
        'topic8_1',
        'topic8_2',
        'topic8_3',
        'topic8_4',
        'topic9_1',
        'topic9_2',
        'topic9_3',
        'topic9_4'
    ];
}
