<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CategoryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;

// Landing page
Route::get('/', HomeController::class);

// Productos (tienda pública)
Route::prefix('product')->controller(ProductController::class)->group(function () {
    Route::get('/', 'index')->name('product.index');
    Route::get('/create', 'create')->name('product.create');
    Route::post('/store', 'store')->name('product.store');
    Route::get('/{producto}', 'show')->name('product.show');
    Route::delete('/{product}', 'destroy')->name('product.destroy');
});
// Carrito (requiere login)
Route::middleware('auth')->prefix('cart')->controller(CartController::class)->group(function () {
    Route::get('/', 'index')->name('cart.index');
    Route::post('/', 'store')->name('cart.store');
    Route::patch('/{cartItem}', 'update')->name('cart.update');
    Route::delete('/{cartItem}', 'destroy')->name('cart.destroy');
});

// Admin
Route::prefix('admin')->middleware(['auth', 'admin'])->group(function () {
    Route::get('/', [AdminController::class, 'dashboard'])->name('admin.dashboard');

    Route::prefix('categories')->controller(CategoryController::class)->group(function () {
        Route::get('/', 'index')->name('admin.categories.index');
        Route::get('/create', 'create')->name('admin.categories.create');
        Route::post('/', 'store')->name('admin.categories.store');
        Route::get('/{category}/edit', 'edit')->name('admin.categories.edit');
        Route::put('/{category}', 'update')->name('admin.categories.update');
        Route::delete('/{category}', 'destroy')->name('admin.categories.destroy');
    });
});

// Breeze: autenticación y perfil
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';