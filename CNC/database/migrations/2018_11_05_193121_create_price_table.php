<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePriceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('price', function (Blueprint $table) {
            $table->increments('price_id');
            $table->decimal('price', '19', '4');
            $table->datetime('price_set_datetime');
            $table->datetime('last_updated');

            $table->integer('product_id')->unsigned()->unique();
            $table->foreign('product_id')->references('product_id')->on('product'); //Foreign Key

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
        Schema::dropIfExists('price');
    }
}
