<x-admin-layout>
    <div class="max-w-xl mx-auto py-10 px-4 sm:px-6">
        <h1 class="text-2xl font-semibold text-gray-900 mb-6">Modifier le Partenaire</h1>

        <form action="{{ route('partners.update', $partner) }}" method="POST" enctype="multipart/form-data" class="space-y-6 bg-white rounded-lg border border-gray-200 p-6 shadow-sm">
            @csrf
            @method('PUT')

            <!-- Name Input -->
            <div class="form-control">
                <label for="name" class="block text-sm font-medium text-gray-700 mb-2">
                    Nom du Partenaire
                </label>
                <input 
                    type="text" 
                    name="name" 
                    id="name" 
                    required 
                    class="input input-bordered w-full h-10 px-4 bg-white border-gray-200 focus:border-blue-500 focus:ring-1 focus:ring-blue-500 transition-all duration-200 text-gray-900 placeholder-gray-400 rounded-md" 
                    value="{{ old('name', $partner->name) }}"
                    placeholder="Entrez le nom du partenaire"
                />
                @if($errors->has('name'))
                    <p class="mt-1 text-xs text-red-600 font-medium flex items-center">
                        <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                        </svg>
                        {{ $errors->first('name') }}
                    </p>
                @endif
            </div>

            <!-- Image Input -->
            <div class="form-control">
                <label for="image" class="block text-sm font-medium text-gray-700 mb-2">
                    Image du Partenaire
                </label>
                <div class="flex items-center space-x-4">
                    <div class="flex-1">
                        <input 
                            type="file" 
                            name="image" 
                            id="image" 
                            class="file-input file-input-bordered w-full h-10 bg-white border-gray-200 focus:border-blue-500 focus:ring-1 focus:ring-blue-500 transition-all duration-200 text-gray-900 rounded-md text-sm" 
                            accept="image/*"
                        />
                    </div>
                    <div class="flex-shrink-0">
                        <img src="{{ asset('storage/' . $partner->image) }}" alt="{{ $partner->name }}" class="w-16 h-16 object-cover rounded-full border border-gray-200">
                    </div>
                </div>
                <p class="mt-1 text-xs text-gray-500">Formats acceptés : JPG, PNG, GIF (max. 5 Mo)</p>
                @if($errors->has('image'))
                    <p class="mt-1 text-xs text-red-600 font-medium flex items-center">
                        <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                        </svg>
                        {{ $errors->first('image') }}
                    </p>
                @endif
            </div>

            <!-- Submit Button -->
            <div class="pt-4">
                <button 
                    type="submit" 
                    class="btn w-full h-10 bg-blue-600 hover:bg-blue-700 text-white font-medium rounded-md transition-all duration-200 shadow-sm hover:shadow-md"
                >
                    Mettre à jour le Partenaire
                </button>
            </div>
        </form>
    </div>
</x-admin-layout>