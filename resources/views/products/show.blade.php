@extends('layouts.app2')
@section('title', 'Detalles del producto')
@section('content')
<div class="container">
    <h2>Detalle del producto: {{$product->id}}</h2>
    <div class="row mb-3">
        <div class="col-3">
            <label>Nombre</label>
        </div>
        <div class="col-9">
            <label>{{$product->name}}</label>
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-3">

            <label>Descripcion</label>
        </div>
        <div class="col-9">
            <label>{{$product->description}}</label>
        </div>
    </div><div class="row mb-3">
        <div class="col-3">

            <label>Cantidad:</label>
        </div>
        <div class="col-9">

            <label>{{$product->stock}}</label>
        </div>
    </div><div class="row mb-3">
        <div class="col-3">
            <label>Marca:</label>
        </div>
        <div class="col-9">
            <label>{{$product->brand}}</label>
        </div>
    </div><div class="row mb-3">
        <div class="col-3">
            <label>Precio:</label>
        </div>
        <div class="col-9">
            <label>{{$product->price}}</label>
        </div>
    </div><div class="row mb-3">
        <div class="col-3">
            <label>Imagen:</label>
        </div>
        <div class="col-9">
            <img src="{{asset($product->image)}}" alt="{{$product->name}}" class="img-fluid">
        </div>
    </div>
    <a class="btn btn-warning" href="{{route("products.index")}}">Volver a la pagina Principal</a>
</div>

@endsection
