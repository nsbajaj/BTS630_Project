<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateApprovedProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('approved_product', function (Blueprint $table) {
            $table->increments('approved_product_id');

            $table->integer('approved_by')->unsigned();
            $table->foreign('approved_by')->references('user_id')->on('users'); //Foreign Key

            $table->datetime('approved_datetime');

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
        Schema::dropIfExists('approved_product');
    }
}
