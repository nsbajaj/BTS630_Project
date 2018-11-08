<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductRatingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_rating', function (Blueprint $table) {
            $table->increments('product_rating_id');
            $table->integer('rating');
            $table->string('review', '200'); //allow users to know how many characters they can type from JS side
            $table->datetime('review_posted');
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
        Schema::dropIfExists('product_rating');
    }
}
