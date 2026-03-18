<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __invoke()
    {
        $featuredProducts = Product::latest()->limit(4)->get();
        $categories = Category::limit(8)->get();
        
        return view('welcome', [
            'featuredProducts' => $featuredProducts,
            'categories' => $categories,
        ]);
    }
}