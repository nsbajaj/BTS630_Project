<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubcategorySubcategoryTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subcategory_subcategory_types', function (Blueprint $table) {
            $table->integer('subcategory_id')->unsigned();
            $table->foreign('subcategory_id')->references('subcategory_id')->on('subcategory'); //Foreign Key

            $table->integer('subcategory_types_id')->unsigned();
            $table->foreign('subcategory_types_id')->references('subcategory_types_id')->on('subcategory_types'); //Foreign Key            
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
        Schema::dropIfExists('subcategory_subcategory_types');
    }
}
