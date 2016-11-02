<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

/**
 * Class TagsTableSeeder
 */
class NewsTagsTableSeeder extends Seeder
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
            DB::table('news_tags')->insert(
                [
                    'news_id' => random_int(1, 10),
                    'tags_id' => random_int(1, 10),
                ]
            );
        }
    }
}
