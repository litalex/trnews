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
        $admin = [
            'name' => 'litalex',
            'email' => 'litalex@gmail.com',
            'password' => bcrypt('Standart1'),
            'role_id' => 1,
        ];

        if (DB::table('users')->where('email', '=', $admin['email'])->first() === null) {
            DB::table('users')->insert(
                [
                    'name'       => $admin['name'],
                    'email'      => $admin['email'],
                    'password'   => $admin['password'],
                    'role_id'    => $admin['role_id'],
                    'created_at' => date_create(),
                    'updated_at' => date_create(),
                ]
            );
        }
    }
}
