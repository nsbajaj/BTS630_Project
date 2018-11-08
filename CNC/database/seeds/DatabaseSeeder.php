<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(){
        //$this->call(UsersTableSeeder::class);
        factory(App\Role::class, 1)->create();
        factory(App\Organization::class, 25)->create();
        factory(App\User::class, 10)->create();
    }
}
