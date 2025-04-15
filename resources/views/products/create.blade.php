@extends('layouts.app')
@section('title', 'Crear productos')
@section('content')

<h2>Productos</h2>
<div class="container">
    <form action="{{route('products.store')}}" method="post">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Nombre</label>
            <input type="text" class="form-control" id="name" name="name">
        </div>
        @error('name')<div>{{$message}}</div>@enderror
        <div class="mb-3">
            <label for="description" class="form-label">Descripción</label>
            <textarea name="description" class="form-control" id="description" cols="30" rows="10"></textarea>
        </div>
        @error('description')<div>{{$message}}</div>@enderror
        <div class="mb-3">
            <label for="stock" class="form-label">Cantidad</label>
            <input type="number" class="form-control" id="stock" name="stock">
        </div>

        @error('stock')<div>{{$message}}</div>@enderror
        <div class="mb-3">
            <label for="brand" class="form-label">Marca</label>
            <input type="text" class="form-control" id="brand" name="brand">
        </div>

        @error('brand')<div>{{$message}}</div>@enderror
        <div class="mb-3">
            <label for="price" class="form-label">Precio</label>
            <input type="number" step=".01" class="form-control" id="price" name="price">
        </div>

        @error('price')<div>{{$message}}</div>@enderror
        <div class="mb-3">
            <label for="image" class="form-label">Imagen</label>
            <input type="file" class="form-control" id="image" name="image">
        </div>

        @error('image')<div>{{$message}}</div>@enderror
        <div class="mb-3">
            <label for="category_id">Categoría</label>
            <select name='category_id' id='category_id' class='form-select'>
                @foreach ($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>
        @error('category_id')<div>{{$message}}</div>@enderror

        <button type='submit' class='btn btn-primary'>Crear producto</button>
    </form>
</div>

@endsection
