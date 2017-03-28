<?php

use Illuminate\Database\Seeder;

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
        if (DB::table('news_tags')->get() === null) {
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
}
