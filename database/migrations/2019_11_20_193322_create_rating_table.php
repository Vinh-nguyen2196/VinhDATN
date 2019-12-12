<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRatingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rating', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_user_rate')->unsigned();
            $table->foreign('id_user_rate')->references('id')->on('users')->onDelete('cascade');
            $table->integer('id_user_rated')->unsigned();
            $table->integer('id_product')->unsigned();
            $table->foreign('id_user_rated')->references('id')->on('users')->onDelete('cascade');
            $table->integer('rate')->unsigned();
            $table->string('cmt');
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
        Schema::dropIfExists('rating');
    }
}

