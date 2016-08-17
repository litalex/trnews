<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'litalex',
            'email' => 'lit8lex@gmail.com',
            'password' => bcrypt('Standart1'),
            'created_at' => date_create(),
            'updated_at' => date_create(),
        ]);
    }
}
