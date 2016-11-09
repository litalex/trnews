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
        foreach (range(1, 10) as $index) {
            DB::table('trainers')->insert(
                [
                    'name'              => $faker->title,
                    'firstName'         => $faker->firstName,
                    'lastName'          => $faker->lastName,
                    'middleName'        => $faker->firstName,
                    'driverExperience'  => $faker->randomNumber(),
                    'trainerExperience' => $faker->randomNumber(),
                    'site'              => $faker->domainName,
                    'area'              => $faker->text,
                    'aboutMe'           => $faker->text,
                    'photo'             => $faker->imageUrl(),
                    'phoneNumber'       => $faker->randomNumber(),
                    '   enabled'           => $faker->boolean(),
                    'city_id'           => $index,
                    'user_id'           => $index,
                ]
            );
        }
    }
}
