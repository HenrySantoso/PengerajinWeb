<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\PengerajinController;
use App\Http\Controllers\Admin\ProdukController;
use App\Http\Controllers\Admin\UsahaController;
use App\Http\Controllers\Admin\Controller;

Route::get('/', function () {
    return view('welcome');
});


Route::get('admin/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');

// Pengerajin
Route::get('admin/pengerajin', [PengerajinController::class, 'index'])->name('admin.pengerajin');
Route::get('admin/pengerajin/create', [PengerajinController::class, 'createPengerajin'])->name('admin.pengerajin-create');
Route::get('admin/pengerajin/edit/{id}', [PengerajinController::class, 'editPengerajin'])->name('admin.pengerajin-edit');
Route::post('admin/pengerajin/store', [PengerajinController::class, 'storePengerajin'])->name('admin.pengerajin-store');
Route::post('admin/pengerajin/update/{id}', [PengerajinController::class, 'update'])->name('admin.pengerajin-update');
Route::delete('admin/pengerajin/destroy/{id}', [PengerajinController::class, 'destroy'])->name('admin.pengerajin-destroy');

// Produk
Route::get('admin/produk', [ProdukController::class, 'index'])->name('admin.produk');

// Usaha
Route::get('admin/usaha', [UsahaController::class, 'index'])->name('admin.usaha');

