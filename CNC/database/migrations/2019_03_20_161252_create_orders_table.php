<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order', function (Blueprint $table) {
            $table->increments('order_id');

            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('user_id')->on('users'); //Foreign Key                        

            $table->integer('payment_method')->nullable(); //Change to foreign key after
            $table->integer('order_status_code')->nullable(); //Change to foreign key after

            $table->datetime('order_placed_date');
            $table->datetime('order_paid_date');
            $table->decimal('total_order_price', '19', '4');

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
        Schema::dropIfExists('order');
    }
}
