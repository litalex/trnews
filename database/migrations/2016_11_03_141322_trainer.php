<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Trainer extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trainers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('firstName');
            $table->string('lastName');
            $table->string('middleName');
            $table->integer('driverExperience');
            $table->integer('trainerExperience');
            $table->string('site');
            $table->text('area');
            $table->text('aboutMe');
            $table->string('photo');
            $table->integer('phoneNumber');
            $table->boolean('enabled');
            $table->integer('city_id')->index();
            $table->integer('user_id')->index();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('trainers');
    }
}
