<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MainThumbnail extends Model
{
    protected $table = 'main_thumbnail';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'title', 'subtitle', 'button', 'src_pc', 'src_tablet', 'src_mobile', 'src_default', 'order', 'is_show', 'href', 'created_at', 'updated_at'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */

    // 생성, 업데이트 추가 활성화 
    public $timestamps = true;
}
