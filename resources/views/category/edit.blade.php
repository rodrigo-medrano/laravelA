@extends('layouts.app2')
@section('title','Editar Categoria')
@section('content')
    <h2>Editar Categoria</h2>
    <form action="{{route('categories.update',$category)}}" method="POST">
        @csrf
        @method('PUT')
        <input type="hidden" id="id" name="id" value="{{$category->id}}">
        <label>Nombre:</label>
        <input type="text" name="name" id="name" value="{{$category->name}}"><br>
        <button type="submit">Guardar</button>

    </form>
@endsection
