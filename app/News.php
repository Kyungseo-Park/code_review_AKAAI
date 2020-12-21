<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    
    protected $table = 'news';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    


    protected $fillable = [
        'id', 'thumbnail', 'title', 'body', 'user_id','uploadfile', 'filename', 'is_show', 'hits', 'created_at', 'updated_at',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */

    // 생성, 업데이트 추가 활성화 
    public $timestamps = true;
}
