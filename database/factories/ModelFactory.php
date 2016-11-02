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

$factory->define(Litalex\Models\User::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->safeEmail,
        'password' => bcrypt(str_random(10)),
        'remember_token' => str_random(10),
    ];
});


$factory->define(Litalex\Models\Task::class, function (Faker\Generator $faker) {
    return [
        'name' => str_random(10),
    ];
});

$factory->define(Litalex\Models\News::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->unique(),
        'title' => $faker->title,
        'text' => $faker->text,
        'enabled' => $faker->boolean(),
    ];
});

