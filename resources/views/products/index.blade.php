<x-app-layout>
  <div data-theme="light" class="min-h-screen bg-white text-gray-800">
    <x-slot name="header">
      <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
        <h2 class="text-2xl font-bold text-green-700 flex items-center gap-2">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-green-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
          </svg>
          {{ __('Galerie de nos Produits') }}
        </h2>
        <div class="text-sm text-green-700 bg-green-100 px-3 py-1 rounded-full font-semibold">
          {{ $products->total() }} {{ __('produit(s) trouvé(s)') }}
        </div>
      </div>
    </x-slot>

    <div class="max-w-7xl mx-auto px-4 py-10">
      <!-- Search and Filter Section -->
      <div class="mb-8 space-y-6">
        <!-- Search Bar -->
        <div class="flex flex-col sm:flex-row gap-4">
          <div class="flex-1">
            <form method="GET" action="{{ route('products.index') }}" class="relative">
              @if($categoryId ?? null)
                <input type="hidden" name="category" value="{{ $categoryId }}">
              @endif
              <input 
                type="text" 
                name="search" 
                value="{{ request('search') }}"
                placeholder="{{ __('Rechercher un produit...') }}" 
                class="input input-bordered w-full pr-12 border-green-300 focus:border-green-500 focus:ring-2 focus:ring-green-300 focus:outline-none"
              >
              <button type="submit" class="absolute right-3 top-1/2 transform -translate-y-1/2 text-green-400 hover:text-green-700 transition-colors">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                </svg>
              </button>
            </form>
          </div>

          <!-- Sort Dropdown -->
          <div class="sm:w-48">
            <form method="GET" action="{{ route('products.index') }}" id="sortForm">
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
                <option value="newest" {{ request('sort') == 'newest' ? 'selected' : '' }}>{{ __('Plus récents') }}</option>
              </select>
            </form>
          </div>
        </div>

        <!-- Category Filter Buttons -->
        <div class="flex flex-wrap justify-center gap-3">
          <a href="{{ route('products.index', array_filter(['search' => request('search'), 'sort' => request('sort')])) }}"
             class="btn btn-sm {{ !($categoryId ?? null) ? 'btn-success' : 'btn-outline btn-success' }} hover:scale-105 transition-transform duration-200">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
            </svg>
            {{ __('Tous') }}
          </a>
          @foreach($categories as $cat)
            <a href="{{ route('products.index', array_filter(['category' => $cat->id, 'search' => request('search'), 'sort' => request('sort')])) }}"
               class="btn btn-sm {{ ($categoryId ?? null) == $cat->id ? 'btn-success' : 'btn-outline btn-success' }} hover:scale-105 transition-transform duration-200">
              {{ $cat->name }}
              @if(isset($cat->products_count))
                <span class="badge badge-sm ml-1 bg-green-100 text-green-800 border-green-300">{{ $cat->products_count }}</span>
              @endif
            </a>
          @endforeach
        </div>

        <!-- Clear Filters -->
        @if(request('search') || request('sort') || ($categoryId ?? null))
          <div class="text-center mt-4">
            <a href="{{ route('products.index') }}" class="btn btn-ghost btn-sm text-green-600 hover:text-green-800 hover:bg-green-100 transition-colors">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
              </svg>
              {{ __('Effacer les filtres') }}
            </a>
          </div>
        @endif
      </div>

      <!-- Product Cards -->
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 p-6">
    @forelse($products as $product)
        <div class="group bg-white rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2 overflow-hidden border border-gray-100">
            
            <!-- Image Container -->
            <div class="relative h-48 overflow-hidden bg-gradient-to-br from-gray-50 to-gray-100">
                @if($product->image)
                    <img
                        src="{{ asset('storage/' . $product->image) }}"
                        alt="{{ $product->title }}"
                        class="w-full h-full object-cover transition-all duration-500 group-hover:scale-110"
                        loading="lazy"
                    />
                @else
                    <div class="w-full h-full flex items-center justify-center bg-gradient-to-br from-gray-100 to-gray-200">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                    </div>
                @endif
                
                <!-- Overlay -->
                <div class="absolute inset-0 bg-black bg-opacity-0 group-hover:bg-opacity-10 transition-all duration-300"></div>
                
                <!-- Price Badge -->
                <div class="absolute top-4 right-4 bg-gradient-to-r from-emerald-500 to-teal-600 text-white text-sm font-bold rounded-full px-4 py-2 shadow-lg backdrop-blur-sm">
                    {{ number_format($product->price, 2) }} DH
                </div>
                
                <!-- Category Badge -->
                <div class="absolute top-4 left-4 bg-white/90 backdrop-blur-sm text-emerald-700 text-xs font-semibold border border-emerald-200 rounded-full px-3 py-1.5 shadow-md">
                    {{ $product->category->name ?? 'Sans catégorie' }}
                </div>
            </div>
            
            <!-- Content -->
            <div class="p-6 space-y-4">
                <!-- Title -->
                <h3 class="text-xl font-bold text-gray-900 leading-tight group-hover:text-emerald-600 transition-colors duration-300">
                    {{ $product->name }}
                </h3>
                
                <!-- Description -->
                @if($product->description)
                    <p class="text-gray-600 text-sm leading-relaxed line-clamp-3">
                        {{ Str::limit($product->description, 120) }}
                    </p>
                @endif
                
                <!-- Action Button -->
                <div class="pt-4">
                    <a href="#" class="inline-flex items-center justify-center w-full bg-gradient-to-r from-emerald-500 to-teal-600 hover:from-emerald-600 hover:to-teal-700 text-white font-semibold py-3 px-6 rounded-xl transition-all duration-300 transform hover:scale-105 shadow-md hover:shadow-lg">
                        <span>Voir les détails</span>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-2 transition-transform group-hover:translate-x-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                        </svg>
                    </a>
                </div>
                
                <!-- Footer -->
                <div class="flex justify-between items-center text-xs text-gray-400 pt-2 border-t border-gray-100">
                    <span class="flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        {{ $product->created_at->diffForHumans() }}
                    </span>
                    <div class="flex items-center text-yellow-500">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/>
                        </svg>
                        <span class="ml-1 text-gray-500">4.5</span>
                    </div>
                </div>
            </div>
        </div>
    @empty
        <div class="col-span-full">
            <div class="text-center py-20 bg-gradient-to-br from-gray-50 to-gray-100 rounded-2xl border-2 border-dashed border-gray-300">
                <div class="mx-auto w-24 h-24 bg-gray-200 rounded-full flex items-center justify-center mb-6">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
                    </svg>
                </div>
                <h3 class="text-2xl font-bold text-gray-700 mb-3">
                    {{ __('Aucun produit trouvé') }}
                </h3>
                <p class="text-gray-500 mb-8 max-w-md mx-auto">
                    {{ __('Nous n\'avons trouvé aucun produit correspondant à vos critères. Essayez de modifier votre recherche.') }}
                </p>
                @if(request('search') || request('sort') || ($categoryId ?? null))
                    <a href="{{ route('products.index') }}" class="inline-flex items-center bg-gradient-to-r from-emerald-500 to-teal-600 hover:from-emerald-600 hover:to-teal-700 text-white font-semibold py-3 px-8 rounded-xl transition-all duration-300 shadow-lg hover:shadow-xl transform hover:scale-105">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                        </svg>
                        {{ __('Réinitialiser les filtres') }}
                    </a>
                @endif
            </div>
        </div>
    @endforelse
</div>


      <!-- Pagination -->
      @if(method_exists($products, 'hasPages') && $products->hasPages())
        <div class="mt-12 flex justify-center">
          <div class="join">
            {{ $products->appends(request()->query())->links() }}
          </div>
        </div>
      @endif
    </div>

    <!-- Loading Toast -->
    <div id="loading-toast" class="toast toast-top toast-center hidden">
      <div class="alert alert-info bg-green-100 text-green-700">
        <span class="loading loading-spinner loading-sm"></span>
        <span>{{ __('Chargement...') }}</span>
      </div>
    </div>

    @push('scripts')
    <script>
      document.addEventListener('DOMContentLoaded', function() {
        const forms = document.querySelectorAll('form');
        const loadingToast = document.getElementById('loading-toast');
        
        forms.forEach(form => {
          form.addEventListener('submit', function() {
            loadingToast.classList.remove('hidden');
            setTimeout(() => {
              loadingToast.classList.add('hidden');
            }, 3000);
          });
        });

        const alerts = document.querySelectorAll('.alert');
        alerts.forEach(alert => {
          setTimeout(() => {
            alert.style.transition = 'opacity 0.5s';
            alert.style.opacity = '0';
            setTimeout(() => alert.remove(), 500);
          }, 5000);
        });
      });
    </script>
    @endpush

    @push('styles')
    <style>
      .line-clamp-2 {
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
      }
      .line-clamp-3 {
        display: -webkit-box;
        -webkit-line-clamp: 3;
        -webkit-box-orient: vertical;
        overflow: hidden;
      }
    </style>
    @endpush
  </div>
</x-app-layout>
