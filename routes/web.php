<?php

use App\Http\Controllers\PopularProductController;
use App\Http\Controllers\ProductUserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ReviewController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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


Route::get('/products', [ProductController::class, 'index'])->name('productIndex');
Route::get('/products/{id}/edit', [ProductController::class, 'edit'])->name('productEdit');

Route::post('/product-user/store', [ProductUserController::class, 'store']);

Route::get('/popular-product/index', [PopularProductController::class, 'index'])->name('popularProductIndex');

Route::post('/review/{productId}/store', [ReviewController::class, 'store'])->name('reviewStore');

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Auth::routes();
