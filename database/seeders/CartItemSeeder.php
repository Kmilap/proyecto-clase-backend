<?php

namespace Database\Seeders;

use App\Models\CartItem;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CartItemSeeder extends Seeder
{
    public function run(): void
    {
        $cartItem1 = new CartItem();
        $cartItem1->user_id    = User::inRandomOrder()->first()->id;
        $cartItem1->product_id = Product::inRandomOrder()->first()->id;
        $cartItem1->quantity   = 2;
        $cartItem1->save();

        $cartItem2 = new CartItem();
        $cartItem2->user_id    = User::inRandomOrder()->first()->id;
        $cartItem2->product_id = Product::inRandomOrder()->first()->id;
        $cartItem2->quantity   = 1;
        $cartItem2->save();

        $cartItem3 = new CartItem();
        $cartItem3->user_id    = User::inRandomOrder()->first()->id;
        $cartItem3->product_id = Product::inRandomOrder()->first()->id;
        $cartItem3->quantity   = 3;
        $cartItem3->save();

        $cartItem4 = new CartItem();
        $cartItem4->user_id    = User::inRandomOrder()->first()->id;
        $cartItem4->product_id = Product::inRandomOrder()->first()->id;
        $cartItem4->quantity   = 1;
        $cartItem4->save();

        $cartItem5 = new CartItem();
        $cartItem5->user_id    = User::inRandomOrder()->first()->id;
        $cartItem5->product_id = Product::inRandomOrder()->first()->id;
        $cartItem5->quantity   = 4;
        $cartItem5->save();
    }
}