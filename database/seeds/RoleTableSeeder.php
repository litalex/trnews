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
        if (DB::table('roles')->first() === null) {
            DB::table('roles')->insert(
                [
                    'id'    => 1,
                    'name'  => 'admin',
                    'title' => 'Admin',
                ]
            );
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
            DB::table('roles')->insert(
                [
                    'name'  => 'author',
                    'title' => 'Author',
                ]
            );
        }
    }
}
