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
        //factory(App\User::class, 10)->create();
        factory(App\User::class, 1)->create();
        //factory(App\Password_Reset::class, 0)->create();
        factory(App\General_Category::class, 1)->create();
        factory(App\Subcategory::class, 1)->create();
        factory(App\General_Category_Subcategory::class, 1)->create(); //Bridge Table
        factory(App\Subcategory_Types::class, 1)->create();
        factory(App\Subcategory_Subcategory_Types::class, 1)->create(); //Bridge Table
        //factory(App\Product_Rating::class, 20)->create();
        //factory(App\Product_QA::class, 20)->create();
        factory(App\Discount::class, 10)->create();
        factory(App\Approved_Product::class, 20)->create();
        factory(App\Product::class, 20)->create();
        factory(App\Price::class, 1)->create();
        factory(App\Product_Subcategory_Types::class, 1)->create();
    }
}
