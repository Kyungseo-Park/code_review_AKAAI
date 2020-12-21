<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Education extends Model
{

    protected $table = 'educations';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'thumbnail', 'title', 'subtitle', 'body', 'uploadfile', 'filename', 
        'recruitment_personnel', 'start_date', 'end_date', 'number_of_hits', 'is_show',
        'created_at', 'updated_at'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */

    // 생성, 업데이트 추가 활성화 
    public $timestamps = true;

    
    public function getEducationId() {
        return $this->hasMany('App\Receipt', 'education_id', 'id');
    }
}
