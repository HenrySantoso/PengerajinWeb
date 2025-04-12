<?php

use App\Http\Controllers\Guest\PageController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\PengerajinController;
use App\Http\Controllers\Admin\ProdukController;
use App\Http\Controllers\Admin\UsahaController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Guest\HomeController;

Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);


// Auth::routes();
Route::get('admin/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');

// Pengerajin
Route::get('admin/pengerajin', [PengerajinController::class, 'index'])->name('admin.pengerajin');
Route::get('admin/pengerajin/create', [PengerajinController::class, 'createPengerajin'])->name('admin.pengerajin-create');
Route::post('admin/pengerajin/store', [PengerajinController::class, 'storePengerajin'])->name('admin.pengerajin-store');
Route::get('admin/pengerajin/edit/{id}', [PengerajinController::class, 'editPengerajin'])->name('admin.pengerajin-edit');
Route::put('admin/pengerajin/update/{id}', [PengerajinController::class, 'updatePengerajin'])->name('admin.pengerajin-update');
Route::delete('admin/pengerajin/destroy/{id}', [PengerajinController::class, 'destroy'])->name('admin.pengerajin-destroy');

// Produk
Route::get('admin/produk', [ProdukController::class, 'index'])->name('admin.produk');
Route::get('admin/produk/create', [ProdukController::class, 'create'])->name('admin.produk-create');
Route::post('admin/produk/store', [ProdukController::class, 'store'])->name('admin.produk-store');
Route::get('admin/produk/edit/{id}', [ProdukController::class, 'edit'])->name('admin.produk-edit');
Route::put('admin/produk/update/{id}', [ProdukController::class, 'update'])->name('admin.produk-update');
Route::delete('admin/produk/destroy/{id}', [ProdukController::class, 'destroy'])->name('admin.produk-destroy');

// Usaha
Route::get('admin/usaha', [UsahaController::class, 'index'])->name('admin.usaha');
Route::get('admin/usaha/create', [UsahaController::class, 'create'])->name('admin.usaha-create');
Route::post('admin/usaha/store', [UsahaController::class, 'store'])->name('admin.usaha-store');
Route::get('admin/usaha/edit/{id}', [UsahaController::class, 'edit'])->name('admin.usaha-edit');
Route::put('admin/usaha/update/{id}', [UsahaController::class, 'update'])->name('admin.usaha-update');
Route::delete('admin/usaha/destroy/{id}', [UsahaController::class, 'destroy'])->name('admin.usaha-destroy');

//Guest
Route::get('', [PageController::class, 'index'])->name('guest.index');
Route::get('about', [PageController::class, 'about'])->name('guest.about');
Route::get('contact', [PageController::class, 'contact'])->name('guest.contact');
Route::get('product', [PageController::class, 'products'])->name('guest.products');
Route::get('single-product', [PageController::class, 'singleProduct'])->name('guest.single-product');

