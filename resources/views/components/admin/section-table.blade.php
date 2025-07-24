@props(['title', 'route', 'button', 'items', 'nameField', 'categoryField', 'editRoute', 'deleteRoute'])

<section class="bg-white rounded-xl shadow p-6 space-y-4">
    <div class="flex justify-between items-center">
        <h3 class="text-2xl font-semibold text-gray-800">{{ $title }}</h3>
        <a href="{{ route($route) }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 transition">
            + {{ $button }}
        </a>
    </div>

    @if(count($items))
        <div class="overflow-x-auto">
            <table class="min-w-full text-left">
                <thead class="bg-gray-50 text-gray-600 uppercase text-sm border-b">
                    <tr>
                        <th class="p-3">Nom</th>
                        <th class="p-3">Catégorie</th>
                        <th class="p-3 text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y">
                    @foreach($items as $item)
                        <tr>
                            <td class="p-3">{{ data_get($item, $nameField) }}</td>
                            <td class="p-3">{{ data_get($item, $categoryField) }}</td>
                            <td class="p-3 text-right space-x-2">
                                <a href="{{ route($editRoute, $item->id) }}" class="text-blue-600 hover:underline">Modifier</a>
                                <form action="{{ route($deleteRoute, $item->id) }}" method="POST" class="inline">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:underline">Supprimer</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @else
        <p class="text-gray-500 text-sm italic">Aucun élément trouvé.</p>
    @endif
</section>
