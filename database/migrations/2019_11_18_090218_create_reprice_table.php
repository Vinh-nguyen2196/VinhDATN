<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRepriceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reprice', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_user_reprice')->unsigned();
            $table->foreign('id_user_reprice')->references('id')->on('users')->onDelete('cascade');
            $table->integer('id_user_post')->unsigned();
            $table->foreign('id_user_post')->references('id')->on('users')->onDelete('cascade');
            $table->integer('id_product_post')->unsigned();
            $table->foreign('id_product_post')->references('id')->on('products')->onDelete('cascade');
            $table->string('price');

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
        Schema::dropIfExists('reprice');
    }
}
