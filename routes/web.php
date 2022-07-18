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

Route::get('/', [HomeController::class, 'beranda'])->name('home');
Route::get('/daftarUnitPenyimpanan', [HomeController::class, 'daftarUnitPenyimpanan'])->name('daftarUnitPenyimpanan');
Route::get('/choose_city', [HomeController::class, 'chooceCity'])->name('choose_city');
Route::get('/tentangKami', [HomeController::class, 'tentangKami'])->name('tentangKami');
Route::get('/faq', [HomeController::class, 'faq'])->name('faq');

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/dashboard/admin', [AdminController::class, 'index'])->name('dashboard.admin');
});

Route::middleware(['auth', 'customer'])->group(function () {
    Route::get('/dashboard/customer', [CustomerController::class, 'index'])->name('dashboard.customer');
});

Route::middleware(['auth', 'storage_owner'])->group(function () {
    Route::get('/dashboard/storage_owner', [StorageOwnerController::class, 'index'])->name('dashboard.storage_owner');
});

Route::middleware(['auth', 'delivery_driver'])->group(function () {
    Route::get('/dashboard/delivery_driver', [DeliveryDriverController::class, 'index'])->name('dashboard.delivery_driver');
});

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth'])->name('dashboard');

require __DIR__ . '/auth.php';
