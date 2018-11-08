<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGeneralCategorySubcategoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('general_category_subcategory', function (Blueprint $table) {
            $table->integer('general_category_id')->unsigned();
            $table->foreign('general_category_id')->references('general_category_id')->on('general_category'); //Foreign Key

            $table->integer('subcategory_id')->unsigned();
            $table->foreign('subcategory_id')->references('subcategory_id')->on('subcategory'); //Foreign Key            
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
        Schema::dropIfExists('general_category_subcategory');
    }
}
