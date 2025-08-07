<x-admin-layout>
    <div class="min-h-screen bg-gray-100 flex">

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

            {{-- Overview Stats Cards --}}
            <section class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-6">
                <div class="card bg-gradient-to-r from-cyan-400 to-cyan-500 text-white shadow-lg hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1">
                    <div class="card-body p-6">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-cyan-100 text-sm font-medium">Produits</p>
                                <h3 class="text-3xl font-bold">{{ $products->count() }}</h3>
                            </div>
                            <div class="text-3xl opacity-80">
                                <i class="fa-solid fa-box"></i>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card bg-gradient-to-r from-blue-500 to-blue-600 text-white shadow-lg hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1">
                    <div class="card-body p-6">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-blue-100 text-sm font-medium">Services</p>
                                <h3 class="text-3xl font-bold">{{ $services->count() }}</h3>
                            </div>
                            <div class="text-3xl opacity-80">
                                <i class="fa-solid fa-screwdriver-wrench"></i>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card bg-gradient-to-r from-indigo-500 to-indigo-600 text-white shadow-lg hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1">
                    <div class="card-body p-6">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-indigo-100 text-sm font-medium">Formations</p>
                                <h3 class="text-3xl font-bold">{{ $formations->count() }}</h3>
                            </div>
                            <div class="text-3xl opacity-80">
                                <i class="fa-solid fa-chalkboard-user"></i>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card bg-gradient-to-r from-purple-500 to-purple-600 text-white shadow-lg hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1">
                    <div class="card-body p-6">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-purple-100 text-sm font-medium">Articles Blog</p>
                                <h3 class="text-3xl font-bold">{{ $blogs->count() }}</h3>
                            </div>
                            <div class="text-3xl opacity-80">
                                <i class="fa-solid fa-newspaper"></i>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card bg-gradient-to-r from-red-400 to-red-500 text-white shadow-lg hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1">
                    <div class="card-body p-6">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-red-100 text-sm font-medium">Utilisateurs</p>
                                <h3 class="text-3xl font-bold">{{ $users->count() }}</h3>
                            </div>
                            <div class="text-3xl opacity-80">
                                <i class="fa-solid fa-users"></i>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card bg-gradient-to-r from-green-400 to-green-500 text-white shadow-lg hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1">
                    <div class="card-body p-6">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-green-100 text-sm font-medium">Partenaires</p>
                                <h3 class="text-3xl font-bold">{{ $partners->count() }}</h3>
                            </div>
                            <div class="text-3xl opacity-80">
                                <i class="fa-solid fa-handshake"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            {{-- Quick Actions --}}
            <section class="bg-white rounded-2xl shadow-lg p-6">
                <h3 class="text-2xl font-bold text-gray-800 mb-6">Actions Rapides</h3>
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-4">
                    <a href="{{ route('products.create') }}" class="btn btn-primary btn-sm flex flex-col items-center gap-2 p-4 h-auto">
                        <i class="fa-solid fa-plus text-2xl"></i>
                        <span class="text-sm">Nouveau Produit</span>
                    </a>
                    <a href="{{ route('services.create') }}" class="btn btn-primary btn-sm flex flex-col items-center gap-2 p-4 h-auto">
                        <i class="fa-solid fa-plus text-2xl"></i>
                        <span class="text-sm">Nouveau Service</span>
                    </a>
                    <a href="{{ route('formations.create') }}" class="btn btn-primary btn-sm flex flex-col items-center gap-2 p-4 h-auto">
                        <i class="fa-solid fa-plus text-2xl"></i>
                        <span class="text-sm">Nouvelle Formation</span>
                    </a>
                    <a href="{{ route('blog.create') }}" class="btn btn-outline btn-accent flex flex-col items-center gap-2 p-4 h-auto">
                        <i class="fa-solid fa-plus text-2xl"></i>
                        <span class="text-sm">Nouvel Article</span>
                    </a>
                    <a href="{{ route('partners.create') }}" class="btn btn-outline btn-success flex flex-col items-center gap-2 p-4 h-auto">
                        <i class="fa-solid fa-plus text-2xl"></i>
                        <span class="text-sm">Nouveau Partenaire</span>
                    </a>
                    <a href="{{ route('settings.index') }}" class="btn btn-outline btn-warning flex flex-col items-center gap-2 p-4 h-auto">
                        <i class="fa-solid fa-gear text-2xl"></i>
                        <span class="text-sm">Paramètres</span>
                    </a>
                </div>
            </section>

            {{-- Products Section --}}
            <section class="bg-white rounded-3xl shadow-xl border border-gray-100 overflow-hidden">
                <div class="p-8">
                    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 mb-8">
                        <div>
                            <h3 class="text-2xl font-bold text-gray-800 flex items-center gap-3">
                                <div class="w-8 h-8 bg-gradient-to-r from-cyan-500 to-blue-500 rounded-xl flex items-center justify-center">
                                    <i class="fa-solid fa-box text-white text-sm"></i>
                                </div>
                                Produits Récents
                            </h3>
                            <p class="text-gray-600 mt-1">Gérez vos derniers produits ajoutés</p>
                        </div>
                        <div class="flex gap-3">
                            <a href="{{ route('products.create') }}" class="btn btn-primary btn-sm gap-2 hover:scale-105 transition-transform duration-200">
                                <i class="fa-solid fa-plus"></i> Ajouter Produit
                            </a>
                            <a href="/products" class="btn btn-ghost btn-sm hover:bg-gray-100">Voir tous</a>
                        </div>
                    </div>

                    @if(count($products))
                        <div class="overflow-x-auto">
                            <table class="table table-zebra w-full">
                                <thead>
                                    <tr class="bg-gray-50">
                                        <th class="font-semibold">Nom</th>
                                        <th class="font-semibold">Catégorie</th>
                                        <th class="font-semibold">Status</th>
                                        <th class="font-semibold text-right">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($products->take(5) as $product)
                                        <tr class="hover">
                                            <td class="font-medium">{{ $product->name }}</td>
                                            <td>
                                                @if($product->category)
                                                    <div class="badge badge-outline">{{ $product->category->name }}</div>
                                                @else
                                                    <span class="text-gray-400">—</span>
                                                @endif
                                            </td>
                                            <td>
                                                <div class="badge badge-success badge-sm">Actif</div>
                                            </td>
                                            <td class="text-right">
                                                <div class="flex items-center justify-end gap-2">
                                                    <a href="{{ route('products.edit', $product->id) }}" class="text-blue-600 hover:text-blue-800 hover:underline text-sm font-medium transition-colors duration-200">
                                                        Modifier
                                                    </a>
                                                    <form action="{{ route('products.destroy', $product->id) }}" method="POST" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer ce produit ?')" class="inline-block">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="text-red-600 hover:text-red-800 hover:underline text-sm font-medium transition-colors duration-200">
                                                            Supprimer
                                                        </button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <div class="text-center py-16">
                            <div class="w-24 h-24 bg-gray-100 rounded-3xl flex items-center justify-center mx-auto mb-4">
                                <i class="fa-solid fa-box text-4xl text-gray-400"></i>
                            </div>
                            <h4 class="text-xl font-semibold text-gray-800 mb-2">Aucun produit trouvé</h4>
                            <p class="text-gray-600 mb-6">Commencez par créer votre premier produit</p>
                            <a href="{{ route('products.create') }}" class="btn btn-primary btn-lg gap-2 hover:scale-105 transition-transform duration-200">
                                <i class="fa-solid fa-plus"></i> Créer un produit
                            </a>
                        </div>
                    @endif
                </div>
            </section>

            {{-- Services Section --}}
            <section class="bg-white rounded-3xl shadow-xl border border-gray-100 overflow-hidden">
                <div class="p-8">
                    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 mb-8">
                        <div>
                            <h3 class="text-2xl font-bold text-gray-800 flex items-center gap-3">
                                <div class="w-8 h-8 bg-gradient-to-r from-cyan-500 to-blue-500 rounded-xl flex items-center justify-center">
                                    <i class="fa-solid fa-screwdriver-wrench text-white text-sm"></i>
                                </div>
                                Services Récents
                            </h3>
                            <p class="text-gray-600 mt-1">Gérez vos derniers services ajoutés</p>
                        </div>
                        <div class="flex gap-3">
                            <a href="{{ route('services.create') }}" class="btn btn-primary btn-sm gap-2 hover:scale-105 transition-transform duration-200">
                                <i class="fa-solid fa-plus"></i> Ajouter Service
                            </a>
                            <a href="/services" class="btn btn-ghost btn-sm hover:bg-gray-100">Voir tous</a>
                        </div>
                    </div>

                    @if(count($services))
                        <div class="overflow-x-auto">
                            <table class="table table-zebra w-full">
                                <thead>
                                    <tr class="bg-gray-50">
                                        <th class="font-semibold">Nom</th>
                                        <th class="font-semibold">Catégorie</th>
                                        <th class="font-semibold">Status</th>
                                        <th class="font-semibold text-right">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($services->take(5) as $service)
                                        <tr class="hover">
                                            <td class="font-medium">{{ $service->name }}</td>
                                            <td>
                                                @if($service->category)
                                                    <div class="badge badge-outline">{{ $service->category->name }}</div>
                                                @else
                                                    <span class="text-gray-400">—</span>
                                                @endif
                                            </td>
                                            <td>
                                                <div class="badge badge-success badge-sm">Actif</div>
                                            </td>
                                            <td class="text-right">
                                                <div class="flex items-center justify-end gap-2">
                                                    <a href="{{ route('services.edit', $service->id) }}" class="text-blue-600 hover:text-blue-800 hover:underline text-sm font-medium transition-colors duration-200">
                                                        Modifier
                                                    </a>
                                                    <form action="{{ route('services.destroy', $service->id) }}" method="POST" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer ce service ?')" class="inline-block">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="text-red-600 hover:text-red-800 hover:underline text-sm font-medium transition-colors duration-200">
                                                            Supprimer
                                                        </button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <div class="text-center py-16">
                            <div class="w-24 h-24 bg-gray-100 rounded-3xl flex items-center justify-center mx-auto mb-4">
                                <i class="fa-solid fa-screwdriver-wrench text-4xl text-gray-400"></i>
                            </div>
                            <h4 class="text-xl font-semibold text-gray-800 mb-2">Aucun service trouvé</h4>
                            <p class="text-gray-600 mb-6">Commencez par créer votre premier service</p>
                            <a href="{{ route('services.create') }}" class="btn btn-primary btn-lg gap-2 hover:scale-105 transition-transform duration-200">
                                <i class="fa-solid fa-plus"></i> Créer un service
                            </a>
                        </div>
                    @endif
                </div>
            </section>

            {{-- Formations Section --}}
            <section class="bg-white rounded-3xl shadow-xl border border-gray-100 overflow-hidden">
                <div class="p-8">
                    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 mb-8">
                        <div>
                            <h3 class="text-2xl font-bold text-gray-800 flex items-center gap-3">
                                <div class="w-8 h-8 bg-gradient-to-r from-cyan-500 to-blue-500 rounded-xl flex items-center justify-center">
                                    <i class="fa-solid fa-chalkboard-user text-white text-sm"></i>
                                </div>
                                Formations Récentes
                            </h3>
                            <p class="text-gray-600 mt-1">Gérez vos dernières formations ajoutées</p>
                        </div>
                        <div class="flex gap-3">
                            <a href="{{ route('formations.create') }}" class="btn btn-primary btn-sm gap-2 hover:scale-105 transition-transform duration-200">
                                <i class="fa-solid fa-plus"></i> Ajouter Formation
                            </a>
                            <a href="/formations" class="btn btn-ghost btn-sm hover:bg-gray-100">Voir toutes</a>
                        </div>
                    </div>

                    @if(count($formations))
                        <div class="overflow-x-auto">
                            <table class="table table-zebra w-full">
                                <thead>
                                    <tr class="bg-gray-50">
                                        <th class="font-semibold">Nom</th>
                                        <th class="font-semibold">Catégorie</th>
                                        <th class="font-semibold">Status</th>
                                        <th class="font-semibold text-right">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($formations->take(5) as $formation)
                                        <tr class="hover">
                                            <td class="font-medium">{{ $formation->name }}</td>
                                            <td>
                                                @if($formation->category)
                                                    <div class="badge badge-outline badge-secondary">{{ $formation->category->name }}</div>
                                                @else
                                                    <span class="text-gray-400">—</span>
                                                @endif
                                            </td>
                                            <td>
                                                <div class="badge badge-success badge-sm">Disponible</div>
                                            </td>
                                            <td class="text-right">
                                                <div class="flex items-center justify-end gap-2">
                                                    <a href="{{ route('formations.edit', $formation->id) }}" class="text-blue-600 hover:text-blue-800 hover:underline text-sm font-medium transition-colors duration-200">
                                                        Modifier
                                                    </a>
                                                    <form action="{{ route('formations.destroy', $formation->id) }}" method="POST" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cette formation ?')" class="inline-block">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="text-red-600 hover:text-red-800 hover:underline text-sm font-medium transition-colors duration-200">
                                                            Supprimer
                                                        </button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <div class="text-center py-16">
                            <div class="w-24 h-24 bg-gray-100 rounded-3xl flex items-center justify-center mx-auto mb-4">
                                <i class="fa-solid fa-chalkboard-user text-4xl text-gray-400"></i>
                            </div>
                            <h4 class="text-xl font-semibold text-gray-800 mb-2">Aucune formation trouvée</h4>
                            <p class="text-gray-600 mb-6">Commencez par créer votre première formation</p>
                            <a href="{{ route('formations.create') }}" class="btn btn-primary btn-lg gap-2 hover:scale-105 transition-transform duration-200">
                                <i class="fa-solid fa-plus"></i> Créer une formation
                            </a>
                        </div>
                    @endif
                </div>
            </section>

            {{-- Partners Section --}}
            <section class="card bg-white shadow-xl border border-gray-100 rounded-3xl overflow-hidden mb-8">
                <div class="card-body">
                    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 mb-8">
                        <h3 class="text-2xl font-bold text-gray-800 flex items-center gap-3">
                            <i class="fa-solid fa-handshake text-green-500 text-xl"></i>
                            Partenaires
                        </h3>
                        <div class="flex gap-2">
                            <a href="{{ route('partners.create') }}" class="btn btn-success btn-sm">
                                <i class="fa-solid fa-plus"></i> Ajouter
                            </a>
                            <a href="/admin/partners" class="btn btn-outline btn-sm">Voir tous</a>
                        </div>
                    </div>

                    @if(count($partners))
                        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
                            @foreach ($partners as $partner)
                                <div class="bg-gray-50 border border-gray-100 rounded-2xl p-6 flex flex-col items-center text-center">
                                    <img src="{{ asset('storage/' . $partner->image) }}"
                                         alt="{{ $partner->name }}"
                                         class="w-24 h-24 rounded-full object-cover border border-gray-300 mb-4">
                                    <h3 class="text-lg font-semibold text-gray-800 mb-2">{{ $partner->name }}</h3>
                                    <div class="flex gap-3 mt-4">
                                        <a href="{{ route('partners.edit', $partner) }}"
                                           class="btn btn-sm bg-blue-600 text-white hover:bg-blue-700 transition-none">
                                            Modifier
                                        </a>
                                        <form action="{{ route('partners.destroy', $partner) }}" method="POST"
                                              onsubmit="return confirm('Supprimer ce partenaire ?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                    class="btn btn-sm bg-red-500 text-white hover:bg-red-600 transition-none">
                                                Supprimer
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <div class="text-center py-16">
                            <i class="fa-solid fa-handshake text-6xl text-gray-300 mb-6"></i>
                            <p class="text-gray-500 text-lg">Aucun partenaire trouvé.</p>
                            <a href="{{ route('partners.create') }}" class="btn btn-success mt-6">Ajouter le premier partenaire</a>
                        </div>
                    @endif
                </div>
            </section>

            {{-- Blog Articles Section --}}
            <section class="bg-white rounded-3xl shadow-xl border border-gray-100 p-6">
                <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 mb-6">
                    <div>
                        <h3 class="text-2xl font-bold text-gray-800 flex items-center gap-3">
                            <div class="w-8 h-8 bg-gradient-to-r from-indigo-500 to-violet-500 rounded-xl flex items-center justify-center">
                                <i class="fa-solid fa-newspaper text-white text-sm"></i>
                            </div>
                            Articles de Blog Récents
                        </h3>
                        <p class="text-gray-600 text-sm mt-1">Gérez vos derniers articles de blog</p>
                    </div>
                    <div class="flex gap-3">
                        <a href="{{ route('blog.create') }}" class="btn btn-primary btn-sm gap-2 hover:scale-105 transition-transform duration-200">
                            <i class="fa-solid fa-plus"></i> Nouvel Article
                        </a>
                        <a href="{{ route('blog.index') }}" class="btn btn-ghost btn-sm hover:bg-gray-100">Voir tous</a>
                    </div>
                </div>

                @if(count($blogs))
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                        @foreach($blogs->take(5) as $blog)
                            <div class="bg-gray-50 rounded-xl p-5 flex flex-col justify-between border border-gray-100 hover:shadow-lg transition-all duration-300">
                                <div class="mb-6">
                                    <h4 class="text-lg font-semibold text-gray-800 line-clamp-2">{{ $blog->title }}</h4>
                                    <p class="text-sm text-gray-500 mt-2">
                                        @if($blog->tags->isNotEmpty())
                                            @foreach($blog->tags as $tag)
                                                <span class="badge badge-outline mr-1">{{ $tag->name }}</span>
                                            @endforeach
                                        @else
                                            <span class="text-gray-400">Aucun tag</span>
                                        @endif
                                        • {{ $blog->created_at->format('d M Y') }}
                                    </p>
                                </div>
                                <div class="flex items-center justify-between">
                                    <div class="flex gap-3">
                                        <a href="{{ route('blog.edit', $blog->id) }}" 
                                           class="btn btn-sm btn-ghost text-blue-600 hover:bg-blue-50 hover:text-blue-800 transition-all duration-200">
                                            <i class="fa-solid fa-edit mr-1"></i> Modifier
                                        </a>
                                        <form action="{{ route('blog.destroy', $blog->id) }}" method="POST" 
                                              onsubmit="return confirm('Supprimer cet article ?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" 
                                                    class="btn btn-sm btn-ghost text-red-600 hover:bg-red-50 hover:text-red-800 transition-all duration-200">
                                                <i class="fa-solid fa-trash mr-1"></i> Supprimer
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <div class="text-center py-16">
                        <div class="w-24 h-24 bg-gray-100 rounded-3xl flex items-center justify-center mx-auto mb-4">
                            <i class="fa-solid fa-newspaper text-4xl text-gray-400"></i>
                        </div>
                        <h4 class="text-xl font-semibold text-gray-800 mb-2">Aucun article trouvé</h4>
                        <p class="text-gray-600 mb-4">Commencez par créer votre premier article</p>
                        <a href="{{ route('blog.create') }}" 
                           class="btn btn-primary btn-lg gap-2 hover:scale-105 transition-transform duration-200">
                            <i class="fa-solid fa-plus"></i> Créer un article
                        </a>
                    </div>
                @endif
            </section>

            {{-- Settings Quick Access --}}
            <section class="card rounded-3xl bg-gradient-to-r from-orange-400 to-orange-500 text-white shadow-lg overflow-hidden mb-8">
                <div class="card-body px-8 py-6">
                    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
                        <div>
                            <h3 class="text-2xl font-bold mb-2">Paramètres du Site</h3>
                            <p class="text-orange-100 max-w-md">
                                Gérez les réseaux sociaux, informations de contact et autres paramètres importants du site.
                            </p>
                        </div>
                        <div>
                            <a href="{{ route('settings.index') }}" 
                               class="btn btn-white btn-outline text-orange-600 hover:text-white hover:bg-white/20 transition font-semibold px-5 py-2 rounded-lg shadow-sm">
                                <i class="fa-solid fa-gear mr-2"></i> Paramètres
                            </a>
                        </div>
                    </div>
                </div>
            </section>
        </main>
    </div>
</x-admin-layout>