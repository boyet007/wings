<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;


class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::create([
            'product_code' => 'SKUSKILNP',
            'product_name' => 'So klin pewangi',
            'price' => 15000.00,
            'currency' => 'IDR',
            'discount' => 10,
            'dimension' => '13 x 10 cm',
            'unit' => 'PCS',
        ]);

        Product::create([
            'product_code' => 'SKUSKILNA',
            'product_name' => 'Giv biru',
            'price' => 11000.00,
            'currency' => 'IDR',
            'dimension' => '5 x 5 cm',
            'unit' => 'PCS',
        ]);

        Product::create([
            'product_code' => 'SKUSKILNB',
            'product_name' => 'So klin liquid',
            'price' => 18000.00,
            'currency' => 'IDR',
            'dimension' => '10 x 10 cm',
            'unit' => 'PCS',
        ]);
    }
}
