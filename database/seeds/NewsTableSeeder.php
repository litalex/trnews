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
        \Illuminate\Support\Facades\Artisan::call('parse:news');
    }
}
