<?php

use Illuminate\Database\Seeder;
use App\Product;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $test_product = new Product();
        $test_product->color = '#000000';
        $test_product->height = 100;
        $test_product->width = 100;
        $test_product->user_id = 0;
        $test_product->save();
    }
}
