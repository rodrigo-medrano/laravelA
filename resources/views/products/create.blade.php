@extends('layouts.app2')
@section('title', 'Crear productos')
@section('content')
@foreach ($errors->all() as $error)
<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>¡Error!</strong> {{$error}}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
<h2>Productos</h2>
<div class="container">
    <form action="{{route('products.store')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row mb-3">
            <div class="col-3">
                <label for="name" class="form-label">Nombre</label>
            </div>
            <div class="col-9">
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{old('name')}}">
            </div>
            @error('name')<div class="feedback-invalid">{{$message}}</div>@enderror
        </div>
        <div class="row mb-3">
            <div class="col-3">
                <label for="description" class="form-label">Descripción</label>
            </div>
            <div class="col-9">
                <textarea name="description" class="form-control @error('description') is-invalid @enderror" id="description" cols="30" rows="5">{{old('description')}}</textarea>
            </div>
            @error('description')<div class="feedback-invalid">{{$message}}</div>@enderror
        </div>
        <div class="row mb-3">
            <div class="col-3">
                <label for="stock" class="form-label">Cantidad</label>
            </div>
            <div class="col-9">
                <input type="number" class="form-control @error('stock') is-invalid @enderror" id="stock" name="stock" value="{{old('stock')}}">
            </div>
            @error('stock')<div class="feedback-invalid">{{$message}}</div>@enderror
        </div>

        <div class="row mb-3">
            <div class="col-3">
                <label for="brand" class="form-label">Marca</label>
            </div>
            <div class="col-9">
                <input type="text" class="form-control @error('brand') is-invalid @enderror" id="brand" name="brand" value="{{old('brand')}}">
            </div>
            @error('brand')<div class="feedback-invalid">{{$message}}</div>@enderror
        </div>

        <div class="row mb-3">
            <div class="col-3">
                <label for="price" class="form-label">Precio</label>
            </div>
            <div class="col-9">
                <input type="number" step=".01" class="form-control @error('price') is-invalid @enderror" id="price" name="price" value="{{old('price')}}">
            </div>
            @error('price')<div class="feedback-invalid">{{$message}}</div>@enderror
        </div>

        <div class="row mb-3">
            <div class="col-3">
                <label for="image" class="form-label">Imagen</label>
            </div>
            <div class="col-9">
                <input type="file" class="form-control @error('image') is-invalid @enderror" id="image" name="image" value="{{old('image')}}">
            </div>
            @error('image')<div class="feedback-invalid">{{$message}}</div>@enderror

        </div>

        <div class="row mb-3">
            <div class="col-3">
                <label for="category_id">Categoría</label>
            </div>
            <div class="col-9">
                <select name='category_id' id='category_id' class='form-select'>
                    @foreach ($categories as $category)
                    <option value="{{ $category->id }}" @if($category->id==old('category_id')) selected @endif>{{ $category->name }}</option>
                    @endforeach
                </select></div>
            @error('category_id')<div class="feedback-invalid">{{$message}}</div>@enderror

        </div>

        <button type='submit' class='btn btn-primary'>Crear producto</button>
    </form>
</div>

@endsection
