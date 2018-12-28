<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductPhotoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_photo', function (Blueprint $table) {
            $table->increments('product_photo_id');
            $table->string('filename', '50');

            $table->integer('product_id')->unsigned();
            $table->foreign('product_id')->references('product_id')->on('product'); //Foreign Key

            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('user_id')->on('users'); //Foreign Key            

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
        Schema::dropIfExists('product_photo');
    }
}
