<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Receipt extends Model {
    
    protected $table = 'receipts';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    
    protected $fillable = [
        'id', 'user_id','education_id', 'name', 'email', 'class' ,'tel' ,'created_at', 'updated_at',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */

    // 생성, 업데이트 추가 활성화 
    public $timestamps = true;
}
