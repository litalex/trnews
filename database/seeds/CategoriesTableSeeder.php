<?php

use Illuminate\Database\Seeder;

/**
 * Class TagsTableSeeder
 */
class CategoriesTableSeeder extends Seeder
{
    private $categories = [
        'Україна',
        'Англія',
        'Іспанія',
        'Німеччина',
        'Італія',
        'Франція',
        'Ліга Чемпіонів',
        'Ліга Європи',
        'ЧС-2018',
        'Нідерланди',
        'Португалія',
        'Туреччина',
        'Америка',
        'Африка',
        'Азія',
        'Інше',
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (DB::table('categories')->first() === null) {
            foreach ($this->categories as $key=>$category) {
                DB::table('categories')->insert(
                    [
                        'name'        => $category,
                        'title'       => $category,
                        'description' => $category,
                        'position'    => $key,
                        'enabled'     => true,
                        'feature'     => false,
                        'topMenu'     => false,
                        'created_at'  => new DateTime(),
                        'updated_at'  => new DateTime(),
                    ]
                );
            }
        }
    }
}
