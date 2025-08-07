<x-admin-layout>
    <div class="p-6 max-w-xl mx-auto space-y-8 bg-gradient-to-br from-white/90 to-gray-50 min-h-screen">

        <h1 class="text-3xl font-extrabold text-gray-900 mb-6 text-center">Ajouter un Nouveau Partenaire</h1>

        <form action="{{ route('partners.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf

            <div class="form-control">
                <label for="name" class="block text-lg font-medium text-gray-700 mb-2">Nom</label>
                <input type="text" name="name" id="name" required class="w-full px-4 py-2 rounded-lg border border-gray-300 bg-white/80 text-gray-900
                           placeholder-gray-400 focus:ring-2 focus:ring-indigo-500 focus:border-transparent
                           transition-all duration-200 ease-in-out shadow-sm
                           @error('name') border-red-500 focus:ring-red-500 @enderror" value="{{ old('name') }}">
                @error('name') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
            </div>

            <div class="form-control">
                <label for="image" class="block text-lg font-medium text-gray-700 mb-2">Image</label>
                <input type="file" name="image" id="image" required class="w-full px-4 py-2 rounded-lg border border-gray-300 bg-white/80 text-gray-700
                           focus:ring-2 focus:ring-indigo-500 focus:border-transparent
                           transition-all duration-200 ease-in-out shadow-sm
                           @error('image') border-red-500 focus:ring-red-500 @enderror" accept="image/*">
                @error('image') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
            </div>

            <button type="submit" class="w-full bg-gradient-to-r from-indigo-600 to-indigo-700 text-white font-semibold py-3 rounded-lg
                           hover:from-indigo-700 hover:to-indigo-800 shadow-md hover:shadow-lg
                           transition-all duration-200 ease-in-out focus:outline-none focus:ring-2 focus:ring-indigo-500">
                Ajouter le Partenaire
            </button>
        </form>
    </div>
</x-admin-layout>