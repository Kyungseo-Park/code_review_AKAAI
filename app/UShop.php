<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UShop extends Model
{
    protected $table = 'ushop';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id','thumbnail', 'title', 'href', 'body', 'uploadfile', 'filename', 'user_id', 'is_show', 'hits', 'created_at', 'updated_at'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */

    // 생성, 업데이트 추가 활성화 
    public $timestamps = true;
}