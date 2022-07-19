<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\DeliveryDriverController;
use App\Http\Controllers\StorageOwnerController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

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

Route::controller(HomeController::class)->group(function () {
    Route::get('/', 'beranda')->name('home');
    Route::get('/daftarUnitPenyimpanan', 'daftarUnitPenyimpanan')->name('daftarUnitPenyimpanan');
    Route::get('/choose_city', 'chooceCity')->name('choose_city');
    Route::get('/tentangKami', 'tentangKami')->name('tentangKami');
    Route::get('/faq', 'faq')->name('faq');
});

Route::middleware(['auth', 'admin'])->group(function () {
    Route::prefix('admin')->group(function () {
        Route::get('/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
    });
});

Route::middleware(['auth', 'customer'])->group(function () {
    Route::prefix('customer')->group(function () {
        Route::get('/dashboard', [CustomerController::class, 'index'])->name('customer.dashboard');
    });
});

Route::middleware(['auth', 'storage_owner'])->group(function () {
    Route::prefix('storage_owner')->group(function () {
        Route::get('/dashboard', [StorageOwnerController::class, 'index'])->name('storage_owner.dashboard');
    });
});

Route::middleware(['auth', 'delivery_driver'])->group(function () {
    Route::prefix('delivery_driver')->group(function () {
        Route::get('/dashboard', [DeliveryDriverController::class, 'index'])->name('delivery_driver.dashboard');
    });
});

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth'])->name('dashboard');

require __DIR__ . '/auth.php';
