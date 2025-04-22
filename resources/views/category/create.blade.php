@extends('layouts.app2')
@section('title', 'Crear Categoria')
@section('content')
  <form action="{{route('categories.store')}}" method="POST">
    @csrf
    <label for="name">Nombre</label>
    <input type="text" name="name" id="name">
    <button type="submit">Guardar</button>
  </form>
@endsection
