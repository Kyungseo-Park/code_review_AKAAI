<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNoticesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notices', function (Blueprint $table) {
            $table->bigIncrements('id');
            // $table->string('thumbnail')->commnet('썸네일');
            $table->string('title',100)->commnet('제목');
            $table->text('body')->commnet('내용');
            $table->unsignedBigInteger('user_id')->default(null);
            $table->foreign('user_id')->references('id')->on('users'); 
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
        Schema::dropIfExists('notices');
    }
}
