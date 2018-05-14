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
        // 'fullname', 
        // 'email',
        // 'phone', 
        'has_drawn',
        'issue1',
        'issue2',
        'issue3',
        'issue4',
        'issue5',
        'issue6',
        'issue7',
        'issue7_more',
        'issue8',
        'think',
        'suggest'
    ];
}
