<?php

use App\Http\Controllers\LocalizationController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\PurchaseController;
use App\Http\Controllers\UserController;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Routes produits
Route::controller(ProductController::class)->group(function () {
    //index
    Route::get('/Products', 'index')
        ->name('products.index');
    //show
    Route::get('Products/{product}', 'show')
        ->name('products.show')
        ->where('product', '[0-9]+');
    //create
    Route::get('Products/create', 'create')
        ->name('products.create');
    //store
    Route::post('Products/create', 'store')
        ->name('products.store');
    //edit
    Route::get('Products/edit/{product}', 'edit')
        ->name('products.edit')
        ->where('product', '[0-9]+');
    //update
    Route::put('Products/edit/{product}', 'update')
        ->name('products.update')
        ->where('product', '[0-9]+');
    //destroy
    Route::delete('Products/{product}', 'destroy')
        ->name('products.destroy')
        ->where('product_id', '[0-9]+');
});

//Routes users
Route::controller(UserController::class)->group(function () {
    //index
    Route::get('/Users', 'index')
        ->name('users.index');
    //show
    Route::get('Users/{user}', 'show')
        ->name('users.show')
        ->where('user', '[0-9]+');
    //create
    Route::get('Users/create', 'create')
        ->name('users.create');
    //store
    Route::post('Users/create', 'store')
        ->name('users.store');
    //edit
    Route::get('Users/edit/{user}', 'edit')
        ->name('users.edit')
        ->where('product', '[0-9]+');
    //update
    Route::put('Users/edit/{user}', 'update')
        ->name('users.update')
        ->where('user', '[0-9]+');
    //destroy
    Route::delete('Users/{user}', 'destroy')
        ->name('users.destroy')
        ->where('user', '[0-9]+');
});

//Routes achats
Route::controller(PurchaseController::class)->group(function () {
    //Index
    Route::get('/Purchases', 'index')
        ->name('purchases.index');

    //Create
    Route::get('/Purchases/create', 'create')
        ->name('purchases.create');

    //Store
    Route::post('/Purchases/create', 'store')
        ->name('purchases.store');
});

//Routes lang
Route::get('lang/{lang}', [LocalizationController::class, 'setLang'])
    ->name('lang');
