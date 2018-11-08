<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDiscountTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('discount', function (Blueprint $table) {
            $table->increments('discount_id');
            $table->string('discount_code', '20');
            $table->datetime('begin_date');
            $table->datetime('end_date')->nullable();
            $table->decimal('discount_value', '19', '4')->nullable();
            $table->decimal('discount_percentage', '9', '4')->nullable();
            $table->datetime('last_updated');

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
        Schema::dropIfExists('discount');
    }
}
