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
    <a href="{{ route('products.report') }}" class="btn btn-primary">Crear Reporte</a>
    <a href="{{ route('download') }}" class="btn btn-primary">Crear Excel</a>

    @livewire('product-table')
</div>
@endsection
