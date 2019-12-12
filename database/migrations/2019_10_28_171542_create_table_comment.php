<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableComment extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
      public function up()
    {
        Schema::create('comments', function (Blueprint $table) {

            $table->increments('id');
            $table->integer('id_prd')->unsigned();
            $table->foreign('id_prd')->references('id')->on('products')->onDelete('cascade');
            $table->integer('id_user_comment')->unsigned();
            $table->foreign('id_user_comment')->references('id')->on('users')->onDelete('cascade');
            $table->string('content_cmt')->nullable();
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
