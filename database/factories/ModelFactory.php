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

$factory->define(Litalex\Models\Trainer::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->unique(),
        'firstName' => $faker->firstName,
        'lastName' => $faker->lastName,
        'middleName' => $faker->firstName,
        'driverExperience' => $faker->randomNumber(),
        'trainerExperience' => $faker->randomNumber(),
        'site' => $faker->domainName,
        'area' => $faker->text,
        'aboutMe' => $faker->text,
        'photo' => $faker->imageUrl(),
        'phoneNumber' => $faker->imageUrl(),
        'enabled' => $faker->boolean(),
    ];
});

$factory->define(Litalex\Models\Car::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->unique(),
        'brand' => $faker->title,
        'model' => $faker->title,
        'year' => $faker->text,
        'transmission' => $faker->boolean(),
        'photo' => $faker->imageUrl(),
        'payByHour' => $faker->randomNumber(),
        'payByDistance' => $faker->text,
        'aboutCar' => $faker->text,
        'trainer_id' => $faker->randomNumber(),
        'enabled' => $faker->boolean(),
    ];
});

$factory->define(Litalex\Models\Role::class, function (Faker\Generator $faker) {
    return [
        'name' => 'trainer',
        'title' => 'Trainer',
    ];
});

