<?php

use App\Http\Controllers\BrandController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/',[PagesController::class, 'home'])->name('home');

Route::get('/about',[PagesController::class,'about'])->name('about');

Route::get('/contact',[PagesController::class,'contact'])->name('contact');

Route::get('/categoryproduct/{id}',[PagesController::class,'categoryproduct'])->name('categoryproduct');

Route::get('/viewproduct/{id}',[PagesController::class,'viewproduct'])->name('viewproduct');

Route::get('/search',[PagesController::class,'search'])->name('search');

Route::middleware('auth')->group(function(){
    Route::post('cart/store',[CartController::class,'store'])->name('cart.store');
    Route::get('mycart',[CartController::class,'mycart'])->name('mycart');
    Route::delete('cart/destroy',[CartController::class,'destroy'])->name('cart.destroy');

    Route::get('checkout/{id}/',[CartController::class,'checkout'])->name('checkout');

    //Orders
    Route::post('order/store',[OrderController::class,'store'])->name('order.store');

    Route::get('order/{cartid}/storeEsewa',[OrderController::class,'storeEsewa'])->name('order.storeEsewa');
});

Route::get('/dashboard', [DashboardController::class,'dashboard'])->middleware(['auth', 'isadmin'])->name('dashboard');

Route::middleware(['auth','isadmin'])->group(function (){
Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
Route::get('/categories/create', [CategoryController::class, 'create'])->name('categories.create');
Route::post('/categories/store', [CategoryController::class, 'store'])->name('categories.store');
Route::get('/categories/{id}/edit', [CategoryController::class, 'edit'])->name('categories.edit');
Route::post('/categories/{id}/update', [CategoryController::class, 'update'])->name('categories.update');
Route::get('/categories/{id}/destroy', [CategoryController::class, 'destroy'])->name('categories.destroy');


Route::get('/brands', [BrandController::class, 'index'])->name('brands.index');
Route::get('/brands/create', [BrandController::class, 'create'])->name('brands.create');
Route::post('/brands/store', [BrandController::class, 'store'])->name('brands.store');
Route::get('/brands/{id}/edit', [BrandController::class, 'edit'])->name('brands.edit');
Route::post('/brands/{id}/update', [BrandController::class, 'update'])->name('brands.update');
Route::get('/brands/{id}/destroy', [BrandController::class, 'destroy'])->name('brands.destroy');

//Products
Route::get('/products',[ProductController::class,'index'])->name('products.index');
Route::get('/products/create',[ProductController::class,'create'])->name('products.create');
Route::post('/products/store',[ProductController::class,'store'])->name('products.store');
Route::get('/products/{id}/edit',[ProductController::class,'edit'])->name('products.edit');
Route::post('/products/{id}/update',[ProductController::class,'update'])->name('products.update');
Route::get('/products/{id}/destroy',[ProductController::class,'destroy'])->name('products.destroy');


//Orders
Route::get('/orders',[OrderController::class,'index'])->name('orders.index');
Route::get('/orders/{id}/status/{status}',[OrderController::class,'status'])->name('orders.status');

});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
