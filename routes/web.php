<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('prueba.index');
});
Route::get('/ejemplo', function () {
    return 'Hola Mundo';
});

Route::prefix('producto')->group(function (){
    Route::get('/obtener', function (){
        return Product::all();//select * from products
    });
    Route::get('/obtenerproductocategoria', function (){
        $categoria=Category::find(4);
        return $categoria->products;//select * from products
    });
    Route::get('/obtenercategoriaproducto', function (){
        $producto=Product::find(4);
        return $producto->category;
    });
    Route::get('/obtenerproductosconcategoria', function (){
        $producto=Product::with('category')->get();
        return $producto;
    });
    Route::get('/obtenerproductosordenados', function (){
        $producto=Product::orderBy('price', 'asc')->get();
        return $producto;
    });
    Route::get('/contarproductoscategoria', function (){
        $categoria=Category::withCount('products')->get();
        return $categoria;
    });
    Route::get('/obtenerprodmayora/{precio}', function ($precio){
        $productos=Product::where('price','>',$precio)->get();
        return $productos;
    });
    Route::get('/obtenerprodletraa', function (){
        $productos=Product::where('name','like','%a%')->get();
        return $productos;
    });
    Route::get('/obtenermascaro', function (){
        $producto=Product::orderBy('price','desc')->first();
        return $producto;
    });
    Route::get('/categoriasordenadas', function (){
        $categorias=Category::orderBy('name','asc')->get();
        return $categorias;
    });
    Route::get('/count', function (){
        return 'Suma del stock de productos';
    });
    Route::post('avg/{id}', function ($id){
        return 'Promedio de precio de productos '.$id;
    });
});

Route::prefix('products')->group(function (){
    Route::get('/', function (){
        return 'Listado de productos';
    });
    Route::get('/new', function (){
        return 'Formulario del producto';
    });
    Route::post('/', function (){
        return 'Crear un producto';
    });
    Route::get('/{id}', function ($id){
        return 'Detalle del producto '.$id;
    });
    Route::get('/edit/{id}', function ($id){
        return 'Formulario del producto para editar '.$id;
    });
    Route::put('/{id}', function ($id){
        return 'Actualizar el producto '.$id;
    });
    Route::delete('/{id}', [ProductController::class, 'destroy']);
});

Route::resource('categories', CategoryController::class);
