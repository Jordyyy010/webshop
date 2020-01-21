<?php

use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            [
                'name' => 'Adidas Yeezy Boost 350 V2 Yeezreel',
                'description' => 'Exclusive Adidas schoenen',
                'categories_id' =>   1,
                'amount' => '269.99',
                'image' => 'YeezReel.png',
            ],
            [
                'name' => 'Adidas Yeezy Boost 350 V2 Yecheil',
                'description' => 'Exclusive Adidas schoenen',
                'categories_id' =>   1,
                'amount' => '287.00',
                'image' => 'Yecheil.jpg',
            ],
            [
                'name' => 'Adidas Yeezy Boost 350 V2 Black',
                'description' => 'Exclusive Adidas schoenen',
                'categories_id' =>   1,
                'amount' => '323.00',
                'image' => 'YeezyBlack.jpg',
            ],
            [
                'name' => 'Adidas Yeezy Boost 350 V2 Zebra',
                'description' => 'Exclusive Adidas schoenen',
                'categories_id' =>   1,
                'amount' => '323.00',
                'image' => 'Zebra.jpg',
            ],
            [
                'name' => 'Balenciaga Speed Trainer',
                'description' => 'Trainer with white and black textured sole',
                'categories_id' =>   2,
                'amount' => '585.00',
                'image' => 'Balenciaga.jpg',
            ],
            [
                'name' => 'Balenciaga Speed Soksneaker',
                'description' => 'Exclusive soksneaker in het rood',
                'categories_id' =>   2,
                'amount' => '410.00',
                'image' => 'BalenciagaRed.jpeg',
            ],
            [
                'name' => 'Jordan 1 Retro High Turbo Green',
                'description' => 'Samenwerking met Nike en Jordan',
                'categories_id' =>   3,
                'amount' => '199.99',
                'image' => 'Jordan1.jpeg',
            ],
            [
                'name' => 'Nike Airmax 720 grey',
                'description' => 'Nike Airmax 720 grey edition',
                'categories_id' =>   3,
                'amount' => '189.99',
                'image' => 'Nike720.jpeg',
            ],
            [
                'name' => 'Nike Airmax 270 black on white',
                'description' => 'Nike Airmax 270 black white',
                'categories_id' =>   3,
                'amount' => '149.99',
                'image' => 'Nike270.jpg',
            ],
            [
                'name' => 'Nike Airmax 95',
                'description' => 'Nike Airmax 95 black',
                'categories_id' =>   3,
                'amount' => '189.99',
                'image' => 'Nike95.jpg',
            ],
            [
                'name' => 'Filling Pieces',
                'description' => 'Low Top Plain Lane sneaker van nubuck',
                'categories_id' =>   4,
                'amount' => '190.00',
                'image' => 'Filling.jpg',
            ],
            [
                'name' => 'Tommy Hilfiger',
                'description' => 'Core Oxford sneaker met logoborduring',
                'categories_id' =>   5,
                'amount' => '79.90',
                'image' => 'Tommy.jpg',
            ]
        ]);
    }
}
