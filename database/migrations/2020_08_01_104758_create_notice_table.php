<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNoticeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notice', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('thumbnail')->commnet('썸네일');
            $table->string('writer',100)->commnet('제목');
            $table->string('category',100)->commnet('카테고리');
            $table->text('body')->commnet('내용');
            $table->string('uploadfile')->nullable()->commnet('업로드 파일명');
            $table->string('filename')->nullable()->commnet('실제 파일명');
            $table->tinyInteger('is_show')->default(0)->commnet('공개 여부');
            $table->integer('hits')->default(0)->commnet('조회수');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('notice');
    }
}
