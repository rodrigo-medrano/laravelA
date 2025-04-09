<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/app.css','resources/sass/app.scss', 'resources/js/app.js'])
    <title>@yield('title')</title>
</head>
<body>
    <ul class="nav nav-tabs">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="{{url('/products')}}">Productos</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{route('categories.index')}}">Categorias</a>
        </li>
    </ul>
    @yield('content')
</body>
</html>
