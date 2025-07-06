<x-app-layout>
    <div class="max-w-3xl mx-auto p-8 bg-white rounded-xl shadow-lg mt-12 border border-gray-200">

        <h1 class="text-3xl font-semibold text-gray-900 mb-8">Créer un nouveau produit</h1>

        <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data" class="space-y-7">
            @csrf

            <div>
                <label for="name" class="block text-gray-700 font-medium mb-2">Nom du produit</label>
                <input 
                    type="text" name="name" id="name" value="{{ old('name') }}" required
                    class="w-full rounded-md border border-gray-300 bg-gray-50 text-gray-900
                           placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-indigo-400 focus:border-indigo-400
                           transition duration-150 ease-in-out
                           @error('name') border-red-500 focus:ring-red-400 focus:border-red-400 @enderror"
                    placeholder="Nom du produit">
                @error('name')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="description" class="block text-gray-700 font-medium mb-2">Description</label>
                <textarea 
                    name="description" id="description" rows="5"
                    class="w-full rounded-md border border-gray-300 bg-gray-50 text-gray-900
                           placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-indigo-400 focus:border-indigo-400
                           transition duration-150 ease-in-out
                           @error('description') border-red-500 focus:ring-red-400 focus:border-red-400 @enderror"
                    placeholder="Description du produit">{{ old('description') }}</textarea>
                @error('description')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="price" class="block text-gray-700 font-medium mb-2">Prix (€)</label>
                <input 
                    type="number" name="price" id="price" step="0.01" min="0" value="{{ old('price') }}" required
                    class="w-full rounded-md border border-gray-300 bg-gray-50 text-gray-900
                           placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-indigo-400 focus:border-indigo-400
                           transition duration-150 ease-in-out
                           @error('price') border-red-500 focus:ring-red-400 focus:border-red-400 @enderror"
                    placeholder="Prix du produit">
                @error('price')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="image" class="block text-gray-700 font-medium mb-2">Image (optionnelle)</label>
                <input
                    type="file" name="image" id="image" accept="image/*"
                    class="w-full rounded-md border border-gray-300 bg-gray-50 text-gray-700
                           focus:outline-none focus:ring-2 focus:ring-indigo-400 focus:border-indigo-400
                           transition duration-150 ease-in-out
                           @error('image') border-red-500 focus:ring-red-400 focus:border-red-400 @enderror"
                >
                @error('image')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="category_product_id" class="block text-gray-700 font-medium mb-2">Catégorie</label>
                <select
                    name="category_product_id" id="category_product_id" required
                    class="w-full rounded-md border border-gray-300 bg-gray-50 text-gray-900
                           focus:outline-none focus:ring-2 focus:ring-indigo-400 focus:border-indigo-400
                           transition duration-150 ease-in-out
                           @error('category_product_id') border-red-500 focus:ring-red-400 focus:border-red-400 @enderror"
                >
                    <option value="" disabled {{ old('category_product_id') ? '' : 'selected' }}>
                        -- Sélectionnez une catégorie --
                    </option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" {{ old('category_product_id') == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
                @error('category_product_id')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <button
                    type="submit"
                    class="w-full bg-indigo-600 hover:bg-indigo-700 focus:ring-indigo-500 text-white font-semibold py-3 rounded-lg
                           transition duration-200 ease-in-out shadow-md"
                >
                    Créer le produit
                </button>
            </div>
        </form>

    </div>
</x-app-layout>
