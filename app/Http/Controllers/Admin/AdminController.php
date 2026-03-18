<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;

class AdminController extends Controller
{
    public function dashboard()
    {
        $totalProducts = Product::count();
        $totalCategories = Category::count();
        $latestProducts = Product::latest()->limit(5)->get();

        return view('admin.dashboard', [
            'totalProducts' => $totalProducts,
            'totalCategories' => $totalCategories,
            'latestProducts' => $latestProducts,
        ]);
    }
}