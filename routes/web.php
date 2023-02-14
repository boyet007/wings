<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller; 
use App\Http\Controllers\Auth\LoginController; 

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

    
Route::get('/', [LoginController::class, 'login'])->name('login');
Route::post('/post-login', [LoginController::class, 'postLogin'])->name('post_login');

Route::middleware(['auth'])->group(function () {
    Route::get('/products', [Controller::class, 'getProducts'])->name('products.index');
    Route::get('/products/{code}', [Controller::class, 'getDetailProduct'])->name('products.show');
    Route::get('/checkout', [Controller::class, 'cartList']);
    Route::get('/reports', [Controller::class, 'getReports']);
    Route::post('logout', [LoginController::class, 'logout']);

    Route::get('cart', [Controller::class, 'cartList'])->name('cart.list');
    Route::post('cart', [Controller::class, 'addToCart'])->name('cart.store');
    Route::post('update-cart', [Controller::class, 'updateCart'])->name('cart.update');
    Route::post('remove', [Controller::class, 'removeCart'])->name('cart.remove');
    Route::post('clear', [Controller::class, 'clearAllCart'])->name('cart.clear');
});


