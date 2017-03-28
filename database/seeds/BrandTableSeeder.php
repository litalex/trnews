<?php

use Illuminate\Database\Seeder;

/**
 * Class BrandTableSeeder
 */
class BrandTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $brands = [
            'Toyota',
            'VW',
            'Ford',
            'BMW',
            'Mercedes',
            'Nissan',
            'Honda',
            'Hyundai',
            'Kia',
            'Chevrolet',
            'Renault',
            'Peugeot',
            'Audi',
            'Citroen',
            'SsangYong',
            'MG',
        ];

        foreach (range(0, 15) as $index) {
            DB::table('brands')->insert(
                [
                    'name'  => $brands[$index],
                    'title' => $brands[$index],
                ]
            );
        }
    }
}