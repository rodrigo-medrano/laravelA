@extends('layouts.app')
@section('title','Mostrar Elemento')
@section('content')
    <b>Nombre: &nbsp;</b>{{$category->name}}<br>
    <a href="{{route('categories.index')}}">Volver</a>
@endsection
