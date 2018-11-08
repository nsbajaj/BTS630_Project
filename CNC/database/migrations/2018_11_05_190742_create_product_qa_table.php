<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductQaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_qa', function (Blueprint $table) {
            $table->increments('product_qa_id');
            $table->string('question', '150');
            $table->string('answer', '150')->nullable();

            $table->integer('asked_by')->unsigned();
            $table->foreign('asked_by')->references('user_id')->on('users'); //Foreign Key            

            $table->integer('answered_by')->unsigned()->nullable();
            $table->foreign('answered_by')->references('user_id')->on('users'); //Foreign Key     
            
            $table->datetime('asked_datetime');
            $table->datetime('answered_datetime')->nullable();

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
        Schema::dropIfExists('product_qa');
    }
}
