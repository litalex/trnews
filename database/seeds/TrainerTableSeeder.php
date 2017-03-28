<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

/**
 * Class TrainerTableSeeder
 */
class TrainerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        foreach (range(1, 100) as $index) {
            DB::table('trainers')->insert(
                [
                    'name'              => $faker->name,
                    'slug'              => $faker->slug,
                    'firstName'         => $faker->firstName,
                    'lastName'          => $faker->lastName,
                    'driverExperience'  => random_int(4, 40),
                    'trainerExperience' => random_int(1, 40),
                    'site'              => $faker->domainName,
                    'aboutMe'           => $faker->text,
                    'photo'             => $faker->imageUrl("320", "320", 'people'),
                    'phoneNumber'       => $faker->randomNumber(),
                    'enabled'           => 1,
                    'payByHour'         => random_int(100, 300),
                    'payByDistance'     => random_int(1, 9),
                    'gender'            => 'male',
                    'studentCar'        => random_int(0, 1),
                    'city_id'           => random_int(1, 10),
                    'user_id'           => $index,
                ]
            );
        }
    }
}
