<?php

use Illuminate\Database\Seeder;

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
        DB::table('tags')->insert(
            [
                'name'        => 'test',
                'title'       => 'test',
                'slug'        => 'test',
                'description' => 'test',
                'enabled'     => false,
                'created_at'  => new DateTime(),
                'updated_at'  => new DateTime(),
            ]
        );
    }
}
