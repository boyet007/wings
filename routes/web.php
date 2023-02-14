<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;

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

    
Route::get('/', [Controller::class, 'login']);
Route::post('/post-login', [Controller::class, 'postLogin'])->name('post_login');
Route::get('/products', [Controller::class, 'getProducts']);
Route::get('/products/{code}', [Controller::class, 'getDetailProduct'])->name('products.show');
Route::post('/checkout', [Controller::class, 'checkout']);
Route::get('/reports', [Controller::class, 'getReports']);
