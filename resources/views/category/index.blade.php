@extends('layouts.app')
@section('title', 'Categorias')
@section('content')
<a class="btn btn-primary" href="{{route('categories.create')}}">Crear Categoria</a>
  <table>
    <thead>
        <th>ID</th>
        <th>Nombre</th>
        <th>Opciones</th>
    </thead>
    <tbody>
        @foreach($categories as $category)
            <tr>
                <td> {{$category->id}}</td>
                <td> {{$category->name}}</td>
                <td><a href="{{route('categories.index')}}/{{$category->id}}">Mostrar</a>
                    <a href="#">Editar</a>
                <a href="">Eliminar</a></td>
            </tr>
        @endforeach
    </tbody>
  </table>
@endsection
