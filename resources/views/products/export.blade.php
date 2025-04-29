<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Descripción</th>
            <th>Cantidad</th>
            <th>Imagen</th>
            <th>Precio</th>
            <th>Marca</th>
            <th>Categoría</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($products as $product)
            <tr>
                <td>{{ $product->id }}</td>
                <td>{{ $product->name }}</td>
                <td>{{ $product->description }}</td>
                <td>{{ $product->stock }}</td>
                <td>@if($product->image)
                    <img src="{{ asset('storage/' . $product->image) }}" alt="Imagen del producto" width="50">
                    @else
                    Sin imagen
                    @endif</td>
                <td>{{ $product->price }}</td>
                <td>{{ $product->brand }}</td>
                <td>{{ $product->category->name }}</td>
            </tr>
        @endforeach
    </tbody>
</table>

