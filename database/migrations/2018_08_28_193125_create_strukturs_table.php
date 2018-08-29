<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStruktursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('strukturs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('posisi');
            $table->string('deskripsi');
            $table->timestamps();
        });
        Schema::create('struktur_users', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
            $table->integer('struktur_id')->unsigned();
            $table->foreign('struktur_id')->references('id')->on('strukturs');
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
        Schema::dropIfExists('strukturs');
        Schema::dropIfExists('struktur_users');

    }
}
