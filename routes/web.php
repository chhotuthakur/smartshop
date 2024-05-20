<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Auth;

// Welcome and Home routes
Route::get('/welcome', function () {
    return view('welcome');
});
Route::get('/', function () {
    return view('home');
});

Auth::routes();

// User home route
Route::middleware(['auth'])->group(function() {
    Route::get('/home', [UserController::class, 'index'])->name('home');
});

// Admin routes
Route::middleware(['auth', \App\Http\Middleware\AdminMiddleware::class])->group(function() {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.home');
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/admin/products', [AdminController::class, 'products'])->name('admin.products');
    // Route::get('/admin/products-add', [AdminController::class, 'create'])->name('admin.products');
    Route::get('/admin/users', [AdminController::class, 'users'])->name('admin.users');
    Route::get('/admin/settings', [AdminController::class, 'settings'])->name('admin.settings');

 
    
});
Route::prefix('admin')->group(function () {
    Route::resource('products', ProductController::class);
});
   // Resourceful routes for products
    // Route::get('/add', [App\Http\Controllers\ProductController::class, 'create'])->name('admin.products-add');
    Route::resource('admin/products', App\Http\Controllers\ProductController::class)->names([
        'index' => 'admin.products.index',
        'create' => 'admin.products.create',
        'store' => 'admin.products.store',
        'show' => 'admin.products.show',
        'edit' => 'admin.products.edit',
        'update' => 'admin.products.update',
        'destroy' => 'admin.products.destroy',
    ]);

    Route::get('/cart', function () {
        return view('cart');
    });
    Route::get('/contact', function () {
        return view('contact');
    });
    Route::get('/shop', function () {
        return view('shop');
    });
    Route::get('/checkout', function () {
        return view('checkout');
    });
    Route::get('/detail', function () {
        return view('detail');
    });