<x-admin-layout>
    <div class="p-6 max-w-2xl mx-auto space-y-8 bg-gradient-to-br from-gray-50 to-gray-100 min-h-screen">

        <!-- Page Header -->
        <h1 class="text-3xl font-extrabold text-gray-900 mb-6">Modifier les Paramètres du Site</h1>

        <div class="card bg-white/90 backdrop-blur-md rounded-xl border border-gray-200/50 shadow-lg p-6">
            <form action="{{ route('settings.update', $setting) }}" method="POST" class="space-y-6">
                @csrf
                @method('PUT')

                <div class="form-control">
                    <label class="label font-medium text-gray-700">URL Facebook</label>
                    <input type="url" name="facebook" value="{{ old('facebook', $setting->facebook) }}" class="input input-bordered w-full bg-white/50 border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200" placeholder="https://facebook.com/votrepages">
                    @error('facebook') <p class="text-error text-sm mt-1">{{ $message }}</p> @enderror
                </div>

                <div class="form-control">
                    <label class="label font-medium text-gray-700">URL LinkedIn</label>
                    <input type="url" name="linkedin" value="{{ old('linkedin', $setting->linkedin) }}" class="input input-bordered w-full bg-white/50 border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200" placeholder="https://linkedin.com/in/votreprifil">
                    @error('linkedin') <p class="text-error text-sm mt-1">{{ $message }}</p> @enderror
                </div>

                <div class="form-control">
                    <label class="label font-medium text-gray-700">URL Instagram</label>
                    <input type="url" name="instagram" value="{{ old('instagram', $setting->instagram) }}" class="input input-bordered w-full bg-white/50 border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200" placeholder="https://instagram.com/votreprifil">
                    @error('instagram') <p class="text-error text-sm mt-1">{{ $message }}</p> @enderror
                </div>

                <div class="form-control">
                    <label class="label font-medium text-gray-700">Position</label>
                    <input type="text" name="position" value="{{ old('position', $setting->position) }}" class="input input-bordered w-full bg-white/50 border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200" placeholder="Votre position/adresse">
                    @error('position') <p class="text-error text-sm mt-1">{{ $message }}</p> @enderror
                </div>

                <div class="form-control">
                    <label class="label font-medium text-gray-700">Téléphone</label>
                    <input type="text" name="phone" value="{{ old('phone', $setting->phone) }}" class="input input-bordered w-full bg-white/50 border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200" placeholder="+123 456 7890">
                    @error('phone') <p class="text-error text-sm mt-1">{{ $message }}</p> @enderror
                </div>

                <button type="submit" class="btn btn-primary bg-gradient-to-r from-blue-600 to-blue-700 text-white hover:from-blue-700 hover:to-blue-800 shadow-md hover:shadow-lg transition-all duration-200">Enregistrer les Modifications</button>
            </form>
        </div>
    </div>
</x-admin-layout>