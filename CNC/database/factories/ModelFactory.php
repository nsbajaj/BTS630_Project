<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

/** @var \Illuminate\Database\Eloquent\Factory $factory */

$factory->define(App\User::class, function (Faker\Generator $faker) {
    $roles = App\Role::all()->pluck('role_id');
    $organizations = App\Organization::all()->pluck('organization_id');

    return $user = [
        'first_name' => $faker->firstName,
        'last_name' => $faker->lastName,
        'username' => $faker->userName,
        'password' => bcrypt('n'),
        'email' => $faker->email,
        'role_id' => $faker->randomElement($roles),
        'organization_id' => $faker->randomElement($organizations),
        'account_join_date' => $faker->dateTimeBetween($startDate = '-10 years', $endDate = 'now', $timezone = null),
        'account_delete_date' => $faker->randomElement([$faker->dateTimeBetween($startDate = '-2 years', $endDate = 'now', $timezone = null), null]),
        'last_signin' => $faker->dateTimeBetween($startDate = '-3 years', $endDate = 'now', $timezone = null),
        'activation_datetime' => $faker->dateTimeBetween($startDate = '-5 years', $endDate = 'now', $timezone = null),
        'unsuccessful_signin_attempt' => $faker->numberBetween($min = 0, $max = 10)
    ];
});

$factory->define(App\Role::class, function (Faker\Generator $faker) {
    $admin = new App\Role;
    $admin->name = "Administrator";
    $admin->save();

    $buyer = new App\Role;
    $buyer->name = "Buyer";
    $buyer->save();

    return $seller = ['name' => 'Seller'];
});

$factory->define(App\Organization::class, function (Faker\Generator $faker) {
    return $organization = ['name' => $faker->company ];
});

$factory->define(App\General_Category::class, function (Faker\Generator $faker) {
    $category1 = new App\General_Category;
    $category1->name = "Cell Phones";
    $category1->save();

    $category2 = new App\General_Category;
    $category2->name = "Computer, Tablets & Accessories";
    $category2->save();

    return $category = ['name' => 'TV & Home Theatre'];
});

$factory->define(App\Subcategory::class, function (Faker\Generator $faker) {
    $subcategory1 = new App\Subcategory;
    $subcategory1->name = "Computers";
    $subcategory1->save();

    $subcategory2 = new App\Subcategory;
    $subcategory2->name = "Tablets";
    $subcategory2->save();

    $subcategory3 = new App\Subcategory;
    $subcategory3->name = "Printers, Scanners & Fax";
    $subcategory3->save();

    $subcategory4 = new App\Subcategory;
    $subcategory4->name = "Cell Phones";
    $subcategory4->save();

    $subcategory5 = new App\Subcategory;
    $subcategory5->name = "Cellphone Accessories";
    $subcategory5->save();

    $subcategory6 = new App\Subcategory;
    $subcategory6->name = "Carriers";
    $subcategory6->save();

    $subcategory7 = new App\Subcategory;
    $subcategory7->name = "Televisions";
    $subcategory7->save();

    $subcategory8 = new App\Subcategory;
    $subcategory8->name = "Home Audio";
    $subcategory8->save();

    return $subcategory = ['name' => 'Home Theatre Accessories'];
});

$factory->define(App\General_Category_Subcategory::class, function (Faker\Generator $faker) {
    $category1 = new App\General_Category_Subcategory;
    $category1->general_category_id = 1;
    $category1->subcategory_id = 4;
    $category1->save();

    $category2 = new App\General_Category_Subcategory;
    $category2->general_category_id = 1;
    $category2->subcategory_id = 5;
    $category2->save();

    $category3 = new App\General_Category_Subcategory;
    $category3->general_category_id = 1;
    $category3->subcategory_id = 6;
    $category3->save();

    $category4 = new App\General_Category_Subcategory;
    $category4->general_category_id = 2;
    $category4->subcategory_id = 1;
    $category4->save();

    $category5 = new App\General_Category_Subcategory;
    $category5->general_category_id = 2;
    $category5->subcategory_id = 2;
    $category5->save();

    $category6 = new App\General_Category_Subcategory;
    $category6->general_category_id = 2;
    $category6->subcategory_id = 3;
    $category6->save();

    $category7 = new App\General_Category_Subcategory;
    $category7->general_category_id = 3;
    $category7->subcategory_id = 7;
    $category7->save();

    $category8 = new App\General_Category_Subcategory;
    $category8->general_category_id = 3;
    $category8->subcategory_id = 8;
    $category8->save();
    
    return $category = ['general_category_id' => 3, 'subcategory_id' => 9];
});

$factory->define(App\Subcategory_Types::class, function (Faker\Generator $faker) {
    $type1 = new App\Subcategory_Types;
    $type1->name = "iPhone";
    $type1->save();

    $type2 = new App\Subcategory_Types;
    $type2->name = "Android";
    $type2->save();

    $type3 = new App\Subcategory_Types;
    $type3->name = "BlackBerry";
    $type3->save();

    $type4 = new App\Subcategory_Types;
    $type4->name = "Screen Protectors";
    $type4->save();    

    $type5 = new App\Subcategory_Types;
    $type5->name = "MacBooks";
    $type5->save();        

    $type6 = new App\Subcategory_Types;
    $type6->name = "Laptops";
    $type6->save();

    $type7 = new App\Subcategory_Types;
    $type7->name = "Apple iPad";
    $type7->save();      

    $type8 = new App\Subcategory_Types;
    $type8->name = "Android Tablets";
    $type8->save();      

    $type9 = new App\Subcategory_Types;
    $type9->name = "Ink & Toner";
    $type9->save();      

    $type10 = new App\Subcategory_Types;
    $type10->name = "Office Supplies";
    $type10->save();

    $type11 = new App\Subcategory_Types;
    $type11->name = "4K Tvs";
    $type11->save();

    $type12 = new App\Subcategory_Types;
    $type12->name = "OLED Tvs";
    $type12->save();

    $type13 = new App\Subcategory_Types;
    $type13->name = "Sound Bars";
    $type13->save();    

    $type14 = new App\Subcategory_Types;
    $type14->name = "Subwoofers";
    $type14->save();    

    $type15 = new App\Subcategory_Types;
    $type15->name = "Receivers";
    $type15->save();    

    return $type = ['name' => 'HDMI Cable'];
});

$factory->define(App\Subcategory_Subcategory_Types::class, function (Faker\Generator $faker) {
    
    $sub1 = new App\Subcategory_Subcategory_Types;
    $sub1->subcategory_id = 1;
    $sub1->subcategory_types_id = 5;
    $sub1->save();

    $sub2 = new App\Subcategory_Subcategory_Types;
    $sub2->subcategory_id = 1;
    $sub2->subcategory_types_id = 6;
    $sub2->save();

    $sub3 = new App\Subcategory_Subcategory_Types;
    $sub3->subcategory_id = 2;
    $sub3->subcategory_types_id = 7;
    $sub3->save();    

    $sub4 = new App\Subcategory_Subcategory_Types;
    $sub4->subcategory_id = 2;
    $sub4->subcategory_types_id = 8;
    $sub4->save();    

    $sub5 = new App\Subcategory_Subcategory_Types;
    $sub5->subcategory_id = 3;
    $sub5->subcategory_types_id = 9;
    $sub5->save();    

    $sub6 = new App\Subcategory_Subcategory_Types;
    $sub6->subcategory_id = 3;
    $sub6->subcategory_types_id = 10;
    $sub6->save();    

    $sub7 = new App\Subcategory_Subcategory_Types;
    $sub7->subcategory_id = 4;
    $sub7->subcategory_types_id = 1;
    $sub7->save();    

    $sub7 = new App\Subcategory_Subcategory_Types;
    $sub7->subcategory_id = 4;
    $sub7->subcategory_types_id = 2;
    $sub7->save();    

    $sub8 = new App\Subcategory_Subcategory_Types;
    $sub8->subcategory_id = 4;
    $sub8->subcategory_types_id = 3;
    $sub8->save();  

    $sub9 = new App\Subcategory_Subcategory_Types;
    $sub9->subcategory_id = 5;
    $sub9->subcategory_types_id = 4;
    $sub9->save();    

    $sub10 = new App\Subcategory_Subcategory_Types;
    $sub10->subcategory_id = 7;
    $sub10->subcategory_types_id = 11;
    $sub10->save();    

    $sub11 = new App\Subcategory_Subcategory_Types;
    $sub11->subcategory_id = 7;
    $sub11->subcategory_types_id = 12;
    $sub11->save(); 

    $sub12 = new App\Subcategory_Subcategory_Types;
    $sub12->subcategory_id = 8;
    $sub12->subcategory_types_id = 13;
    $sub12->save();    

    $sub13 = new App\Subcategory_Subcategory_Types;
    $sub13->subcategory_id = 8;
    $sub13->subcategory_types_id = 14;
    $sub13->save();    

    $sub13 = new App\Subcategory_Subcategory_Types;
    $sub13->subcategory_id = 8;
    $sub13->subcategory_types_id = 15;
    $sub13->save();

    return $sub = ['subcategory_id' => 9, 'subcategory_types_id' => 16];

});

$factory->define(App\Product_Rating::class, function (Faker\Generator $faker) {
    $users = App\User::all()->pluck('user_id');
    return $rating = ['rating' => $faker->biasedNumberBetween($min = 0, $max = 5, $function = 'sqrt'),
        'review' => $faker->sentence($nbWords = 15, $variableNbWords = true),
        'review_posted' => $faker->dateTime($max = 'now', $timezone = null),
        'user_id' => $faker->randomElement($users)
    ];
});

$factory->define(App\Product_QA::class, function (Faker\Generator $faker) {
    return $qa = [
        'question' => $faker->sentence($nbWords = 10, $variableNbWords = true),
        'answer' => $faker->randomElement([$faker->sentence($nbWords = 10, $variableNbWords = true),null]),
        'asked_by' => $faker->randomElement(App\User::all()->pluck('user_id')),
        'answered_by' => $faker->randomElement([$faker->randomElement(App\User::all()->pluck('user_id')), null]),
        'asked_datetime' => $faker->dateTimeBetween($startDate = '-2 years', $endDate = 'now', $timezone = null),
        'answered_datetime' => $faker->randomElement([$faker->dateTimeBetween($startDate = '-1 years', $endDate = 'now', $timezone = null), null])
    ];
});

$factory->define(App\Discount::class, function (Faker\Generator $faker) {
    return $discount = [
        'discount_code' => $faker->colorName,
        'begin_date' => $faker->dateTimeBetween($startDate = '-2 years', $endDate = 'now', $timezone = null),
        'end_date' => $faker->randomElement([$faker->dateTimeBetween($startDate = '-1 years', $endDate = 'now', $timezone = null), null]),
        'discount_value' => null,
        'discount_percentage' => $faker->biasedNumberBetween($min = 20, $max = 50, $function = 'sqrt'),
        'last_updated' => $faker->dateTimeBetween($startDate = '-1 years', $endDate = 'now', $timezone = null)
    ];
});

$factory->define(App\Approved_Product::class, function (Faker\Generator $faker) {
    return $approved = [
        'approved_by' => $faker->randomElement(App\User::where('role_id', 1)->pluck('user_id')),
        'approved_datetime' => $faker->dateTimeBetween($startDate = '-2 years', $endDate = 'now', $timezone = null)
    ];
});

$factory->define(App\Price::class, function (Faker\Generator $faker) {
    return $price = [
        'price' => $faker->biasedNumberBetween($min = 9, $max = 99, $function = 'sqrt'),
        'price_set_datetime' => $faker->dateTimeBetween($startDate = '-2 years', $endDate = 'now', $timezone = null),
        'last_updated' => $faker->dateTimeBetween($startDate = '-1 years', $endDate = 'now', $timezone = null)
    ];
});

$factory->define(App\Product::class, function (Faker\Generator $faker) {
    return $product = [
        'name' => $faker->sentence($nbWords = 1, $variableNbWords = true),
        'description' => $faker->sentence($nbWords = 5, $variableNbWords = true),
        'user_id' => $faker->randomElement(App\User::all()->pluck('user_id')),
        'SKU' => null,
        'UPC' => null,
        'discount_id' => $faker->randomElement(App\Discount::all()->pluck('discount_id')),
        'approved_product_id' => $faker->randomElement(App\Approved_Product::all()->pluck('approved_product_id'))
    ];    
});

$factory->define(App\Product_Subcategory_Types::class, function (Faker\Generator $faker) {
    return $productSub = [
        'product_id' => $faker->randomElement(App\Product::all()->pluck('product_id')),
        'subcategory_types' => $faker->randomElement(App\Subcategory_Types::all()->pluck('subcategory_types_id'))
    ];
});

