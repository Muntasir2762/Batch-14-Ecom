<?php

use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


//Categories...
Route::get('/get-categories', [CategoryController::class, 'getCategories']);

//Products..
Route::get('/get-products', [ProductController::class, 'getProducts']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});