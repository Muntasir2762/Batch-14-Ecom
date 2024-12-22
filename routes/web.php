<?php

use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\Backend\AuthController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\OrderController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Backend\SiteSettingController;
use App\Http\Controllers\Backend\SubCategoryController;
use App\Http\Controllers\Frontend\FrontendController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


//Frontend
Route::get('/', [FrontendController::class, 'index']);
Route::get('/product/details/{slug}', [FrontendController::class, 'productDetails']);
Route::get('/view-cart', [FrontendController::class, 'viewCart']);
Route::get('/checkout', [FrontendController::class, 'checkout']);
Route::get('/add-to-cart/{id}', [FrontendController::class, 'addToCart']);
Route::get('/add-to-cart/delete/{id}', [FrontendController::class, 'addToCartDelete']);
Route::post('/add-to-cart/details/{id}', [FrontendController::class, 'addToCartDetails']);
Route::post('/confirm-order', [FrontendController::class, 'confirmOrder']);
Route::get('/order-confirmed/{invoiceId}', [FrontendController::class, 'thankYouPage']);
Route::get('/shop-products', [FrontendController::class, 'shopProducts']);
Route::get('/privacy-policy', [FrontendController::class, 'privacyPolicy']);
Route::get('/terms-conditions', [FrontendController::class, 'termsConditions']);
Route::get('/refund-policy', [FrontendController::class, 'refundPolicy']);
Route::get('/payment-policy', [FrontendController::class, 'paymentPolicy']);
Route::get('/about-us', [FrontendController::class, 'aboutUs']);
Route::get('/search-products', [FrontendController::class, 'searchProduct']);

//Category Products...
Route::get('/category-products/{slug}/{id}', [FrontendController::class, 'categoryProducts']);
Route::get('/subcategory-products/{slug}/{id}', [FrontendController::class, 'subCategoryProducts']);
Route::get('/type-products/{type}', [FrontendController::class, 'typeProducts']);

//Return Process-AboutUs-ContactUs
Route::get('/return-product', [FrontendController::class, 'showReturnForm']);
Route::post('/return-product-request/store', [FrontendController::class, 'storeReturnRequest']);
Route::get('/contact-us', [FrontendController::class, 'showContactForm']);
Route::post('/contact-form/store', [FrontendController::class, 'storeContactForm']);

Auth::routes();

// Admin Login Url
Route::get('/admin/login', [AuthController::class, 'adminLogin'])->name('adminLogin');

// Admin Panel
Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('adminDashboard');

//Product Routes....
Route::get('/admin/create-product', [ProductController::class, 'create'])->name('product.create');
Route::post('/admin/store-product', [ProductController::class, 'store'])->name('product.store');
Route::get('/admin/show-products', [ProductController::class, 'show'])->name('product.show');
Route::get('/admin/delete-product/{id}', [ProductController::class, 'delete'])->name('product.delete');
Route::get('/admin/edit-product/{id}', [ProductController::class, 'edit'])->name('product.edit');
Route::post('/admin/update-product/{id}', [ProductController::class, 'update'])->name('product.update');

//Category Routes....
Route::get('/admin/create-category', [CategoryController::class, 'create'])->name('category.create');
Route::post('/admin/store-category', [CategoryController::class, 'store'])->name('category.store');
Route::get('/admin/show-category', [CategoryController::class, 'show'])->name('category.show');
Route::get('/admin/delete-category/{id}', [CategoryController::class, 'delete'])->name('category.delete');
Route::get('/admin/edit-category/{id}', [CategoryController::class, 'edit'])->name('category.edit');
Route::post('/admin/update-category/{id}', [CategoryController::class, 'update'])->name('category.update');

//SubCategory Routes...
Route::get('/admin/create-subcategory', [SubCategoryController::class, 'create'])->name('subcategory.create');
Route::post('/admin/store-subcategory', [SubCategoryController::class, 'store'])->name('subcategory.store');
Route::get('/admin/show-subcategory', [SubCategoryController::class, 'show'])->name('subcategory.show');
Route::get('/admin/delete-subcategory/{id}', [SubCategoryController::class, 'delete'])->name('subcategory.delete');
Route::get('/admin/edit-subcategory/{id}', [SubCategoryController::class, 'edit'])->name('subcategory.edit');
Route::post('/admin/update-subcategory/{id}', [SubCategoryController::class, 'update'])->name('subcategory.update');

//Site Settings & Policies....
Route::get('/admin/site-settings', [SiteSettingController::class, 'showSettings']);
Route::post('/admin/site-settings/update', [SiteSettingController::class, 'updateSettings']);

Route::get('/admin/show/privacy-policy', [SiteSettingController::class, 'showPrivacyPolicy']);
Route::post('/admin/update/privacy-policy', [SiteSettingController::class, 'updatePrivacyPolicy']);

Route::get('/admin/show/terms-conditions', [SiteSettingController::class, 'showTermsConditions']);
Route::post('/admin/update/terms-conditions', [SiteSettingController::class, 'updateTermsConditions']);

Route::get('/admin/show/refund-policy', [SiteSettingController::class, 'showRefundPolicy']);
Route::post('/admin/update/refund-policy', [SiteSettingController::class, 'updateRefundPolicy']);

Route::get('/admin/show/payment-policy', [SiteSettingController::class, 'showPaymentPolicy']);
Route::post('/admin/update/payment-policy', [SiteSettingController::class, 'updatePaymentPolicy']);

Route::get('/admin/show/about-us', [SiteSettingController::class, 'showAboutUs']);
Route::post('/admin/update/about-us', [SiteSettingController::class, 'updateAboutUs']);

//Order Routes....
Route::get('/admin/all-orders', [OrderController::class, 'shoAllOrders']);
Route::get('/admin/order/status/{order_id}/{status_type}', [OrderController::class, 'updateStatus']);
Route::get('/admin/status-orders/{status_type}', [OrderController::class, 'statusWiseOrder']);
Route::get('/admin/order/edit/{id}', [OrderController::class, 'editOrder']);
Route::post('/admin/order/update/{id}', [OrderController::class, 'updateOrder']);