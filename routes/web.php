<?php

use App\Http\Controllers\ArticlesController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\CarsController;
use \App\Http\Controllers\SalonController;

Route::get('/', [PagesController::class, 'index'])->name('index');
Route::get('/about', [PagesController::class, 'about'])->name('about');
Route::get('/contact', [PagesController::class, 'contact'])->name('contact');
Route::get('/termsOfSale', [PagesController::class, 'termsOfSale'])->name('termsOfSale');
Route::get('/financialDepartment', [PagesController::class, 'financialDepartment'])->name('financialDepartment');
Route::get('/forClients', [PagesController::class, 'forClients'])->name('forClients');
Route::get('/account', [PagesController::class, 'index'])->name('account');

Route::get('/salons', [SalonController::class, 'index'])->name('salons');

Route::resource('/articles', ArticlesController::class);
Route::get('/products/{id}', [CarsController::class, 'show'])->name('product');

Route::group(['prefix' => 'catalog'], function () {
    Route::get('/', [CarsController::class, 'index'])->name('catalog');
    Route::get('/{category:slug?}', [CarsController::class, 'currentCatalog'])->name('catalog');
});

Auth::routes();

