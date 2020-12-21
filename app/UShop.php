<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UShop extends Model
{
    protected $table = 'ushops';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        '*'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */

    // 생성, 업데이트 추가 활성화 
    public $timestamps = true;
}