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
        foreach (range(1, 100) as $index) {
            DB::table('cars')->insert(
                [
                    'name'         => $faker->unique()->word,
                    'slug'         => $faker->slug,
                    'model'        => $faker->word,
                    'year'         => $faker->year,
                    'transmission' => 'auto',
                    'photo'        => $faker->imageUrl("320", "320", 'transport'),
                    'aboutCar'     => $faker->text,
                    'enabled'      => 1,
                    'trainer_id'   => $index,
                    'brand_id'     => random_int(1, 16),
                ]
            );
        }
    }
}
