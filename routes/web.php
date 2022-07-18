<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;


Route::middleware(['auth:sanctum', config('jetstream.auth_session'),'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});


// Add To Cart Controllers 

Route::post('addtocart', [FrontendController::class, 'addtocart'])->name('addtocart');
Route::get('/shopping-cart-page', [FrontendController::class, 'shopping_cart_page'])->name('shopping-cart-page');
Route::get('/deletecartitem/{product_category_id}', [FrontendController::class, 'delete'])->name('deletecartitem');


// Home Page Controller 

Route::get('/',[FrontendController::class,'index'])->name('home');

// Catetgory Controller 

Route::get('/categories/{cat_id}',[FrontendController::class,'category_detail'])->name('category_detail');


// Admin Controllers 

Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');

// Categories Controllers 

Route::get('/categories', [DashboardController::class, 'categories'])->name('categories');
Route::post('/categories',[DashboardController::class,'store'])->name('categories_store');
Route::get('/deletecategory/{id}', [DashboardController::class, 'delete'])->name('deletecategory');
Route::put('/categories/{category}',[DashboardController::class,'update'])->name('categories_update');

// Products Controllers

Route::get('/adminproducts', [ProductController::class, 'adminproducts'])->name('adminproducts');
Route::get('/createproductpage', [ProductController::class, 'createproductpage'])->name('createproductpage');
Route::post('/createproduct', [ProductController::class,'createproduct'])->name('createproduct');
Route::get('/deleteproduct/{id}', [ProductController::class, 'delete'])->name('deleteproduct');
Route::get('producteditpage{product}',[ProductController::class,'producteditpage'])->name('producteditpage');
Route::put('/product/edit/{product}',[ProductController::class,'update'])->name('product_update');

