<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Songs extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        \Schema::create('songs', function (Blueprint $table) {
                $table->increments('id');
                $table->integer('track_id');
                $table->integer('user_id');
                $table->string('uri');
                $table->string('permalink_url');
                $table->string('artwork_url');
                $table->string('title');
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
        Schema::drop('songs');
    }
}
