<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use App\Models\CartItem;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function dashboard()
    {
        // Las 3 consultas más importantes para el dashboard
        $totalProducts = Product::count();
        $totalCategories = Category::count();
        $latestProducts = Product::latest()->limit(5)->get();

        
        $totalCartItems = CartItem::count();

        
        $productsByDate = Product::select(
                DB::raw('DATE(created_at) as date'),
                DB::raw('COUNT(*) as total')
            )
            ->groupBy('date')
            ->orderBy('date', 'desc')
            ->limit(7)
            ->get()
            ->reverse()
            ->values();

        
        $priceRanges = [
            '0 - 10K' => Product::where('price', '<', 10000)->count(),
            '10K - 50K' => Product::whereBetween('price', [10000, 50000])->count(),
            '50K - 100K' => Product::whereBetween('price', [50000, 100000])->count(),
            '100K - 500K' => Product::whereBetween('price', [100000, 500000])->count(),
            '500K+' => Product::where('price', '>', 500000)->count(),
        ];

        return view('admin.dashboard', [
            'totalProducts' => $totalProducts,
            'totalCategories' => $totalCategories,
            'totalCartItems' => $totalCartItems,
            'latestProducts' => $latestProducts,
            'productsByDate' => $productsByDate,
            'priceRanges' => $priceRanges,
        ]);
    }
}