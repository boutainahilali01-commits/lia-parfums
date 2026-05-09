<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProduitController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\SuiviController;
use App\Http\Controllers\AdminAuthController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// 🏠 Page officielle
Route::get('/', [HomeController::class, 'index']);

// 🛍️ Shop
Route::get('/shop', [ProduitController::class, 'index']);

// 🛒 Cart
Route::get('/cart', [CartController::class, 'index'])->name('cart');
Route::get('/add-to-cart/{id}', [CartController::class, 'add'])->name('add.to.cart');
Route::get('/remove-from-cart/{id}', [CartController::class, 'remove'])->name('remove.from.cart');

// 💳 Checkout
Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout');
Route::post('/checkout', [CheckoutController::class, 'store'])->name('checkout.store');

// 👑 Admin Dashboard
Route::get('/admin', [AdminController::class, 'index'])->name('admin');
Route::get('/admin/status/{id}/{statut}', [AdminController::class, 'updateStatus'])->name('admin.status');

// 🔍 Suivi commande client
Route::get('/suivi', [SuiviController::class, 'index'])->name('suivi');
Route::post('/suivi', [SuiviController::class, 'search'])->name('suivi.search');


Route::get('/admin-login', [AdminAuthController::class, 'showLogin'])->name('admin.login');
Route::post('/admin-login', [AdminAuthController::class, 'login'])->name('admin.login.submit');
Route::get('/admin-logout', [AdminAuthController::class, 'logout'])->name('admin.logout');

Route::post('/admin/add-product', [AdminController::class, 'addProduct'])->name('admin.add.product');
Route::get('/admin/delete-product/{id}', [AdminController::class, 'deleteProduct'])->name('admin.delete.product');
Route::post('/admin/update-stock/{id}', [AdminController::class, 'updateStock'])->name('admin.update.stock');
