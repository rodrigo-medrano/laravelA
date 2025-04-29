<h1 style="font: 100">Lista de Categorias</h1>
<table style="width: 100%; border: 1px solid black; border-collapse: collapse;">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($categories as $categoria)
            <tr>
                <td>{{ $categoria->id }}</td>
                <td>{{ $categoria->name }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
