<div>
    <input type="text" wire:model.live="search" placeholder="Buscar productos..." class="border p-2 mb-4 w-full"/>

    <table class="w-full table-auto border-collapse border border-gray-300">
        <thead>
            <tr class="bg-gray-100">
                <th class="border px-4 py-2">Nombre</th>
                <th class="border px-4 py-2">Categoría</th>
                <th class="border px-4 py-2">Precio</th>
            </tr>
        </thead>
        <tbody>
            @forelse($products as $product)
            <tr>
                <td class="border px-4 py-2">{{ $product->name }}</td>
                <td class="border px-4 py-2">{{ $product->category->name }}</td>
                <td class="border px-4 py-2">{{ $product->price }}</td>
            </tr>
            @empty
            <tr>
                <td colspan="3" class="text-center py-4">No se encontraron productos.</td>
            </tr>
            @endforelse
        </tbody>
    </table>

    <div class="mt-4">
        {{ $products->links() }}
    </div>
</div>
