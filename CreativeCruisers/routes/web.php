<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthManager;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('customise', function () {
    return view('customise');
});

Route::get('product_page', function () {
    return view('product_page');
});


Route::get('aboutus', function () {
    return view('aboutus');
});



Route::get('welcome', function () {
    return view('welcome');
});

Route::get('registration', function () {
    return view('registration');
});

Route::get('admin_add', function () {
    return view('admin_add');
});

Route::get('admin_add', function () {
    return view('admin_add');
});

Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::post('cart/store', [CartController::class, 'addToCart'])->name('cart.store');
Route::get('cart/remove', [CartController::class, 'removeItem'])->name('cart.remove');

Route::get('/product/{id}', [ProductController::class, 'productDetails'])->name('productDetails');
Route::get('product_page', [ProductController::class, 'show'])->name('product_page');
Route::post('checkout', [CheckoutController::class, 'store'])->name('checkout.post');
Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout.index');

Route::get('/admin_add', [ProductController::class, 'add'])->name('admin_add');
Route::post('/admin_add', [ProductController::class, 'addPost'])->name('add.post');
Route::post('customeradd', [AdminController::class, 'customeradd'])->name('customeradd');


//Route::post('orderprocess', [OrderController::class, 'addorder'])->name('orderprocess');

Route::post('orderreject', [OrderController::class, 'addorder'])->name('orderreject');







Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
//Route::get('/home', [App\Http\Controllers\HomeController::class, 'about_us'])->name('about_us');

Route::get('product_page', [ProductController::class, 'show'])->name('product_page');

Route::get('/products', [ProductController::class, 'show'])->name('products.show');
Route::get('/products/category', [ProductController::class, 'showByCategory'])->name('products.showByCategory');

Route::get('/admin/home',[ProductController::class, 'adminHome'])->name('admin.home')->middleware('is_admin');

Route::get('/admin_add', [ProductController::class, 'add'])->name('admin_add');
Route::post('/admin_add', [ProductController::class, 'addPost'])->name('admin_add_post');

Route::get('/admin/home', [ProductController::class, 'index'])->name('admin.home');
Route::get('delete/{id}', [ProductController::class, 'delete'])->name('product.delete');

Route::get('/admin_edit/{id}', [ProductController::class, 'edit'])->name('product.edit');
Route::put('/update/{id}', [ProductController::class, 'update'])->name('update');

Route::get('/admin_customerdetails', [AdminController::class, 'admincustomerdetails'])->name('admin_customerdetails');
Route::get('/admin_customerdetails', [AdminController::class, 'index'])->name('admin_customerdetails');

Route::get('admindelete/{id}', [AdminController::class, 'customerdelete'])->name('customer.delete');

Route::get('/customeredit/{id}', [AdminController::class, 'customeredit'])->name('customer.edit');
Route::put('/admin_customerdetails/{id}', [AdminController::class, 'customerupdate'])->name('customerupdate');

Route::get('customeradd', [AdminController::class, 'customeradd'])->name('customeradd');






Route::get('processed', [Controller::class, 'orderindex'])->name('processed');

Route::get('/orderprocess/{id}', [Controller::class, 'orderedit'])->name('order.edit');
Route::put('/processed/{id}', [Controller::class, 'orderupdate'])->name('orderupdate');


Route::get('/aboutus', [Controller::class, 'review'])->name('aboutus');
Route::post('/aboutus', [Controller::class, 'addreview'])->name('add.review');

Route::get('/productDetails/{id}', [Controller::class, 'productreview'])->name('ProductDetails');
Route::post('/productDetails/{id}', [Controller::class, 'addproductreview'])->name('add.reviewproduct');


Route::get('/userpage/{profile}', [OrderController::class, 'show'])->name('user.profile');
Route::get('/search', [ProductController::class, 'search'])->name('products.search');
Route::get('/products/filterByPrice', [ProductController::class, 'filterByPrice'])->name('products.filterByPrice');



Route::get('/orderreturn/{id}', [OrderController::class, 'orderreturn'])->name('order.return');
//Route::get('/orderreturn/{id}', [OrderController::class, 'orderreturn'])->name('order.return');
Route::put('/userpage/{id}', [OrderController::class, 'returnupdate'])->name('returnupdate');


























