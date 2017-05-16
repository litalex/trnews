<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

/**
 * Class CityTableSeeder
 */
class CityTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (DB::table('cities')->first() === null) {
            $faker = Faker::create();
            foreach (range(1, 10) as $index) {
                DB::table('cities')->insert(
                    [
                        'name'  => $faker->city,
                        'title' => $faker->city,
                    ]
                );
            }
        }
    }
}
