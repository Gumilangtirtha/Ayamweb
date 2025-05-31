<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerAuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\ProductController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Frontend Routes
Route::get('/', [FrontController::class, 'home'])->name('home');
Route::get('/menu', [FrontController::class, 'menu'])->name('menu');
Route::get('/kontak', [FrontController::class, 'kontak'])->name('kontak');

// Customer Authentication Routes
Route::prefix('customer')->name('customer.')->group(function () {
    Route::get('/login', [CustomerAuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [CustomerAuthController::class, 'login']);
    Route::get('/register', [CustomerAuthController::class, 'showRegisterForm'])->name('register');
    Route::post('/register', [CustomerAuthController::class, 'register']);
    Route::post('/logout', [CustomerAuthController::class, 'logout'])->name('logout');
});

// Cart Routes
Route::prefix('cart')->name('cart.')->group(function () {
    Route::get('/', [CartController::class, 'index'])->name('index');
    Route::post('/add', [CartController::class, 'add'])->name('add');
    Route::put('/{id}', [CartController::class, 'update'])->name('update');
    Route::delete('/{id}', [CartController::class, 'remove'])->name('remove');
    Route::post('/clear', [CartController::class, 'clear'])->name('clear');
    Route::get('/count', [CartController::class, 'getCount'])->name('count');
});

// Admin Routes
Route::prefix('admin')->name('admin.')->middleware(['auth', 'CekLogin'])->group(function () {
    Route::get('/', function () {
        return redirect()->route('admin.products.index');
    });
    Route::resource('products', ProductController::class);
    Route::patch('/products/{product}/toggle-active', [ProductController::class, 'toggleActive'])->name('products.toggle-active');
});

// Admin Authentication
Route::prefix('admin')->group(function () {
    Route::get('/login', [AuthController::class, 'index'])->name('admin.login');
    Route::post('/postlogin', [AuthController::class, 'postlogin'])->name('admin.postlogin');
    Route::get('/logout', [AuthController::class, 'logout'])->name('admin.logout');
});

// Legacy routes for backward compatibility
Route::get('/order', function () { return redirect('/cart'); });
Route::get('/chat', function () { return redirect('/kontak'); });