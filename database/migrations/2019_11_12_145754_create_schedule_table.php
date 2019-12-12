<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateScheduleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('schedule', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_prd_post')->unsigned();
            $table->integer('id_prd_doi')->unsigned();
            $table->foreign('id_prd_post')->references('id')->on('products')->onDelete('cascade');
            $table->foreign('id_prd_doi')->references('id')->on('products')->onDelete('cascade');
            $table->integer('id_user_doi')->unsigned();
            $table->foreign('id_user_doi')->references('id')->on('users')->onDelete('cascade');
            $table->integer('id_user_nhan')->unsigned();
            $table->foreign('id_user_nhan')->references('id')->on('users')->onDelete('cascade');
            $table->string('hour')->nullable();
            $table->string('time')->nullable();
            $table->string('address')->nullable();
            $table->string('phone')->nullable();
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
        Schema::dropIfExists('schedule');
    }
}
