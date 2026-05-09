<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StockController;

// --- RUTE DASHBOARD & BARANG (Langkah 1, 2, 3, 4) ---
Route::get('/', [StockController::class, 'index'])->name('dashboard');
Route::get('/item/create', [StockController::class, 'createItem'])->name('item.create');
Route::post('/item/store', [StockController::class, 'storeItem'])->name('item.store');
Route::get('/item/detail/{id}', [StockController::class, 'showItem'])->name('item.detail');
Route::get('/item/edit/{id}', [StockController::class, 'editItem'])->name('item.edit');
Route::put('/item/update/{id}', [StockController::class, 'updateItem'])->name('item.update');
Route::delete('/item/delete/{id}', [StockController::class, 'deleteItem'])->name('item.delete');

// --- RUTE KATEGORI (Langkah 5 & 6) ---
// Rute untuk menampilkan HALAMAN tambah kategori
Route::get('/category/create', [StockController::class, 'createCategory'])->name('category.create');
// Tampilan daftar tabel kategori
Route::get('/kategori', [StockController::class, 'indexCategory'])->name('category.index');
// Menampilkan halaman edit kategori
Route::get('/category/edit/{id}', [StockController::class, 'editCategory'])->name('category.edit');
// Proses simpan kategori baru
Route::post('/category/store', [StockController::class, 'storeCategory'])->name('category.store');
// Proses update data kategori
Route::put('/category/update/{id}', [StockController::class, 'updateCategory'])->name('category.update');
// PROSES HAPUS KATEGORI (Ini yang tadi kurang)
Route::delete('/category/destroy/{id}', [StockController::class, 'destroyCategory'])->name('category.destroy');
// --- RUTE BANTUAN (Langkah 7) ---
Route::get('/bantuan', function () {return view('bantuan');})->name('bantuan');