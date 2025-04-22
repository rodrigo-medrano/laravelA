<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/app.css','resources/sass/app.scss', 'resources/js/app.js'])
    <title>@yield('title')</title>
</head>

<body class="font-sans antialiased">
        <div>
            @include('layouts.navigation')
            @yield('content')
    </div>
</body>

</html>
