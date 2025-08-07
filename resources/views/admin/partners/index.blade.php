<x-admin-layout>
    <div class="p-6 max-w-7xl mx-auto space-y-8 bg-gradient-to-br from-gray-50 to-gray-100 min-h-screen">

        <!-- Page Header -->
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-3xl font-extrabold text-gray-900">Partenaires</h1>
            <a href="{{ route('partners.create') }}" class="btn btn-primary bg-gradient-to-r from-blue-600 to-blue-700 text-white hover:from-blue-700 hover:to-blue-800 shadow-md hover:shadow-lg transition-all duration-200">+ Ajouter un Partenaire</a>
        </div>

        @if(session('success'))
            <div class="alert alert-success bg-gradient-to-r from-green-100 to-green-200 border border-green-300 rounded-lg p-4 text-gray-800 font-medium shadow-md animate-fade-in">{{ session('success') }}</div>
        @endif

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @forelse($partners as $partner)
                <div class="card bg-white/90 backdrop-blur-md rounded-xl border border-gray-200/50 shadow-lg p-5 flex flex-col items-center hover:shadow-xl transition-all duration-300 hover:-translate-y-2">
                    <img src="{{ asset('storage/' . $partner->image) }}" alt="{{ $partner->name }}" class="w-32 h-32 object-cover rounded-lg mb-4 border-2 border-blue-100/50">
                    <h2 class="text-xl font-semibold text-gray-800 mb-3">{{ $partner->name }}</h2>
                    <div class="flex gap-3 mt-auto">
                        <a href="{{ route('partners.edit', $partner) }}" class="btn btn-sm btn-outline bg-gradient-to-r from-blue-500 to-blue-600 text-white hover:from-blue-600 hover:to-blue-700">Modifier</a>
                        <form action="{{ route('partners.destroy', $partner) }}" method="POST" onsubmit="return confirm('Êtes-vous sûr ?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-error bg-gradient-to-r from-red-500 to-red-600 text-white hover:from-red-600 hover:to-red-700">Supprimer</button>
                        </form>
                    </div>
                </div>
            @empty
                <div class="col-span-full text-center text-gray-500 text-lg py-8">Aucun partenaire trouvé.</div>
            @endforelse
        </div>
    </div>
</x-admin-layout>