<x-admin-layout>
    <div class="min-h-screen bg-gray-100 flex">

        {{-- Sidebar 
        <aside class="w-64 bg-gray-900 text-white flex flex-col p-6">
            <h1 class="text-2xl font-bold mb-8 text-center">Admin Panel</h1>
            <nav class="space-y-2">
                <a href="/admin/manage" class="flex items-center gap-3 px-4 py-3 rounded hover:bg-gray-700 transition">
                    <i class="fa-solid fa-gear w-5"></i> <span>Manage</span>
                </a>
                <a href="/admin/products" class="flex items-center gap-3 px-4 py-3 rounded hover:bg-gray-700 transition">
                    <i class="fa-solid fa-box w-5"></i> <span>Products</span>
                </a>
                <a href="/admin/services" class="flex items-center gap-3 px-4 py-3 rounded hover:bg-gray-700 transition">
                    <i class="fa-solid fa-screwdriver-wrench w-5"></i> <span>Services</span>
                </a>
                <a href="/admin/formations" class="flex items-center gap-3 px-4 py-3 rounded hover:bg-gray-700 transition">
                    <i class="fa-solid fa-chalkboard-user w-5"></i> <span>Formations</span>
                </a>
                <a href="/admin/blog" class="flex items-center gap-3 px-4 py-3 rounded hover:bg-gray-700 transition">
                    <i class="fa-solid fa-newspaper w-5"></i> <span>Blog</span>
                </a>
                <a href="/admin/users" class="flex items-center gap-3 px-4 py-3 rounded hover:bg-gray-700 transition">
                    <i class="fa-solid fa-users w-5"></i> <span>Users</span>
                </a>
            </nav>
        </aside>
--}}




        {{-- Main content --}}
        <main class="flex-1 p-8 space-y-10">

            {{-- Header --}}
            <header class="flex justify-between items-center">
                <h2 class="text-3xl font-bold text-gray-800">Tableau de gestion</h2>
                <div class="flex items-center gap-4">
                    <span class="text-gray-600">Admin</span>
                    <div class="w-10 h-10 rounded-full bg-blue-500 text-white flex items-center justify-center font-bold">A</div>
                </div>
            </header>

            {{-- Stat Cards --}}
            <section class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-6">
                <div class="bg-cyan-400 text-white rounded-xl p-5 shadow hover:shadow-lg">
                    <p class="text-sm">Produits</p>
                    <h3 class="text-2xl font-bold">{{ $products->count() }}</h3>
                </div>
                <div class="bg-blue-500 text-white rounded-xl p-5 shadow hover:shadow-lg">
                    <p class="text-sm">Services</p>
                    <h3 class="text-2xl font-bold">{{ $services->count() }}</h3>
                </div>
                <div class="bg-indigo-500 text-white rounded-xl p-5 shadow hover:shadow-lg">
                    <p class="text-sm">Formations</p>
                    <h3 class="text-2xl font-bold">{{ $formations->count() }}</h3>
                </div>
                <div class="bg-purple-500 text-white rounded-xl p-5 shadow hover:shadow-lg">
                    <p class="text-sm">Articles de Blog</p>
                    <h3 class="text-2xl font-bold">{{ $blogs->count() }}</h3>
                </div>
                <div class="bg-red-400 text-white rounded-xl p-5 shadow hover:shadow-lg">
                    <p class="text-sm">Utilisateurs</p>
                    <h3 class="text-2xl font-bold">{{ $users->count() }}</h3>
                </div>
            </section>

            {{-- Products Section --}}
            <x-admin.section-table 
                title="Produits" 
                route="products.create" 
                button="Ajouter Produit" 
                :items="$products" 
                nameField="name" 
                categoryField="category->name" 
                editRoute="products.edit" 
                deleteRoute="products.destroy" 
            />

            {{-- Services Section --}}
            <x-admin.section-table 
                title="Services" 
                route="services.create" 
                button="Ajouter Service" 
                :items="$services" 
                nameField="name" 
                categoryField="category->name" 
                editRoute="services.edit" 
                deleteRoute="services.destroy" 
            />

            {{-- Formations Section --}}
            <section class="bg-white rounded-xl shadow p-6 space-y-4">
    <div class="flex justify-between items-center">
        <h3 class="text-2xl font-semibold text-gray-800">Formations</h3>
        <a href="{{ route('formations.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 transition">
            + Ajouter Formation
        </a>
    </div>

    @if(count($formations))
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
                    @foreach($formations as $formation)
                        <tr>
                            <td class="p-3">{{ $formation->name }}</td>
                            <td class="p-3">{{ $formation->category?->name ?? '—' }}</td>
                            <td class="p-3 text-right space-x-2">
                                <a href="{{ route('formations.edit', $formation->id) }}" class="text-blue-600 hover:underline">Modifier</a>
                                <form action="{{ route('formations.destroy', $formation->id) }}" method="POST" class="inline">
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
        <p class="text-gray-500 text-sm italic">Aucune formation trouvée.</p>
    @endif
</section>


            {{-- Blog Section --}}
            <x-admin.section-table 
                title="Articles de Blog" 
                route="blog.create" 
                button="Ajouter Article" 
                :items="$blogs" 
                nameField="title" 
                categoryField="category->name" 
                editRoute="blog.edit" 
                deleteRoute="blog.destroy" 
            />

        </main>
    </div>
</x-admin-layout>
