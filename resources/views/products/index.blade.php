<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <table>
        <thead>
            <th>ID</th>
            <th>Nombre</th>
            <th>Descripcion</th>
            <th>Cantidad</th>
            <th>Marca</th>
            <th>Precio</th>
        </thead>
        <tbody>
            @foreach ($productos as $producto)
                <tr>
                    <th>{{$producto->id}}</th>
                    <th>{{$producto->name}}</th>
                    <th>{{$producto->description}}</th>
                    <th>{{$producto->stock}}</th>
                    <th>{{$producto->brand}}</th>
                    <th>{{$producto->price}}</th>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
