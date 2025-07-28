<x-admin-layout>
    <div class="p-6 bg-gray-100 min-h-screen space-y-10">
        <h1 class="text-3xl font-bold text-gray-800 mb-4">Tableau de Bord de l'Admin</h1>

        {{-- Products Section --}}
        <div class="bg-white rounded-2xl shadow p-6">
            <div class="flex justify-between items-center mb-4">
                <h2 class="text-xl font-semibold text-gray-700">Produits</h2>
                <a href="{{ route('products.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-xl text-sm font-medium">
                    + Ajouter un Produit
                </a>
            </div>
            <div class="overflow-x-auto">
                <table class="min-w-full text-sm text-left">
                    <thead class="bg-gray-100 text-gray-600 uppercase text-xs">
                        <tr>
                            <th class="py-3 px-4">ID</th>
                            <th class="py-3 px-4">Nom</th>
                            <th class="py-3 px-4">Catégorie</th>
                            <th class="py-3 px-4">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        @foreach ($products as $product)
                            <tr>
                                <td class="py-3 px-4">{{ $product->id }}</td>
                                <td class="py-3 px-4">{{ $product->name }}</td>
                                <td class="py-3 px-4">{{ $product->category->name ?? 'N/A' }}</td>
                                <td class="py-3 px-4 space-x-2">
                                    <a href="{{ route('products.edit', $product) }}" class="text-indigo-600 hover:underline">Modifier</a>
                                    <form action="{{ route('products.destroy', $product) }}" method="POST" class="inline-block" onsubmit="return confirm('Supprimer ce produit ?')">
                                        @csrf @method('DELETE')
                                        <button class="text-red-600 hover:underline">Supprimer</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        {{-- Services Section --}}
        <div class="bg-white rounded-2xl shadow p-6">
            <div class="flex justify-between items-center mb-4">
                <h2 class="text-xl font-semibold text-gray-700">Services</h2>
                <a href="{{ route('services.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-xl text-sm font-medium">
                    + Ajouter un Service
                </a>
            </div>
            <div class="overflow-x-auto">
                <table class="min-w-full text-sm text-left">
                    <thead class="bg-gray-100 text-gray-600 uppercase text-xs">
                        <tr>
                            <th class="py-3 px-4">ID</th>
                            <th class="py-3 px-4">Nom</th>
                            <th class="py-3 px-4">Catégorie</th>
                            <th class="py-3 px-4">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        @foreach ($services as $service)
                            <tr>
                                <td class="py-3 px-4">{{ $service->id }}</td>
                                <td class="py-3 px-4">{{ $service->name }}</td>
                                <td class="py-3 px-4">{{ $service->category->name ?? 'N/A' }}</td>
                                <td class="py-3 px-4 space-x-2">
                                    <a href="{{ route('services.edit', $service) }}" class="text-indigo-600 hover:underline">Modifier</a>
                                    <form action="{{ route('services.destroy', $service) }}" method="POST" class="inline-block" onsubmit="return confirm('Supprimer ce service ?')">
                                        @csrf @method('DELETE')
                                        <button class="text-red-600 hover:underline">Supprimer</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        {{-- Formations Section --}}
        <div class="bg-white rounded-2xl shadow p-6">
            <div class="flex justify-between items-center mb-4">
                <h2 class="text-xl font-semibold text-gray-700">Formations</h2>
                <a href="{{ route('formations.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-xl text-sm font-medium">
                    + Ajouter une Formation
                </a>
            </div>
            <div class="overflow-x-auto">
                <table class="min-w-full text-sm text-left">
                    <thead class="bg-gray-100 text-gray-600 uppercase text-xs">
                        <tr>
                            <th class="py-3 px-4">ID</th>
                            <th class="py-3 px-4">Nom</th>
                            <th class="py-3 px-4">Catégorie</th>
                            <th class="py-3 px-4">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        @foreach ($formations as $formation)
                            <tr>
                                <td class="py-3 px-4">{{ $formation->id }}</td>
                                <td class="py-3 px-4">{{ $formation->name }}</td>
                                <td class="py-3 px-4">{{ $formation->category->name ?? 'N/A' }}</td>
                                <td class="py-3 px-4 space-x-2">
                                    <a href="{{ route('formations.edit', $formation) }}" class="text-indigo-600 hover:underline">Modifier</a>
                                    <form action="{{ route('formations.destroy', $formation) }}" method="POST" class="inline-block" onsubmit="return confirm('Supprimer cette formation ?')">
                                        @csrf @method('DELETE')
                                        <button class="text-red-600 hover:underline">Supprimer</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        {{-- Blog Posts Section --}}
        <div class="bg-white rounded-2xl shadow p-6">
            <div class="flex justify-between items-center mb-4">
                <h2 class="text-xl font-semibold text-gray-700">Articles de Blog</h2>
                <a href="{{ route('blog.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-xl text-sm font-medium">
                    + Ajouter un Article
                </a>
            </div>
            <div class="overflow-x-auto">
                <table class="min-w-full text-sm text-left">
                    <thead class="bg-gray-100 text-gray-600 uppercase text-xs">
                        <tr>
                            <th class="py-3 px-4">ID</th>
                            <th class="py-3 px-4">Titre</th>
                            <th class="py-3 px-4">Étiquettes</th>
                            <th class="py-3 px-4">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        @foreach ($posts as $post)
                            <tr>
                                <td class="py-3 px-4">{{ $post->id }}</td>
                                <td class="py-3 px-4">{{ $post->title }}</td>
                                <td class="py-3 px-4">
                                    @foreach ($post->tags as $tag)
                                        <span class="inline-block bg-gray-200 text-gray-700 text-xs px-2 py-1 rounded">{{ $tag->name }}</span>
                                    @endforeach
                                </td>
                                <td class="py-3 px-4 space-x-2">
                                    <a href="{{ route('blog.edit', $post) }}" class="text-indigo-600 hover:underline">Modifier</a>
                                    <form action="{{ route('blog.destroy', $post) }}" method="POST" class="inline-block" onsubmit="return confirm('Supprimer cet article ?')">
                                        @csrf @method('DELETE')
                                        <button class="text-red-600 hover:underline">Supprimer</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-admin-layout>