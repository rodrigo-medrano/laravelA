<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\PasswordController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\VerifyEmailController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function () {
    Route::get('register', [RegisteredUserController::class, 'create'])
        ->name('register');

    Route::post('register', [RegisteredUserController::class, 'store']);

    Route::get('login', [AuthenticatedSessionController::class, 'create'])
        ->name('login');

    Route::post('login', [AuthenticatedSessionController::class, 'store']);

    Route::get('forgot-password', [PasswordResetLinkController::class, 'create'])
        ->name('password.request');

    Route::post('forgot-password', [PasswordResetLinkController::class, 'store'])
        ->name('password.email');

    Route::get('reset-password/{token}', [NewPasswordController::class, 'create'])
        ->name('password.reset');

    Route::post('reset-password', [NewPasswordController::class, 'store'])
        ->name('password.store');
    Route::prefix('producto')->group(function () {
        Route::get('/obtener', function () {
            return Product::all(); //select * from products
        });
        Route::get('/obtenerproductocategoria', function () {
            $categoria = Category::find(4);
            return $categoria->products; //select * from products
        });
        Route::get('/obtenercategoriaproducto', function () {
            $producto = Product::find(4);
            return $producto->category;
        });
        Route::get('/obtenerproductosconcategoria', function () {
            $producto = Product::with('category')->get();
            return $producto;
        });
        Route::get('/obtenerproductosordenados', function () {
            $producto = Product::orderBy('price', 'asc')->get();
            return $producto;
        });
        Route::get('/contarproductoscategoria', function () {
            $categoria = Category::withCount('products')->get();
            return $categoria;
        });
        Route::get('/obtenerprodmayora/{precio}', function ($precio) {
            $productos = Product::where('price', '>', $precio)->get();
            return $productos;
        });
        Route::get('/obtenerprodletraa', function () {
            $productos = Product::where('name', 'like', '%a%')->get();
            return $productos;
        });
        Route::get('/obtenermascaro', function () {
            $producto = Product::orderBy('price', 'desc')->first();
            return $producto;
        });
        Route::get('/categoriasordenadas', function () {
            $categorias = Category::orderBy('name', 'asc')->get();
            return $categorias;
        });
        Route::get('/11/{id?}', function ($id = 1) {
            $categoria = Category::find($id);
            return $categoria;
        });
        Route::get('/12', function () {
            $categoria = Category::where('name', 'like', 'e%')->get();
            return $categoria;
        });
        Route::get('/13/{id?}', function ($id = 1) {
            $productos = Category::find($id)->products;
            return $productos;
        });
        Route::get('/14', function ($id = 1) {
            $categorias = Category::has('products')->get();
            return $categorias;
        });
        Route::get('/15', function () {
            $categorias = Category::withCount('products')->orderBy('products_count', 'desc')->get();
            return $categorias;
        });
        Route::get('/count', function () {
            return 'Suma del stock de productos';
        });
        Route::post('avg/{id}', function ($id) {
            return 'Promedio de precio de productos ' . $id;
        });
    });
});

Route::middleware('auth')->group(function () {
    Route::get('verify-email', EmailVerificationPromptController::class)
        ->name('verification.notice');

    Route::get('verify-email/{id}/{hash}', VerifyEmailController::class)
        ->middleware(['signed', 'throttle:6,1'])
        ->name('verification.verify');

    Route::post('email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
        ->middleware('throttle:6,1')
        ->name('verification.send');

    Route::get('confirm-password', [ConfirmablePasswordController::class, 'show'])
        ->name('password.confirm');

    Route::post('confirm-password', [ConfirmablePasswordController::class, 'store']);

    Route::put('password', [PasswordController::class, 'update'])->name('password.update');

    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])
        ->name('logout');
    Route::resource('categories', CategoryController::class);
    Route::resource('products', ProductController::class);
});
