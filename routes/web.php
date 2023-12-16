<?php

use App\Http\Controllers\CartController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\SiteController;

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

Route::resource('produtos', ProdutoController::class);

Route::get('/', [SiteController::class, 'index'])->name('site.index');

Route::get('/product/{id}', [SiteController::class, 'details'])->name('site.details');
Route::get('/category/{id}', [SiteController::class, 'category'])->name('site.category');

Route::get('cart', [CartController::class, 'cartList'])->name('site.cart');
Route::post('cart', [CartController::class, 'addItem'])->name('site.addCart');