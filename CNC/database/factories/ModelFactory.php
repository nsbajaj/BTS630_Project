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

    $tempUser = new App\User;
    $tempUser->first_name = "John";
    $tempUser->last_name = "Doe";
    $tempUser->username = "johndoe";
    $tempUser->password = bcrypt('n');
    $tempUser->email = "johndoe@myseneca.ca";
    $tempUser->role_id = 3;
    $tempUser->organization_id = $faker->randomElement($organizations);
    $tempUser->account_join_date = $faker->dateTimeBetween($startDate = '-10 years', $endDate = 'now', $timezone = null);
    $tempUser->account_delete_date = null;
    $tempUser->last_signin = $faker->dateTimeBetween($startDate = '-3 years', $endDate = 'now', $timezone = null);
    $tempUser->activation_datetime = $faker->dateTimeBetween($startDate = '-5 years', $endDate = 'now', $timezone = null);
    $tempUser->unsuccessful_signin_attempt = $faker->numberBetween($min = 0, $max = 10);
    $tempUser->save();

    return $user = [
        'first_name' => 'Nitish',
        'last_name' => 'Bajaj',
        'username' => 'nsbajaj',
        'password' => bcrypt('n'),
        'email' => 'nsbajaj@myseneca.ca',
        'role_id' => 1,
        'organization_id' => $faker->randomElement($organizations),
        'account_join_date' => $faker->dateTimeBetween($startDate = '-10 years', $endDate = 'now', $timezone = null),
        'account_delete_date' => null,
        'last_signin' => $faker->dateTimeBetween($startDate = '-3 years', $endDate = 'now', $timezone = null),
        'activation_datetime' => $faker->dateTimeBetween($startDate = '-5 years', $endDate = 'now', $timezone = null),
        'unsuccessful_signin_attempt' => $faker->numberBetween($min = 0, $max = 10)
    ];


    /*
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
    */
});

$factory->define(App\Role::class, function (Faker\Generator $faker) {
    $admin = new App\Role;
    $admin->name = "Administrator";
    $admin->save();

     $buyer = new App\Role;
     $buyer->name = "Temp";
     $buyer->save();

    return $seller = ['name' => 'Buyer'];
});

$factory->define(App\Organization::class, function (Faker\Generator $faker) {
    return $organization = ['name' => $faker->company ];
});

$factory->define(App\General_Category::class, function (Faker\Generator $faker) {
    // $category1 = new App\General_Category;
    // $category1->name = "Cell Phones";
    // $category1->save();

    // $category2 = new App\General_Category;
    // $category2->name = "Computer, Tablets & Accessories";
    // $category2->save();

    //return $category = ['name' => 'TV & Home Theatre'];
    return $category = ['name' => 'Cell Phones'];
});

$factory->define(App\Subcategory::class, function (Faker\Generator $faker) {
    // $subcategory1 = new App\Subcategory;
    // $subcategory1->name = "Computers";
    // $subcategory1->save();

    // $subcategory2 = new App\Subcategory;
    // $subcategory2->name = "Tablets";
    // $subcategory2->save();

    // $subcategory3 = new App\Subcategory;
    // $subcategory3->name = "Printers, Scanners & Fax";
    // $subcategory3->save();

    $subcategory4 = new App\Subcategory;
    $subcategory4->name = "Cell Phones";
    $subcategory4->save();

    $subcategory5 = new App\Subcategory;
    $subcategory5->name = "Cellphone Accessories";
    $subcategory5->save();

    // $subcategory6 = new App\Subcategory;
    // $subcategory6->name = "Carriers";
    // $subcategory6->save();

    // $subcategory7 = new App\Subcategory;
    // $subcategory7->name = "Televisions";
    // $subcategory7->save();

    // $subcategory8 = new App\Subcategory;
    // $subcategory8->name = "Home Audio";
    // $subcategory8->save();

    //return $subcategory = ['name' => 'Home Theatre Accessories'];
    return $subcategory = ['name' => 'Carriers'];
});

$factory->define(App\General_Category_Subcategory::class, function (Faker\Generator $faker) {
    $category1 = new App\General_Category_Subcategory;
    $category1->general_category_id = 1;
    $category1->subcategory_id = 1;
    $category1->save();

    $category2 = new App\General_Category_Subcategory;
    $category2->general_category_id = 1;
    $category2->subcategory_id = 2;
    $category2->save();

    // $category3 = new App\General_Category_Subcategory;
    // $category3->general_category_id = 1;
    // $category3->subcategory_id = 3;
    // $category3->save();

    // $category4 = new App\General_Category_Subcategory;
    // $category4->general_category_id = 2;
    // $category4->subcategory_id = 1;
    // $category4->save();

    // $category5 = new App\General_Category_Subcategory;
    // $category5->general_category_id = 2;
    // $category5->subcategory_id = 2;
    // $category5->save();

    // $category6 = new App\General_Category_Subcategory;
    // $category6->general_category_id = 2;
    // $category6->subcategory_id = 3;
    // $category6->save();

    // $category7 = new App\General_Category_Subcategory;
    // $category7->general_category_id = 3;
    // $category7->subcategory_id = 7;
    // $category7->save();

    // $category8 = new App\General_Category_Subcategory;
    // $category8->general_category_id = 3;
    // $category8->subcategory_id = 8;
    // $category8->save();
    
    return $category = ['general_category_id' => 1, 'subcategory_id' => 3];
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

    // $type5 = new App\Subcategory_Types;
    // $type5->name = "MacBooks";
    // $type5->save();        

    // $type6 = new App\Subcategory_Types;
    // $type6->name = "Laptops";
    // $type6->save();

    // $type7 = new App\Subcategory_Types;
    // $type7->name = "Apple iPad";
    // $type7->save();      

    // $type8 = new App\Subcategory_Types;
    // $type8->name = "Android Tablets";
    // $type8->save();      

    // $type9 = new App\Subcategory_Types;
    // $type9->name = "Ink & Toner";
    // $type9->save();      

    // $type10 = new App\Subcategory_Types;
    // $type10->name = "Office Supplies";
    // $type10->save();

    // $type11 = new App\Subcategory_Types;
    // $type11->name = "4K Tvs";
    // $type11->save();

    // $type12 = new App\Subcategory_Types;
    // $type12->name = "OLED Tvs";
    // $type12->save();

    // $type13 = new App\Subcategory_Types;
    // $type13->name = "Sound Bars";
    // $type13->save();    

    // $type14 = new App\Subcategory_Types;
    // $type14->name = "Subwoofers";
    // $type14->save();    

    // $type15 = new App\Subcategory_Types;
    // $type15->name = "Receivers";
    // $type15->save();    

    return $type = ['name' => 'Android Tablets'];
});

$factory->define(App\Subcategory_Subcategory_Types::class, function (Faker\Generator $faker) {
    
    $sub1 = new App\Subcategory_Subcategory_Types;
    $sub1->subcategory_id = 1;
    $sub1->subcategory_types_id = 1;
    $sub1->save();

    $sub2 = new App\Subcategory_Subcategory_Types;
    $sub2->subcategory_id = 1;
    $sub2->subcategory_types_id = 2;
    $sub2->save();

    $sub3 = new App\Subcategory_Subcategory_Types;
    $sub3->subcategory_id = 1;
    $sub3->subcategory_types_id = 3;
    $sub3->save();    

    // $sub4 = new App\Subcategory_Subcategory_Types;
    // $sub4->subcategory_id = 2;
    // $sub4->subcategory_types_id = 4;
    // $sub4->save();    

    // $sub5 = new App\Subcategory_Subcategory_Types;
    // $sub5->subcategory_id = 3;
    // $sub5->subcategory_types_id = 9;
    // $sub5->save();    

    // $sub6 = new App\Subcategory_Subcategory_Types;
    // $sub6->subcategory_id = 3;
    // $sub6->subcategory_types_id = 10;
    // $sub6->save();    

    // $sub7 = new App\Subcategory_Subcategory_Types;
    // $sub7->subcategory_id = 4;
    // $sub7->subcategory_types_id = 1;
    // $sub7->save();    

    // $sub7 = new App\Subcategory_Subcategory_Types;
    // $sub7->subcategory_id = 4;
    // $sub7->subcategory_types_id = 2;
    // $sub7->save();    

    // $sub8 = new App\Subcategory_Subcategory_Types;
    // $sub8->subcategory_id = 4;
    // $sub8->subcategory_types_id = 3;
    // $sub8->save();  

    // $sub9 = new App\Subcategory_Subcategory_Types;
    // $sub9->subcategory_id = 5;
    // $sub9->subcategory_types_id = 4;
    // $sub9->save();    

    // $sub10 = new App\Subcategory_Subcategory_Types;
    // $sub10->subcategory_id = 7;
    // $sub10->subcategory_types_id = 11;
    // $sub10->save();    

    // $sub11 = new App\Subcategory_Subcategory_Types;
    // $sub11->subcategory_id = 7;
    // $sub11->subcategory_types_id = 12;
    // $sub11->save(); 

    // $sub12 = new App\Subcategory_Subcategory_Types;
    // $sub12->subcategory_id = 8;
    // $sub12->subcategory_types_id = 13;
    // $sub12->save();    

    // $sub13 = new App\Subcategory_Subcategory_Types;
    // $sub13->subcategory_id = 8;
    // $sub13->subcategory_types_id = 14;
    // $sub13->save();    

    // $sub14 = new App\Subcategory_Subcategory_Types;
    // $sub14->subcategory_id = 8;
    // $sub14->subcategory_types_id = 15;
    // $sub14->save();

    return $sub = ['subcategory_id' => 2, 'subcategory_types_id' => 4];

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

$factory->define(App\Product::class, function (Faker\Generator $faker) {
    return $product = [
        'name' => $faker->sentence($nbWords = 1, $variableNbWords = true),
        'description' => $faker->sentence($nbWords = 5, $variableNbWords = true),
        'user_id' => $faker->randomElement(App\User::all()->pluck('user_id')),
        'SKU' => null,
        'UPC' => null,
        'discount_id' => $faker->randomElement(App\Discount::all()->pluck('discount_id')),
        'approved_product_id' => $faker->randomElement(App\Approved_Product::all()->pluck('approved_product_id')),
        'quantity' => $faker->randomNumber(2)
    ];    
});

$factory->define(App\Price::class, function (Faker\Generator $faker) {
    $products = App\Product::limit(15)->pluck('product_id');
    $last = App\Product::orderBy('product_id', 'desc')->first();

    foreach($products as $p){
        $price = new App\Price;
        $price->amount = $faker->biasedNumberBetween($min = 9, $max = 99, $function = 'sqrt');
        $price->price_start_date = $faker->dateTimeBetween($startDate = '-2 years', $endDate = 'now', $timezone = null);
        $price->price_end_date = $faker->dateTimeBetween($startDate = '-1 years', $endDate = 'now', $timezone = null);
        $price->product_id = $p;
        $price->save();
    }

    return $priceArray = [
        'amount' => $faker->biasedNumberBetween($min = 9, $max = 99, $function = 'sqrt'),
        'price_start_date' => $faker->dateTimeBetween($startDate = '-2 years', $endDate = 'now', $timezone = null),
        'price_end_date' => $faker->dateTimeBetween($startDate = '-1 years', $endDate = 'now', $timezone = null),
        'product_id' => $last
    ];

    return array();
});

$factory->define(App\Product_Subcategory_Types::class, function (Faker\Generator $faker) {
    $products = App\Product::limit(19)->pluck('product_id');
    $subcategory = App\Subcategory_Types::all()->pluck('subcategory_types_id');

     for($i = 0; $i < 100; $i++){
        $sub = new App\Product_Subcategory_Types;
        $sub->product_id = $faker->randomElement($products);
        $sub->subcategory_types_id = $faker->randomElement($subcategory);
        $sub->save();
    }

    return $s = [
        'product_id' => App\Product::orderBy('product_id', 'desc')->first(),
        'subcategory_types_id' => $faker->randomElement($subcategory)
    ];
});

$factory->define(App\Attributes::class, function (Faker\Generator $faker) {
    $attribute1 = new App\Attributes;
    $attribute1->attribute_name = "Colour";
    $attribute1->value = "Black";
    $attribute1->save();

    $attribute2 = new App\Attributes;
    $attribute2->attribute_name = "Colour";
    $attribute2->value = "White";
    $attribute2->save();   

    $attribute3 = new App\Attributes;
    $attribute3->attribute_name = "Colour";
    $attribute3->value = "Grey";
    $attribute3->save();

    $attribute4 = new App\Attributes;
    $attribute4->attribute_name = "Size";
    $attribute4->value = "Small";
    $attribute4->save();

    $attribute5 = new App\Attributes;
    $attribute5->attribute_name = "Size";
    $attribute5->value = "Medium";
    $attribute5->save();

    $attribute6 = new App\Attributes;
    $attribute6->attribute_name = "Size";
    $attribute6->value = "Large";
    $attribute6->save();

    $attribute7 = new App\Attributes;
    $attribute7->attribute_name = "Unlocked";
    $attribute7->value = "Yes";
    $attribute7->save();

    $attribute8 = new App\Attributes;
    $attribute8->attribute_name = "Unlocked";
    $attribute8->value = "No";
    $attribute8->save();

    $attribute9 = new App\Attributes;
    $attribute9->attribute_name = "Sim";
    $attribute9->value = "Standard";
    $attribute9->save();

    $attribute10 = new App\Attributes;
    $attribute10->attribute_name = "Sim";
    $attribute10->value = "Micro";
    $attribute10->save();

    $attribute11 = new App\Attributes;
    $attribute11->attribute_name = "Sim";
    $attribute11->value = "Nano";
    $attribute11->save();

    return $last = ['attribute_name' => 'Size', 'value' => 'X-Large'];
});

$factory->define(App\Product_Photo::class, function (Faker\Generator $faker) {
    $productPhoto1 = new App\Product_Photo;
    $productPhoto1->filename = "productphoto1.jpg";
    $productPhoto1->product_id = 1;
    $productPhoto1->user_id = 2;
    $productPhoto1->save();

    $productPhoto2 = new App\Product_Photo;
    $productPhoto2->filename = "productphoto2.jpg";
    $productPhoto2->product_id = 2;
    $productPhoto2->user_id = 2;
    $productPhoto2->save();

    $productPhoto3 = new App\Product_Photo;
    $productPhoto3->filename = "productphoto3.jpg";
    $productPhoto3->product_id = 3;
    $productPhoto3->user_id = 2;
    $productPhoto3->save();

    $productPhoto4 = new App\Product_Photo;
    $productPhoto4->filename = "productphoto4.jpg";
    $productPhoto4->product_id = 4;
    $productPhoto4->user_id = 2;
    $productPhoto4->save();

    $productPhoto5 = new App\Product_Photo;
    $productPhoto5->filename = "productphoto5.jpg";
    $productPhoto5->product_id = 5;
    $productPhoto5->user_id = 2;
    $productPhoto5->save();

    $productPhoto6 = new App\Product_Photo;
    $productPhoto6->filename = "productphoto6.jpg";
    $productPhoto6->product_id = 6;
    $productPhoto6->user_id = 2;
    $productPhoto6->save();

    $productPhoto7 = new App\Product_Photo;
    $productPhoto7->filename = "productphoto7.jpg";
    $productPhoto7->product_id = 7;
    $productPhoto7->user_id = 2;
    $productPhoto7->save();

    $productPhoto8 = new App\Product_Photo;
    $productPhoto8->filename = "productphoto8.jpg";
    $productPhoto8->product_id = 8;
    $productPhoto8->user_id = 2;
    $productPhoto8->save();

    $productPhoto9 = new App\Product_Photo;
    $productPhoto9->filename = "productphoto9.jpg";
    $productPhoto9->product_id = 9;
    $productPhoto9->user_id = 2;
    $productPhoto9->save();

    $productPhoto10 = new App\Product_Photo;
    $productPhoto10->filename = "productphoto10.jpg";
    $productPhoto10->product_id = 10;
    $productPhoto10->user_id = 2;
    $productPhoto10->save();

    $productPhoto11 = new App\Product_Photo;
    $productPhoto11->filename = "productphoto11.jpg";
    $productPhoto11->product_id = 11;
    $productPhoto11->user_id = 2;
    $productPhoto11->save();

    $productPhoto12 = new App\Product_Photo;
    $productPhoto12->filename = "productphoto12.jpg";
    $productPhoto12->product_id = 12;
    $productPhoto12->user_id = 2;
    $productPhoto12->save();

    $productPhoto13 = new App\Product_Photo;
    $productPhoto13->filename = "productphoto13.jpg";
    $productPhoto13->product_id = 13;
    $productPhoto13->user_id = 2;
    $productPhoto13->save();

    $productPhoto14 = new App\Product_Photo;
    $productPhoto14->filename = "productphoto14.jpg";
    $productPhoto14->product_id = 14;
    $productPhoto14->user_id = 2;
    $productPhoto14->save();

    $productPhoto15 = new App\Product_Photo;
    $productPhoto15->filename = "productphoto15.jpg";
    $productPhoto15->product_id = 15;
    $productPhoto15->user_id = 2;
    $productPhoto15->save();

    $productPhoto16 = new App\Product_Photo;
    $productPhoto16->filename = "productphoto16.jpg";
    $productPhoto16->product_id = 16;
    $productPhoto16->user_id = 2;
    $productPhoto16->save();

    $productPhoto17 = new App\Product_Photo;
    $productPhoto17->filename = "productphoto17.jpg";
    $productPhoto17->product_id = 17;
    $productPhoto17->user_id = 2;
    $productPhoto17->save();

    $productPhoto18 = new App\Product_Photo;
    $productPhoto18->filename = "productphoto18.jpg";
    $productPhoto18->product_id = 18;
    $productPhoto18->user_id = 2;
    $productPhoto18->save();

    $productPhoto19 = new App\Product_Photo;
    $productPhoto19->filename = "productphoto19.jpg";
    $productPhoto19->product_id = 19;
    $productPhoto19->user_id = 2;
    $productPhoto19->save();

    return $last = ['filename' => 'productphoto20.jpg', 'user_id' => 2 ,'product_id' => 20];
});

$factory->define(App\Product_Attributes::class, function (Faker\Generator $faker) {
    $products = App\Product::limit(19)->pluck('product_id');
    $lastElement = DB::table('attributes')->orderBy('attribute_id', 'desc')->pluck('attribute_id')->first();
    $attributes = App\Attributes::limit($lastElement)->pluck('attribute_id');

    foreach($products as $p){
        $pAtt = new App\Product_Attributes;
        $pAtt->product_id = $faker->randomElement($products);
        $pAtt->attribute_id = $faker->randomElement($attributes);
        $pAtt->save();
    }
    return $last = ['product_id' => 1, 'attribute_id' => 1 ];
});