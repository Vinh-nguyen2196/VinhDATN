<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableNotifies extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         
        Schema::create('notifies', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_product');
            $table->integer('id_user_send');
            $table->integer('id_user_receive');
            $table->integer('id_product_convert');
            $table->string('content');
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
        Schema::dropIfExists('notifies');
    }
}