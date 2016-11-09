<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

/**
 * Class CarTableSeeder
 */
class CarTableSeeder extends Seeder
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
            DB::table('cars')->insert(
                [
                    'name'         => $faker->title,
                    'brand'        => $faker->title,
                    'model'        => $faker->title,
                    'year'         => $faker->text,
                    'transmission' => $faker->boolean(),
                    'photo'        => $faker->imageUrl(),
                    'payByHour'    => $faker->randomNumber(),
                    'otherPay'     => $faker->text,
                    'aboutCar'     => $faker->text,
                    'trainer_id'   => $index,
                ]
            );
        }
    }
}
