<?php

use App\Http\Controllers\CartItemController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\OrderDetailController;
use App\Http\Controllers\PaymentDetailController;
use App\Models\OrderDetail;

Route::get('/', [ProductController::class, 'index']);


Route::get('/promotion', [ProductController::class, 'promotion']);

Route::get('/cart', [CartItemController::class, 'index'])->name('order.cart.index');
Route::post('/cart/add', [CartItemController::class, 'add'])->name('order.cart.add');

Route::put('/cart/{cartItem}', [CartItemController::class, 'update'])->name('order.cart.update');
Route::delete('/cart/{cartItem}', [CartItemController::class, 'destroy'])->name('order.cart.destroy');

Route::get('/checkout', [CheckoutController::class, 'index'])->name('order.checkout');
Route::post('/checkout/add', [CheckoutController::class, 'add'])->name('order.checkout.add');

Route::get('/product_detail/{id}', [ProductController::class, 'show'])->name('product_detail');

// ----Auth
Route::get('/login', [AuthController::class, 'login'])
    ->name('login');

Route::post('/login', [AuthController::class, 'loginPost'])
    ->name('login.post');

Route::middleware(['auth:customer'])->group(function () {
    // Protected routes for customers
    Route::get('/', [ProductController::class, 'index']);
});

Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/register', [AuthController::class, 'registerPost'])->name('register.post');


// Profile
Route::middleware(['auth:customer'])->group(function () {
    // Profile routes
    Route::get('/profile', [CustomerController::class, 'profile'])->name('profile');
    Route::get('/address', [CustomerController::class, 'address'])->name('address');
    Route::get('/search', [ProductController::class, 'search'])->name('.components.search');

    Route::post('/profile/upload-avatar', [CustomerController::class, 'uploadAvatar'])->name('profile.uploadAvatar');
    Route::post('/address/update-address', [CustomerController::class, 'update_address'])->name('address.update.address');
    Route::post('/profile/update-general', [CustomerController::class, 'update_general'])->name('profile.update.general');
    Route::post('/profile/update-contact', [CustomerController::class, 'update_contact'])->name('profile.update.contact');
    Route::post('/profile/update-password', [CustomerController::class, 'update_password'])->name('profile.update.password');
});


Route::get('/history', [OrderController::class, 'index'])->name('.components.profile.history')->middleware('auth:customer');

Route::get('/shop', [ProductController::class, 'index'])->name('shop');


















// Route::get('/history-order', function () {
//     return view('/components/profile/history');
// });


// Route::get('/checkout', function () {
//     return view('.order.checkout');
// });

// Route::get('/search', [ProductController::class, 'search'])->name('.components.search');

// Route::get('/history', [OrderController::class, 'history'])->name('.components.profile.history')->middleware('auth:customer');
