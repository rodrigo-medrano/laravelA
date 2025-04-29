<div>
    <input type="text" wire:model.live="search" placeholder="Buscar categories..." class="border p-2 mb-4 w-full"/>
    <input type="numeric" wire:model.live="page" placeholder="5" class="border p-2 mb-4 w-full"/>
    <table class="w-full table-auto border-collapse border border-gray-300">
        <thead>
            <tr class="bg-gray-100">
                <th class="border px-4 py-2">Id</th>
                <th class="border px-4 py-2">Categoría</th>
                <th class="border px-4 py-2">Opciones</th>
            </tr>
        </thead>
        <tbody>
            @forelse($categories as $category)
            <tr>
                <td class="border px-4 py-2">{{ $category->id }}</td>
                <td class="border px-4 py-2">{{ $category->name }}</td>
                <td><a href="{{route('categories.index')}}/{{$category->id}}">Mostrar</a>
                    <a href="{{route('categories.edit',$category)}}">Editar</a>
                    <form action="{{route('categories.destroy',$category)}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Eliminar</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="3" class="text-center py-4">No se encontraron categorias.</td>
            </tr>
            @endforelse
        </tbody>
    </table>

    <div class="mt-4">
        {{ $categories->links() }}
    </div>
</div>

