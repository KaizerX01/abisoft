<x-app-layout>
  <div data-theme="light" class="min-h-screen bg-white text-gray-800">
    <x-slot name="header">
      <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
        <h2 class="text-2xl font-bold text-green-700 flex items-center gap-2">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-green-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 17l.469-1.094a1 1 0 00-.47-1.317L6.75 13l2.999-1.588a1 1 0 00.471-1.317L9.75 9l3.75 2 3.75-2-.469 1.094a1 1 0 00.47 1.317L17.25 13l-2.999 1.588a1 1 0 00-.471 1.317L14.25 17 12 15.75 9.75 17z" />
          </svg>
          {{ __('Galerie de nos Services') }}
        </h2>
        <div class="text-sm text-green-700 bg-green-100 px-3 py-1 rounded-full font-semibold">
          {{ $services->total() }} {{ __('service(s) trouvé(s)') }}
        </div>
      </div>
    </x-slot>

    <div class="max-w-7xl mx-auto px-4 py-10">

      <!-- Filters Form -->
      <form method="GET" class="mb-6">
        <div class="flex flex-col lg:flex-row justify-between gap-4 items-center">
          <input type="text" name="search" value="{{ request('search') }}"
                 class="input input-bordered w-full lg:w-1/2"
                 placeholder="Rechercher un service...">

          <select name="sort" class="select select-bordered w-full lg:w-1/4">
            <option value="">{{ __('Trier par') }}</option>
            <option value="price_asc" {{ request('sort') == 'price_asc' ? 'selected' : '' }}>Prix croissant</option>
            <option value="price_desc" {{ request('sort') == 'price_desc' ? 'selected' : '' }}>Prix décroissant</option>
            <option value="name_asc" {{ request('sort') == 'name_asc' ? 'selected' : '' }}>Nom A-Z</option>
            <option value="name_desc" {{ request('sort') == 'name_desc' ? 'selected' : '' }}>Nom Z-A</option>
          </select>

          <button type="submit" class="btn btn-success">{{ __('Filtrer') }}</button>
        </div>
      </form>

      <!-- Category Filter Buttons -->
      <div class="flex flex-wrap justify-center gap-3 mb-6">
        <a href="{{ route('services.index') }}"
           class="btn btn-sm {{ !($categoryId ?? null) ? 'btn-success' : 'btn-outline btn-success' }}">
          {{ __('Tous') }}
        </a>
        @foreach($categories as $cat)
          <a href="{{ route('services.index', array_merge(request()->except('page'), ['category' => $cat->id])) }}"
             class="btn btn-sm {{ ($categoryId ?? null) == $cat->id ? 'btn-success' : 'btn-outline btn-success' }}">
            {{ $cat->name }}
            @if(isset($cat->services_count))
              <span class="badge badge-sm ml-1 bg-green-100 text-green-800">{{ $cat->services_count }}</span>
            @endif
          </a>
        @endforeach
      </div>

      <!-- Services Grid -->
      <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
        @forelse($services as $service)
          <div class="card bg-white border border-green-200 shadow-md hover:shadow-lg transition rounded-lg overflow-hidden">
            <figure class="h-48 bg-green-50 flex items-center justify-center">
              @if($service->image)
                <img src="{{ asset('storage/' . $service->image) }}" alt="{{ $service->name }}" class="object-cover w-full h-full">
              @else
                <span class="text-green-400">{{ __('Pas d\'image') }}</span>
              @endif
            </figure>
            <div class="card-body p-4">
              <h3 class="text-lg font-bold text-gray-800 mb-2">{{ $service->name }}</h3>
              <p class="text-sm text-gray-600 mb-2">{{ Str::limit($service->description, 100) }}</p>
              <div class="flex justify-between items-center">
                <span class="text-green-600 font-semibold">{{ $service->price }} DH</span>
                <span class="text-xs bg-green-100 text-green-700 px-2 py-1 rounded">
                  {{ $service->category->name ?? 'Sans catégorie' }}
                </span>
              </div>
            </div>
          </div>
        @empty
          <div class="col-span-full text-center text-green-600">
            {{ __('Aucun service trouvé.') }}
          </div>
        @endforelse
      </div>

      <!-- Pagination -->
      @if($services->hasPages())
        <div class="mt-10 flex justify-center">
          {{ $services->appends(request()->query())->links() }}
        </div>
      @endif
    </div>
  </div>
</x-app-layout>
