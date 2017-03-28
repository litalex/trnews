<?php

use Illuminate\Database\Seeder;

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
        if (DB::table('news')->get() === null) {
            \Illuminate\Support\Facades\Artisan::call('parse:news');
        }
    }
}
