<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

/**
 * Class ArticleTableSeeder
 */
class ArticleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        foreach (range(1, 5) as $index) {
            DB::table('articles')->insert(
                [
                    'name'       => $faker->unique()->word,
                    'user_id'    => 1,
                    'title'      => $faker->words(3, true),
                    'text'       => $faker->text(1000),
                    'rank'       => $faker->randomNumber(),
                    'enabled'    => $faker->boolean(true),
                    'created_at' => $faker->date(),
                    'updated_at' => $faker->date(),
                ]
            );
        }
    }
}
