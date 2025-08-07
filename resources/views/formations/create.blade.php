<x-app-layout>
    <div class="max-w-3xl mx-auto p-6 mt-12 bg-gradient-to-br from-white/90 to-gray-50 rounded-xl shadow-2xl border border-gray-200/50 backdrop-blur-md">

        <h1 class="text-4xl font-extrabold text-gray-900 mb-8 text-center">Créer une Nouvelle Formation</h1>

        <form action="{{ route('formations.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf

            <div class="form-control">
                <label for="name" class="block text-lg font-medium text-gray-700 mb-2">Nom de la Formation</label>
                <input 
                    type="text" name="name" id="name" value="{{ old('name') }}" required
                    class="w-full px-4 py-2 rounded-lg border border-gray-300 bg-white/80 text-gray-900
                           placeholder-gray-400 focus:ring-2 focus:ring-indigo-500 focus:border-transparent
                           transition-all duration-200 ease-in-out shadow-sm
                           @error('name') border-red-500 focus:ring-red-500 @enderror"
                    placeholder="Entrez le nom de la formation">
                @error('name')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="form-control">
                <label for="description" class="block text-lg font-medium text-gray-700 mb-2">Description</label>
                <textarea 
                    name="description" id="description" rows="5"
                    class="w-full px-4 py-2 rounded-lg border border-gray-300 bg-white/80 text-gray-900
                           placeholder-gray-400 focus:ring-2 focus:ring-indigo-500 focus:border-transparent
                           transition-all duration-200 ease-in-out shadow-sm
                           @error('description') border-red-500 focus:ring-red-500 @enderror"
                    placeholder="Entrez la description de la formation">{{ old('description') }}</textarea>
                @error('description')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="form-control">
                <label for="price" class="block text-lg font-medium text-gray-700 mb-2">Prix (€)</label>
                <input 
                    type="number" name="price" id="price" step="0.01" min="0" value="{{ old('price') }}" required
                    class="w-full px-4 py-2 rounded-lg border border-gray-300 bg-white/80 text-gray-900
                           placeholder-gray-400 focus:ring-2 focus:ring-indigo-500 focus:border-transparent
                           transition-all duration-200 ease-in-out shadow-sm
                           @error('price') border-red-500 focus:ring-red-500 @enderror"
                    placeholder="Entrez le prix de la formation">
                @error('price')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="form-control">
                <label for="image" class="block text-lg font-medium text-gray-700 mb-2">Image (optionnelle)</label>
                <input
                    type="file" name="image" id="image" accept="image/*"
                    class="w-full px-4 py-2 rounded-lg border border-gray-300 bg-white/80 text-gray-700
                           focus:ring-2 focus:ring-indigo-500 focus:border-transparent
                           transition-all duration-200 ease-in-out shadow-sm
                           @error('image') border-red-500 focus:ring-red-500 @enderror"
                >
                @error('image')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="form-control">
                <label for="category_formation_id" class="block text-lg font-medium text-gray-700 mb-2">Catégorie</label>
                <select
                    name="category_formation_id" id="category_formation_id" required
                    class="w-full px-4 py-2 rounded-lg border border-gray-300 bg-white/80 text-gray-900
                           focus:ring-2 focus:ring-indigo-500 focus:border-transparent
                           transition-all duration-200 ease-in-out shadow-sm
                           @error('category_formation_id') border-red-500 focus:ring-red-500 @enderror"
                >
                    <option value="" disabled {{ old('category_formation_id') ? '' : 'selected' }}>
                        -- Sélectionnez une catégorie --
                    </option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" {{ old('category_formation_id') == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
                @error('category_formation_id')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <button
                    type="submit"
                    class="w-full bg-gradient-to-r from-indigo-600 to-indigo-700 hover:from-indigo-700 hover:to-indigo-800 text-white font-semibold py-3 rounded-lg
                           shadow-md hover:shadow-lg transition-all duration-200 ease-in-out focus:outline-none focus:ring-2 focus:ring-indigo-500"
                >
                    Créer la Formation
                </button>
            </div>
        </form>

    </div>
</x-app-layout>