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