<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product', function (Blueprint $table) {
            $table->increments('product_id');
            $table->string('name', '25');
            $table->string('description', '100');   

            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('user_id')->on('users'); //Foreign Key                        

            $table->string('SKU', '8')->nullable(); //nullable for now
            $table->string('UPC', '12')->nullable(); //nullable for now

            $table->integer('discount_id')->unsigned()->nullable();
            $table->foreign('discount_id')->references('discount_id')->on('discount'); //Foreign Key            

            $table->integer('approved_product_id')->unsigned()->nullable();
            $table->foreign('approved_product_id')->references('approved_product_id')->on('approved_product'); //Foreign Key  

            $table->integer('quantity');

            $table->softDeletes();

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
        Schema::dropIfExists('product');
    }
}
