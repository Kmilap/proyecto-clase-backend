<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
   
    public function run(): void
    {
        $product = new Product();
        $product->name = "Pc gamer";
        $product->description = "Pc gamer";
        $product->price = 20000;
        $product->category_id = Category::inRandomOrder()->first()->id;

        $product->save();

        $product2 = new Product();
        $product2->name = "Teclado";
        $product2->description = "Teclado";
        $product2->price = 20000;
        $product2->category_id = Category::inRandomOrder()->first()->id;

        $product2->save();

        $product3 = new Product();
        $product3->name = "Monitor";
        $product3->description = "Monitor";
        $product3->price = 20000;
        $product3->category_id = Category::inRandomOrder()->first()->id;

        $product3->save();
    }
}
