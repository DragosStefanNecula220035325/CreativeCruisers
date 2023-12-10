<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthManager;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('customise', function () {
    return view('customise');
});

Route::get('product_page', function () {
    return view('product_page');
});

Route::get('welcome', function () {
    return view('welcome');
});

Route::get('registration', function () {
    return view('registration');
});

Route::get('checkout', [CartController::class, 'index'])->name('cart.index');
Route::post('cart/store', [CartController::class, 'addToCart'])->name('cart.store');
Route::get('cart/remove', [CartController::class, 'removeItem'])->name('cart.remove');
Route::get('login', [AuthManager::class, 'login'])->name('login');
Route::post('login', [AuthManager::class, 'loginPost'])->name('login.post');
Route::get('registration', [AuthManager::class, 'registration'])->name('registration');
Route::post('registration', [AuthManager::class, 'registrationPost'])->name('registration.post');
Route::get('logout', [AuthManager::class, 'logout'])->name('logout');
Route::get('/product/{id}', [ProductController::class, 'productDetails'])->name('productDetails');
Route::get('product_page', [ProductController::class, 'show'])->name('product_page');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('product_page', [ProductController::class, 'show'])->name('product_page');

Route::get('/products', [ProductController::class, 'show'])->name('products.show');
Route::get('/products/category', [ProductController::class, 'showByCategory'])->name('products.showByCategory');

