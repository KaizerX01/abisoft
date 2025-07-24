<x-app-layout>
    <div class="max-w-3xl mx-auto p-8 bg-white rounded-xl shadow-lg mt-12 border border-gray-200">
        <h1 class="text-3xl font-semibold text-gray-900 mb-8">Modifier la formation</h1>

        <form action="{{ route('formations.update', $formation->id) }}" method="POST" enctype="multipart/form-data" class="space-y-7">
            @csrf
            @method('PUT')

            <div>
                <label for="name" class="block text-gray-700 font-medium mb-2">Nom de la formation</label>
                <input type="text" name="name" id="name" value="{{ old('name', $formation->name) }}" required
                       class="w-full rounded-md border border-gray-300 bg-gray-50 text-gray-900 focus:ring-indigo-400 focus:border-indigo-400 transition duration-150 ease-in-out @error('name') border-red-500 focus:ring-red-400 focus:border-red-400 @enderror"
                       placeholder="Nom de la formation">
                @error('name') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
            </div>

            <div>
                <label for="description" class="block text-gray-700 font-medium mb-2">Description</label>
                <textarea name="description" id="description" rows="5"
                          class="w-full rounded-md border border-gray-300 bg-gray-50 text-gray-900 focus:ring-indigo-400 focus:border-indigo-400 transition duration-150 ease-in-out @error('description') border-red-500 focus:ring-red-400 focus:border-red-400 @enderror"
                          placeholder="Description de la formation">{{ old('description', $formation->description) }}</textarea>
                @error('description') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
            </div>

            <div>
                <label for="price" class="block text-gray-700 font-medium mb-2">Prix (€)</label>
                <input type="number" name="price" id="price" step="0.01" min="0" value="{{ old('price', $formation->price) }}" required
                       class="w-full rounded-md border border-gray-300 bg-gray-50 text-gray-900 focus:ring-indigo-400 focus:border-indigo-400 transition duration-150 ease-in-out @error('price') border-red-500 focus:ring-red-400 focus:border-red-400 @enderror"
                       placeholder="Prix de la formation">
                @error('price') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
            </div>

            <div>
                <label for="image" class="block text-gray-700 font-medium mb-2">Image (optionnelle)</label>
                <input type="file" name="image" id="image" accept="image/*"
                       class="w-full rounded-md border border-gray-300 bg-gray-50 text-gray-700 focus:ring-indigo-400 focus:border-indigo-400 transition duration-150 ease-in-out @error('image') border-red-500 focus:ring-red-400 focus:border-red-400 @enderror">
                @error('image') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
            </div>

            <div>
                <label for="category_formation_id" class="block text-gray-700 font-medium mb-2">Catégorie</label>
                <select name="category_formation_id" id="category_formation_id" required
                        class="w-full rounded-md border border-gray-300 bg-gray-50 text-gray-900 focus:ring-indigo-400 focus:border-indigo-400 transition duration-150 ease-in-out @error('category_formation_id') border-red-500 focus:ring-red-400 focus:border-red-400 @enderror">
                    <option value="" disabled>-- Sélectionnez une catégorie --</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" {{ old('category_formation_id', $formation->category_formation_id) == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
                @error('category_formation_id') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
            </div>

            <div>
                <button type="submit"
                        class="w-full bg-indigo-600 hover:bg-indigo-700 focus:ring-indigo-500 text-white font-semibold py-3 rounded-lg transition duration-200 ease-in-out shadow-md">
                    Mettre à jour la formation
                </button>
            </div>
        </form>
    </div>
</x-app-layout>
