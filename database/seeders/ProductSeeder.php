<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        Product::create([
            'category_id' => 1,
            'name' => 'Laptop',
            'description' => 'A high-performance laptop',
            'quantity' => 15,
            'price' => 10500000,
            'image' => 'laptop.jpg',
        ]);

        Product::create([
            'category_id' => 1,
            'name' => 'Smartphone',
            'description' => 'A high-end smartphone',
            'quantity' => 10,
            'price' => 8500000,
            'image' => 'smartphone.jpg',
        ]);
        Product::create([
            'category_id' => 2,
            'name' => 'Jacket',
            'description' => 'A high-end jacket',
            'quantity' => 11,
            'price' => 150000,
            'image' => 'jaket.jpg',
        ]);
        Product::create([
            'category_id' => 2,
            'name' => 'Baju',
            'description' => 'A high-end t-shirt',
            'quantity' => 12,
            'price' => 200000,
            'image' => 'baju.jpg',
        ]);
    }
}
