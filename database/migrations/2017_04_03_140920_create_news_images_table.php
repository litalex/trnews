<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreateNewsImagesTable.
 */
class CreateNewsImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('images_news', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('news_id')->unsigned()->nullable();
            $table->foreign('news_id')->references('id')->on('news');
            $table->integer('images_id')->unsigned()->nullable();
            $table->foreign('images_id')->references('id')->on('images');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('images_news');
    }
}
