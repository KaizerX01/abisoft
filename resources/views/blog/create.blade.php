<x-app-layout>
    <div class="max-w-4xl mx-auto p-6 mt-12 bg-gradient-to-br from-white/90 to-gray-50 rounded-xl shadow-2xl border border-gray-200/50 backdrop-blur-md">

        <h1 class="text-4xl font-extrabold text-gray-900 mb-8 text-center">📝 Créer un Article de Blog</h1>

        <form action="{{ route('blog.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf

            <!-- Title -->
            <div class="form-control">
                <label for="title" class="block text-lg font-medium text-gray-700 mb-2">Titre</label>
                <input 
                    type="text" 
                    name="title" 
                    placeholder="Entrez le titre du blog..." 
                    value="{{ old('title') }}" 
                    required 
                    class="w-full px-4 py-2 rounded-lg border border-gray-300 bg-white/80 text-gray-900
                           placeholder-gray-400 focus:ring-2 focus:ring-indigo-500 focus:border-transparent
                           transition-all duration-200 ease-in-out shadow-sm
                           @error('title') border-red-500 focus:ring-red-500 @enderror"
                />
                @error('title') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
            </div>

            <!-- Image Upload -->
            <div class="form-control">
                <label for="image" class="block text-lg font-medium text-gray-700 mb-2">Image</label>
                <input 
                    type="file" 
                    name="image" 
                    class="w-full px-4 py-2 rounded-lg border border-gray-300 bg-white/80 text-gray-700
                           focus:ring-2 focus:ring-indigo-500 focus:border-transparent
                           transition-all duration-200 ease-in-out shadow-sm
                           @error('image') border-red-500 focus:ring-red-500 @enderror"
                />
                @error('image') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
            </div>

            <!-- Short Description -->
            <div class="form-control">
                <label for="description" class="block text-lg font-medium text-gray-700 mb-2">Description Courte</label>
                <textarea 
                    name="description" 
                    rows="3" 
                    placeholder="Rédigez une courte description pour votre blog..." 
                    class="w-full px-4 py-2 rounded-lg border border-gray-300 bg-white/80 text-gray-900
                           placeholder-gray-400 focus:ring-2 focus:ring-indigo-500 focus:border-transparent
                           transition-all duration-200 ease-in-out shadow-sm
                           @error('description') border-red-500 focus:ring-red-500 @enderror"
                >{{ old('description') }}</textarea>
                @error('description') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
            </div>

            <!-- Content -->
            <div class="form-control">
                <label for="content" class="block text-lg font-medium text-gray-700 mb-2">Contenu</label>
                <textarea 
                    name="content" 
                    rows="8" 
                    placeholder="Rédigez le contenu complet de votre blog ici..." 
                    required 
                    class="w-full px-4 py-2 rounded-lg border border-gray-300 bg-white/80 text-gray-900
                           placeholder-gray-400 focus:ring-2 focus:ring-indigo-500 focus:border-transparent
                           transition-all duration-200 ease-in-out shadow-sm
                           @error('content') border-red-500 focus:ring-red-500 @enderror"
                >{{ old('content') }}</textarea>
                @error('content') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
            </div>

            <!-- Tags (BIG dropdown) -->
            <div class="form-control">
                <label for="tags" class="block text-lg font-medium text-gray-700 mb-2">Étiquettes</label>
                <select 
                    name="tags[]" 
                    multiple 
                    size="6"
                    class="w-full px-4 py-2 rounded-lg border border-gray-300 bg-white/80 text-gray-900 h-48 overflow-y-auto
                           focus:ring-2 focus:ring-indigo-500 focus:border-transparent
                           transition-all duration-200 ease-in-out shadow-sm
                           @error('tags') border-red-500 focus:ring-red-500 @enderror"
                >
                    @foreach ($tags as $tag)
                        <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                    @endforeach
                </select>
                <small class="text-gray-500 block mt-1">Maintenez <kbd class="kbd kbd-sm">Ctrl</kbd> ou <kbd class="kbd kbd-sm">Cmd</kbd> pour sélectionner plusieurs</small>
                @error('tags') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
            </div>

            <!-- Submit -->
            <div class="pt-4">
                <button 
                    type="submit" 
                    class="w-full bg-gradient-to-r from-blue-600 to-blue-700 text-white font-semibold py-3 rounded-lg
                           hover:from-blue-700 hover:to-blue-800 shadow-md hover:shadow-lg
                           transition-all duration-200 ease-in-out focus:outline-none focus:ring-2 focus:ring-blue-500"
                >
                    🚀 Créer
                </button>
            </div>
        </form>
    </div>
</x-app-layout>