<?php

use Illuminate\Database\Seeder;

/**
 * Class RoleTableSeeder
 */
class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert(
            [
                'name'  => 'trainer',
                'title' => 'Trainer',
            ]
        );
        DB::table('roles')->insert(
            [
                'name'  => 'user',
                'title' => 'User',
            ]
        );
    }
}
