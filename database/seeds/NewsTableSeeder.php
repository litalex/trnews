<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

/**
 * Class NewsTableSeeder
 */
class NewsTableSeeder extends Seeder
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
            DB::table('news')->insert(
                [
                    'name'       => $faker->unique()->word,
                    'user_id'    => 1,
                    'title'      => $faker->words(3, true),
                    'text'       => $faker->text(1000),
                    'slug'       => $faker->slug,
                    'enabled'    => $faker->boolean(true),
                    'created_at' => $faker->date(),
                    'updated_at' => $faker->date(),
                ]
            );
        }
    }
}
