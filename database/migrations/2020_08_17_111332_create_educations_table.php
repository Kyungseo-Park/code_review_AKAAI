<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEducationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('educations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('thumbnail')->commnet('썸네일');
            $table->string('title')->commnet('제목');
            $table->string('subtitle')->commnet('부제목');
            $table->text('body')->commnet('내용');
            $table->string('uploadfile')->nullable()->commnet('업로드 파일명');
            $table->string('filename')->nullable()->commnet('실제 파일명');
            $table->integer('recruitment_personnel')->coomment('모집인원');
            $table->dateTime('start_date')->comment('모집 시작');
            $table->dateTime('end_date')->comment('모집 마감');
            $table->integer('number_of_hits')->default(0)->coomment('조회수');
            $table->tinyInteger('is_show')->default(0)->commnet('공개 여부');
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
        Schema::dropIfExists('education');
    }
}
