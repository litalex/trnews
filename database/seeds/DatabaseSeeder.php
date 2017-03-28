<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(NewsTableSeeder::class);
        $this->call(TagsTableSeeder::class);
        $this->call(NewsTagsTableSeeder::class);
        $this->call(CarTableSeeder::class);
        $this->call(TrainerTableSeeder::class);
        $this->call(CityTableSeeder::class);
        $this->call(RoleTableSeeder::class);
        $this->call(BrandTableSeeder::class);
    }
}
