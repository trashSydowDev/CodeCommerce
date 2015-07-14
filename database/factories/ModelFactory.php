<?php

use CodeCommerce\User;
use CodeCommerce\Category;
use CodeCommerce\Product;

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

$factory->define(User::class, function ($faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->email,
        'password' => str_random(10),
        'remember_token' => str_random(10),
        'is_admin' => 0
    ];
});

$factory->define(Category::class, function ($faker) {
    return [
        'name' => $faker->word(),
        'description' => $faker->sentence(),
    ];
});

$factory->define(Product::class, function ($faker) {
    return [
        'name' => $faker->word(),
        'description'   => $faker->sentence(),
        'price'         => $faker->randomNumber(2),
        'category_id'   => $faker->numberBetween(1,15),
        'featured'      => 1,
        'recommend'     => 0
    ];
});
