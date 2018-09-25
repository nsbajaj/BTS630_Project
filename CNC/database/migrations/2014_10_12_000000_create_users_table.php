<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user', function (Blueprint $table) {
            $table->increments('user_id');
            $table->string('first_name', '15');
            $table->string('last_name', '15');
            $table->string('username', '20')->unique();
            $table->string('password', '100');
            $table->string('email', '30')->unique();
            $table->integer('role_id');
            $table->integer('organization_id');
            $table->datetime('account_join_date');
            $table->datetime('account_delete_date');
            $table->datetime('last_login');
            
            $table->rememberToken();
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
        Schema::dropIfExists('user');
    }
}
