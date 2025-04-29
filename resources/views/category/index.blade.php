@extends('layouts.app2')
@section('title', 'Categorias')
@section('content')
<a class="btn btn-primary" href="{{route('categories.create')}}">Crear Categoria</a>

<a class="btn btn-primary" href="{{route('categories.report')}}">Crear Reporte</a>

<a class="btn btn-primary" href="{{route('categories.excel')}}">Crear Excel</a>
  @livewire('categoriess-table')
@endsection
