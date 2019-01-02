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
            $table->decimal('amount', '19', '4');
            $table->datetime('price_start_date');
            $table->datetime('price_end_date');

            $table->integer('product_id')->unsigned(); //Removed unique
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
