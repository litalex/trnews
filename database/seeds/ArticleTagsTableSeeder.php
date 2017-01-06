<?php

use Illuminate\Database\Seeder;

/**
 * Class ArticleTableSeeder
 */
class ArticleTagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (range(1, 5) as $index) {
            DB::table('articles_tags')->insert(
                [
                    'articles_id' => random_int(1, 5),
                    'tags_id' => random_int(1, 5),
                ]
            );
        }
    }
}
