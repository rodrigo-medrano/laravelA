<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/ejemplo', function () {
    return 'Hola Mundo';
});

Route::prefix('producto')->group(function (){
    Route::get('/', function (){
        return 'Listado de mi producto';
    });
    Route::get('/count', function (){
        return 'Suma del stock de productos';
    });
    Route::get('avg', function (){
        return 'Promedio de precio de productos';
    });
});
