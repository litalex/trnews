<?php

use Illuminate\Database\Seeder;

/**
 * Class TagsTableSeeder
 */
class NewsImagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (DB::table('news_images')->first() === null) {
            foreach (range(1, 10) as $index) {
                DB::table('news_images')->insert(
                    [
                        'news_id' => random_int(1, 10),
                        'image_id' => random_int(1, 10),
                    ]
                );
            }
        }
    }
}
