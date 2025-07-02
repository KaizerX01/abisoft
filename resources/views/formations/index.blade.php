<x-app-layout>
  <div data-theme="light" class="min-h-screen bg-white text-gray-800">
    <x-slot name="header">
      <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
        <h2 class="text-2xl font-bold text-green-700 flex items-center gap-2">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-green-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5zm0 0v6" />
          </svg>
          {{ __('Galerie de nos Formations') }}
        </h2>
        <div class="text-sm text-green-700 bg-green-100 px-3 py-1 rounded-full font-semibold">
          {{ $formations->total() }} {{ __('formation(s) trouvée(s)') }}
        </div>
      </div>
    </x-slot>

    <div class="max-w-7xl mx-auto px-4 py-10">
      <!-- Search & Filter Section -->
      <div class="mb-8 space-y-6">
        <div class="flex flex-col sm:flex-row gap-4">
          <!-- Search -->
          <div class="flex-1">
            <form method="GET" action="{{ route('formations.index') }}" class="relative">
              @if($categoryId ?? null)
                <input type="hidden" name="category" value="{{ $categoryId }}">
              @endif
              <input 
                type="text" 
                name="search" 
                value="{{ request('search') }}"
                placeholder="{{ __('Rechercher une formation...') }}" 
                class="input input-bordered w-full pr-12 border-green-300 focus:border-green-500 focus:ring-2 focus:ring-green-300 focus:outline-none"
              >
              <button type="submit" class="absolute right-3 top-1/2 transform -translate-y-1/2 text-green-400 hover:text-green-700">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                </svg>
              </button>
            </form>
          </div>

          <!-- Sort -->
          <div class="sm:w-48">
            <form method="GET" action="{{ route('formations.index') }}" id="sortForm">
              @if($categoryId ?? null)
                <input type="hidden" name="category" value="{{ $categoryId }}">
              @endif
              @if(request('search'))
                <input type="hidden" name="search" value="{{ request('search') }}">
              @endif
              <select name="sort" class="select select-bordered w-full border-green-300 focus:border-green-500 focus:ring-2 focus:ring-green-300 focus:outline-none" onchange="document.getElementById('sortForm').submit()">
                <option value="">{{ __('Trier par...') }}</option>
                <option value="name_asc" {{ request('sort') == 'name_asc' ? 'selected' : '' }}>{{ __('Nom A-Z') }}</option>
                <option value="name_desc" {{ request('sort') == 'name_desc' ? 'selected' : '' }}>{{ __('Nom Z-A') }}</option>
                <option value="price_asc" {{ request('sort') == 'price_asc' ? 'selected' : '' }}>{{ __('Prix croissant') }}</option>
                <option value="price_desc" {{ request('sort') == 'price_desc' ? 'selected' : '' }}>{{ __('Prix décroissant') }}</option>
                <option value="newest" {{ request('sort') == 'newest' ? 'selected' : '' }}>{{ __('Plus récentes') }}</option>
              </select>
            </form>
          </div>
        </div>

        <!-- Category Filters -->
        <div class="flex flex-wrap justify-center gap-3">
          <a href="{{ route('formations.index', array_filter(['search' => request('search'), 'sort' => request('sort')])) }}"
             class="btn btn-sm {{ !($categoryId ?? null) ? 'btn-success' : 'btn-outline btn-success' }} hover:scale-105 transition">
            {{ __('Toutes') }}
          </a>
          @foreach($categories as $cat)
            <a href="{{ route('formations.index', array_filter(['category' => $cat->id, 'search' => request('search'), 'sort' => request('sort')])) }}"
               class="btn btn-sm {{ ($categoryId ?? null) == $cat->id ? 'btn-success' : 'btn-outline btn-success' }} hover:scale-105 transition">
              {{ $cat->name }}
              @if(isset($cat->formations_count))
                <span class="badge badge-sm ml-1 bg-green-100 text-green-800">{{ $cat->formations_count }}</span>
              @endif
            </a>
          @endforeach
        </div>

        <!-- Clear Filters -->
        @if(request('search') || request('sort') || ($categoryId ?? null))
          <div class="text-center mt-4">
            <a href="{{ route('formations.index') }}" class="btn btn-ghost btn-sm text-green-600 hover:text-green-800 hover:bg-green-100 transition">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
              </svg>
              {{ __('Effacer les filtres') }}
            </a>
          </div>
        @endif
      </div>

      <!-- Formations Grid -->
      <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
        @forelse($formations as $formation)
          <div class="card bg-white border border-green-200 shadow-md hover:shadow-lg transition rounded-lg overflow-hidden">
            <figure class="h-48 bg-green-50 flex items-center justify-center">
              @if($formation->image)
                <img src="{{ asset('storage/' . $formation->image) }}" alt="{{ $formation->title }}" class="object-cover w-full h-full">
              @else
                <span class="text-green-400">{{ __('Pas d\'image') }}</span>
              @endif
            </figure>
            <div class="card-body p-4">
              <h3 class="text-lg font-bold text-gray-800 mb-2">{{ $formation->title }}</h3>
              <p class="text-sm text-gray-600 mb-2">{{ Str::limit($formation->description, 100) }}</p>
              <div class="flex justify-between items-center">
                <span class="text-green-600 font-semibold">{{ $formation->price }} DH</span>
                <span class="text-xs bg-green-100 text-green-700 px-2 py-1 rounded">
                  {{ $formation->category->name ?? 'Sans catégorie' }}
                </span>
              </div>
            </div>
          </div>
        @empty
          <div class="col-span-full text-center text-green-600">
            {{ __('Aucune formation trouvée.') }}
          </div>
        @endforelse
      </div>

      <!-- Pagination -->
      @if($formations->hasPages())
        <div class="mt-10 flex justify-center">
          {{ $formations->appends(request()->query())->links() }}
        </div>
      @endif
    </div>
  </div>
</x-app-layout>
