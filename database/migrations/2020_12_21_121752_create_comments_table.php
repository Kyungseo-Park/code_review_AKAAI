<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('post_type_id')->comment('외래키 : 게시글 타입');
            $table->foreign('post_type_id')->references('id')->on('types');
            $table->bigInteger('post_id')->comment('외래키 같은 기본키 : 게시판 번호');
            $table->unsignedBigInteger('user_id')->comment('작성자');
            $table->foreign('user_id')->references('id')->on('users'); 
            $table->string('comment')->comment('작성 댓글');
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
        Schema::dropIfExists('comments');
    }
}
