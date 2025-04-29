@extends('layouts.app2')
@section('title', 'Categorias')
@section('content')
<a class="btn btn-primary" href="{{route('categories.create')}}">Crear Categoria</a>

<a class="btn btn-primary" href="{{route('categories.report')}}">Crear Reporte</a>
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
                    <a href="{{route('categories.edit',$category)}}">Editar</a>
                    <form action="{{route('categories.destroy',$category)}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Eliminar</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
  </table>
@endsection
