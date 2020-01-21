<?php

use Illuminate\Database\Seeder;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            [
                'name' => 'Adidas',
                'description' => 'Brand shoes Adidas',
            ],
            [
                'name' => 'Balenciaga',
                'description' => 'Brand shoes Balenciaga',
            ],
            [
                'name' => 'Nike',
                'description' => 'Brand shoes Nike',
            ],
            [
                'name' => 'Filling Pieces',
                'description' => 'Brand shoes Filling Pieces',
            ],
            [
                'name' => 'Tommy Hilfiger',
                'description' => 'Brand shoes Tommy Hilfiger',
            ]
        ]);
    }
}
