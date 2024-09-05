<?php

use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\Backend\AuthController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Frontend\FrontendController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


//Frontend
Route::get('/', [FrontendController::class, 'index']);
Route::get('/product/details', [FrontendController::class, 'productDetails']);
Route::get('/view-cart', [FrontendController::class, 'viewCart']);
Route::get('/checkout', [FrontendController::class, 'checkout']);

Auth::routes();

// Admin Login Url
Route::get('/admin/login', [AuthController::class, 'adminLogin'])->name('adminLogin');

// Admin Panel
Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('adminDashboard');

//Product Routes....
Route::get('/admin/create-product', [ProductController::class, 'create'])->name('product.create');

//Category Routes....
Route::get('/admin/create-category', [CategoryController::class, 'create'])->name('category.create');
Route::post('/admin/store-category', [CategoryController::class, 'store'])->name('category.store');
Route::get('/admin/show-category', [CategoryController::class, 'show'])->name('category.show');
Route::get('/admin/delete-category/{id}', [CategoryController::class, 'delete'])->name('category.delete');