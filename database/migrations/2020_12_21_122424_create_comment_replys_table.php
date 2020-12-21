<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommentReplysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comment_replys', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('comment_id')->comment('대 댓글 ID');
            $table->foreign('comment_id')->references('id')->on('comments'); 
            $table->unsignedBigInteger('user_id')->comment('작성자');
            $table->foreign('user_id')->references('id')->on('users'); 
            $table->string('comment_reply')->comment('답글');
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
        Schema::dropIfExists('comment_replys');
    }
}
