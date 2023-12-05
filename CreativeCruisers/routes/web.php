<?php

use App\Http\Controllers\AuthManager;
use Illuminate\Auth\Events\Logout;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Productcontroller;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('customise', function()
{
    return view('customise');
}
);


Route::get('product_page', function()
{
    return view('product_page');
}
);

Route::get('welcome', function()
{
    return view('welcome');
}
);

Route::get('registration', function()
{
    return view('registration');
}
);

Route::get('checkout', function()
{
    return view('checkout');
}
);

Route::get('login', [AuthManager::class,'login'])->name('login');
Route::post('login', [AuthManager::class,'loginPost'])->name('login.post');
Route::get('registration', [AuthManager::class,'registration'])->name('registration');
Route::post('registration', [AuthManager::class,'registrationPost'])->name('registration.post');
Route::get('logout', [AuthManager::class,'logout'])->name('logout');
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('product_page', [Productcontroller::class, 'show'] );
