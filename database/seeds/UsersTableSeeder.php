<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert(
            [
                'name'       => 'litalex',
                'email'      => 'lit8lex@gmail.com',
                'password'   => bcrypt('Standart1'),
                'created_at' => date_create(),
                'updated_at' => date_create(),
            ]
        );
        $faker = Faker::create();
        foreach (range(2, 10) as $index) {
            DB::table('users')->insert(
                [
                    'name'       => $faker->userName,
                    'email'      => $faker->email,
                    'password'   => bcrypt($faker->password),
                    'created_at' => date_create(),
                    'updated_at' => date_create(),
                ]
            );
        }
    }
}
