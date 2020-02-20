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
                'category_id' =>   1,
                'amount' => '270',
                'image' => 'YeezReel.png',
            ],
            [
                'name' => 'Adidas Yeezy Boost 350 V2 Yecheil',
                'description' => 'Exclusive Adidas schoenen',
                'category_id' =>   1,
                'amount' => '287',
                'image' => 'Yecheil.jpg',
            ],
            [
                'name' => 'Adidas Yeezy Boost 350 V2 Black',
                'description' => 'Exclusive Adidas schoenen',
                'category_id' =>   1,
                'amount' => '323',
                'image' => 'YeezyBlack.jpg',
            ],
            [
                'name' => 'Adidas Yeezy Boost 350 V2 Zebra',
                'description' => 'Exclusive Adidas schoenen',
                'category_id' =>   1,
                'amount' => '323',
                'image' => 'Zebra.jpg',
            ],
            [
                'name' => 'Balenciaga Speed Trainer',
                'description' => 'Trainer with white and black textured sole',
                'category_id' =>   2,
                'amount' => '585',
                'image' => 'Balenciaga.jpg',
            ],
            [
                'name' => 'Balenciaga Speed Soksneaker',
                'description' => 'Exclusive soksneaker in het rood',
                'category_id' =>   2,
                'amount' => '410',
                'image' => 'BalenciagaRed.jpeg',
            ],
            [
                'name' => 'Jordan 1 Retro High Turbo Green',
                'description' => 'Samenwerking met Nike en Jordan',
                'category_id' =>   3,
                'amount' => '200',
                'image' => 'Jordan1.jpeg',
            ],
            [
                'name' => 'Nike Airmax 720 grey',
                'description' => 'Nike Airmax 720 grey edition',
                'category_id' =>   3,
                'amount' => '190',
                'image' => 'Nike720.jpeg',
            ],
            [
                'name' => 'Nike Airmax 270 black on white',
                'description' => 'Nike Airmax 270 black white',
                'category_id' =>   3,
                'amount' => '150',
                'image' => 'Nike270.jpg',
            ],
            [
                'name' => 'Nike Airmax 95',
                'description' => 'Nike Airmax 95 black',
                'category_id' =>   3,
                'amount' => '190',
                'image' => 'Nike95.jpg',
            ],
            [
                'name' => 'Filling Pieces',
                'description' => 'Low Top Plain Lane sneaker van nubuck',
                'category_id' =>   4,
                'amount' => '190',
                'image' => 'Filling.jpg',
            ],
            [
                'name' => 'Tommy Hilfiger',
                'description' => 'Core Oxford sneaker met logoborduring',
                'category_id' =>   5,
                'amount' => '80',
                'image' => 'Tommy.jpg',
            ]
        ]);
    }
}
