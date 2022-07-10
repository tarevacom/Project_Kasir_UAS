<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CheckoutController;

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

Route::get('/admin', function () {
    return redirect()->route('home');
});
Route::get('/', function () {
    return view('frontend.index');
});

//route baru
Route::resource('category', CategoryController::class)->middleware('is_admin');
Route::resource('product', ProductController::class)->middleware('is_admin');
Route::resource('order', OrderController::class)->middleware('is_admin');
Route::resource('checkout', CheckoutController::class)->middleware('is_admin');
Auth::routes();

Route::get('home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');