<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Frontend\UserController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\FrontendController;
use App\Http\Controllers\Frontend\CheckoutController;
use App\Http\Controllers\Frontend\WishlistController;
use App\Http\Controllers\Frontend\FrontendController as FrontendFrontendController;
use App\Http\Controllers\Frontend\RatingController;

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

Route::get('/', [FrontendFrontendController::class, 'index']);
Route::get('category', [FrontendFrontendController::class, ('category')]);
Route::get('view_category/{slug}', [FrontendFrontendController::class, ('viewCategory')]); 
Route::get('category/{cate_slug}/{prod_slug}', [FrontendFrontendController::class, ('productview')]);
Route::post('add-to-cart', [CartController::class, 'addProduct']);
Route::post('add-to-wish-list', [WishlistController::class, 'add']);
Route::post('remove-wishlist-item', [WishlistController::class, 'deleteitem']);
Route::get('load-cart-data', [CartController::class, 'cartcount']);
Route::get('load-wishlist-count', [WishlistController::class, 'wishlistcount']);
Route::get('product-list', [FrontendFrontendController::class, 'productlistAjax']);
Route::post('searchproduct', [FrontendFrontendController::class, 'searchProduct']);

Auth::routes();

Route::middleware(['auth'])->group(function () {
    Route::get('cart', [CartController::class, 'viewCart']);
    Route::post('delete-cart-item', [CartController::class, 'deleteproduct']);
    Route::post('update-cart', [CartController::class, 'updatecart']);
    Route::get('checkout', [CheckoutController::class, 'index']);
    Route::post('place-order', [CheckoutController::class, 'placeorder']);
    Route::get('my-orders', [UserController::class, 'index']);
    Route::get('view-order/{id}', [UserController::class, 'view']);
    Route::get('wishlist', [WishlistController::class, 'index']);
    Route::post('add-rating', [RatingController::class, 'add']);
});

Route::middleware(['auth', 'isAdmin'])->group(function () {
    Route::get('dashboard', [FrontendController::class, ('index')]);
    Route::get('categories', [CategoryController::class, 'index']);
    Route::get('add_category', [CategoryController::class, ('addCategory')]);
    Route::post('insert_category', [CategoryController::class, 'insert']);
    Route::get('delete_category/{id}', [CategoryController::class, ('delete')]);
    Route::post('delete-category-item', [CategoryController::class, 'deletecategory']);
    Route::get('edit_category/{id}', [CategoryController::class, ('edit')]);
    Route::post('update_category/{id}', [CategoryController::class, ('update')]);
    Route::get('add_product', [ProductController::class, 'addProduct']);
    Route::get('products', [ProductController::class, 'index']);
    Route::post('insert_product', [ProductController::class, 'insert']);
    Route::post('delete-product-item', [ProductController::class, 'deleteproduct']);
    Route::get('edit_product/{id}', [ProductController::class, ('edit')]);
    Route::put('update_product/{id}', [ProductController::class, ('update')]);
    Route::get('admin/view-order/{id}', [FrontendController::class, 'view']);
    Route::put('update-order/{id}', [FrontendController::class, 'updateorder']);
    Route::get('order-history', [FrontendController::class, 'orderhistory']);
});
