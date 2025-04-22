@extends('layouts.app2')
@section('title', 'Productos')
@section('content')
<div class="container mb-4">
    @if (@session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>

    @endif
    <header class="bg-white dark:bg-gray-800 shadow">
        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
            Lista de Productos
        </div>
    </header>
    <a href="{{ route('products.create') }}" class="btn btn-primary">Crear Producto</a>
    <div>
        <form action="{{route('products.index')}}" method="GET">
            <input type="text" name="search" placeholder="Buscar producto" value="{{ request('search') }}">
            <input type="number" name="paginas" id="paginas">
            <button type="submit" class="btn btn-secondary">Buscar</button>
        </form>
    </div>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Descripcion</th>
                <th>Cantidad</th>
                <th>Marca</th>
                <th>Precio</th>
                <th>Imagen</th>
                <th>Categoría</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($productos as $product)
                <tr>
                    <td>{{ $product->id }}</td>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->description }}</td>
                    <td>{{ $product->stock }}</td>
                    <td>{{ $product->brand }}</td>
                    <td>{{ $product->price }}</td>
                    <td>@if($product->image)<img src="{{asset('storage/'.$product->image)}}" alt="{{$product->name}}">
                        @else
                        No hay imagen
                        @endif</td>
                    <td>{{ $product->category->name }}</td>
                    <td>
                        <a href="{{ route('products.show', $product) }}" class="btn btn-success">Mostrar</a>
                        <a href="{{ route('products.edit', $product) }}" class="btn btn-warning">Editar</a>
                        <form action="{{ route('products.destroy', $product) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
        {{ $productos->links() }}
</div>
@endsection
