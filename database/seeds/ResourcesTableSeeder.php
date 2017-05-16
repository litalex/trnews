<?php

use Illuminate\Database\Seeder;

/**
 * Class ResourcesTableSeeder
 */
class ResourcesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (DB::table('resources')->first() === null) {
            DB::table('resources')->insert(
                [
                    'name' => 'footballuaNewsArchive',
                    'list' => '.main-left .archive-list li',
                    'url' => 'http://football.ua/newsarc/',
                    'title' => 'h4 a',
                    'description' => 'a.intro-text',
                    'text' => '.article-text',
                    'image' => '.article-photo img',
                    'full_post_link' => 'h4 a',
                    'tags' => 'p.type',
                    'source' => 'http://football.ua',
                    'enabled' => false,
                    'created_at'  => new DateTime(),
                    'updated_at'  => new DateTime(),
                ]
            );
        }
    }
}
