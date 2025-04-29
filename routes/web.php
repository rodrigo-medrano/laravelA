<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use GuzzleHttp\Handler\Proxy;
use Illuminate\Support\Facades\Route;

Route::get('/', [ProductController::class, 'excel'])->name('excel');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::get('/products/report', [ProductController::class, 'generateReport'])->name('products.report');
Route::get('/categories/report', [CategoryController::class, 'generateReport'])->name('categories.report');
Route::get('download', [ProductController::class, 'excel'])->name('download');
Route::get('categories/excel', [CategoryController::class, 'excel'])->name('categories.excel');
Route::get('prueba/livewire', function () {
    return view('pruebas.index');
});

require __DIR__.'/auth.php';
