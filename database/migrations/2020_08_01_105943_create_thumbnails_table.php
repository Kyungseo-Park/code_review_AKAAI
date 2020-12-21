<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateThumbnailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('thumbnails', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title',50)->commnet('큰제목');
            $table->string('subtitle',100)->commnet('작은제목');
            $table->string('button',50)->commnet('버튼');
            $table->string('src_default')->commnet('이미지 경로');
            $table->tinyInteger('order')->default(0)->commnet('순서');
            $table->tinyInteger('is_show')->default(0)->commnet('공개 여부');
            $table->string('href')->commnet('페이지 링크');
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
        Schema::dropIfExists('main_thumbnail');
    }
}
