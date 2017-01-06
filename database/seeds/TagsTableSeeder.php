<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

/**
 * Class TagsTableSeeder
 */
class TagsTableSeeder extends Seeder
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
            DB::table('tags')->insert(
                [
                    'name'        => $faker->unique()->word,
                    'title'       => $faker->unique()->word,
                    'slug'        => $faker->slug,
                    'description' => $faker->text(100),
                    'enabled'     => $faker->boolean(true),
                    'created_at'  => $faker->date(),
                    'updated_at'  => $faker->date(),
                ]
            );
        }
    }
}
