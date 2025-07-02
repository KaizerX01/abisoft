<x-app-layout>
    <!-- Hero Section -->
    <div class="bg-gradient-to-r from-gray-900 via-gray-800 to-gray-900 text-white py-20">
        <div class="max-w-7xl mx-auto px-4 text-center">
            <h1 class="text-6xl font-bold mb-4 tracking-wide">HOT OFF THE PRESS</h1>
            <div class="w-24 h-1 bg-cyan-400 mx-auto mb-6"></div>
            <p class="text-lg text-gray-300 max-w-2xl mx-auto leading-relaxed">
                Of an or game gate west face shed. No great but music too old found arose.
            </p>
        </div>
    </div>

    <!-- Main Content -->
    <div class="bg-gray-50 min-h-screen py-16">
        <div class="max-w-7xl mx-auto px-4">
            <div class="grid grid-cols-1 lg:grid-cols-4 gap-12">
                
                <!-- Blog Posts Section -->
                <div class="lg:col-span-3">
                    <div class="space-y-12">
                        @foreach ($posts as $post)
                            <article class="bg-white rounded-2xl shadow-lg overflow-hidden hover:shadow-2xl transition-all duration-500 hover:-translate-y-2">
                                @if ($post->image)
                                    <div class="relative overflow-hidden">
                                        <img src="{{ asset('storage/' . $post->image) }}"
                                             alt="Blog image"
                                             class="w-full h-80 object-cover hover:scale-105 transition-transform duration-500">
                                        <div class="absolute inset-0 bg-gradient-to-t from-black/20 to-transparent"></div>
                                    </div>
                                @else
                                    <div class="w-full h-80 bg-gradient-to-br from-gray-200 to-gray-300 flex items-center justify-center">
                                        <div class="text-center">
                                            <svg class="w-16 h-16 text-gray-400 mx-auto mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                            </svg>
                                            <span class="text-gray-500 text-sm">No image</span>
                                        </div>
                                    </div>
                                @endif
                                
                                <div class="p-8">
                                    <!-- Post Meta -->
                                    <div class="flex items-center space-x-4 text-sm text-gray-500 mb-4">
                                        <span class="flex items-center">
                                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                            </svg>
                                            DANNY JONES
                                        </span>
                                        <span class="flex items-center">
                                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path>
                                            </svg>
                                            STYLE
                                        </span>
                                        <span class="flex items-center">
                                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path>
                                            </svg>
                                            14 COMMENTS
                                        </span>
                                    </div>

                                    <!-- Post Title -->
                                    <h2 class="text-3xl font-bold text-gray-900 mb-4 hover:text-cyan-600 transition-colors duration-300">
                                        {{ $post->title ?? 'CIVILITY VICINITY GRACEFUL IS IT AT.' }}
                                    </h2>

                                    <!-- Post Excerpt -->
                                    <p class="text-gray-600 leading-relaxed mb-6 text-lg">
                                        {{ $post->excerpt ?? 'Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a sit amet mauris.' }}
                                    </p>

                                    <!-- Read More Button -->
                                    <div class="pt-4">
                                        <a href="#" class="inline-flex items-center px-6 py-3 border-2 border-cyan-500 text-cyan-500 font-semibold hover:bg-cyan-500 hover:text-white transition-all duration-300 rounded-lg group">
                                            READ MORE
                                            <svg class="w-4 h-4 ml-2 group-hover:translate-x-1 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                            </svg>
                                        </a>
                                    </div>
                                </div>
                            </article>
                        @endforeach
                    </div>

                    <!-- Pagination -->
                    <div class="mt-16 flex justify-center">
                        <div class="bg-white rounded-lg shadow-lg p-4">
                            {{ $posts->links() }}
                        </div>
                    </div>
                </div>

                <!-- Sidebar -->
                <div class="lg:col-span-1">
                    <div class="sticky top-8 space-y-8">
                        
                        <!-- Search Box -->
                        <div class="bg-white rounded-2xl shadow-lg p-6">
                            <div class="relative">
                                <input type="text" 
                                       placeholder="Search..." 
                                       class="w-full pl-4 pr-12 py-3 border border-gray-200 rounded-lg focus:ring-2 focus:ring-cyan-500 focus:border-transparent outline-none transition-all duration-300">
                                <button class="absolute right-3 top-1/2 transform -translate-y-1/2 text-cyan-500 hover:text-cyan-700 transition-colors duration-300">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                    </svg>
                                </button>
                            </div>
                        </div>

                        <!-- Blog Categories -->
                        <div class="bg-white rounded-2xl shadow-lg p-6">
                            <h3 class="text-xl font-bold text-gray-900 mb-6 pb-3 border-b border-gray-200">BLOG CATEGORIES</h3>
                            <div class="space-y-3">
                                <a href="#" class="flex items-center justify-between text-gray-600 hover:text-cyan-600 transition-colors duration-300 py-2">
                                    <span>Fashion</span>
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                    </svg>
                                </a>
                                <a href="#" class="flex items-center justify-between text-gray-600 hover:text-cyan-600 transition-colors duration-300 py-2">
                                    <span>Design</span>
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                    </svg>
                                </a>
                                <a href="#" class="flex items-center justify-between text-gray-600 hover:text-cyan-600 transition-colors duration-300 py-2">
                                    <span>Music</span>
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                    </svg>
                                </a>
                                <a href="#" class="flex items-center justify-between text-gray-600 hover:text-cyan-600 transition-colors duration-300 py-2">
                                    <span>Reviews</span>
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                    </svg>
                                </a>
                                <a href="#" class="flex items-center justify-between text-gray-600 hover:text-cyan-600 transition-colors duration-300 py-2">
                                    <span>News</span>
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                    </svg>
                                </a>
                                <a href="#" class="flex items-center justify-between text-gray-600 hover:text-cyan-600 transition-colors duration-300 py-2">
                                    <span>Nature</span>
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                    </svg>
                                </a>
                                <a href="#" class="flex items-center justify-between text-gray-600 hover:text-cyan-600 transition-colors duration-300 py-2">
                                    <span>Travel</span>
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                    </svg>
                                </a>
                                <a href="#" class="flex items-center justify-between text-gray-600 hover:text-cyan-600 transition-colors duration-300 py-2">
                                    <span>Web Design</span>
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                    </svg>
                                </a>
                            </div>
                        </div>

                        <!-- Post Tags -->
                        <div class="bg-white rounded-2xl shadow-lg p-6">
                            <h3 class="text-xl font-bold text-gray-900 mb-6 pb-3 border-b border-gray-200">POST TAGS</h3>
                            <div class="flex flex-wrap gap-2">
                                <span class="px-4 py-2 bg-gray-100 text-gray-700 rounded-full text-sm hover:bg-cyan-500 hover:text-white transition-all duration-300 cursor-pointer">Design</span>
                                <span class="px-4 py-2 bg-gray-100 text-gray-700 rounded-full text-sm hover:bg-cyan-500 hover:text-white transition-all duration-300 cursor-pointer">Web</span>
                                <span class="px-4 py-2 bg-gray-100 text-gray-700 rounded-full text-sm hover:bg-cyan-500 hover:text-white transition-all duration-300 cursor-pointer">Creative</span>
                                <span class="px-4 py-2 bg-gray-100 text-gray-700 rounded-full text-sm hover:bg-cyan-500 hover:text-white transition-all duration-300 cursor-pointer">Modern</span>
                                <span class="px-4 py-2 bg-gray-100 text-gray-700 rounded-full text-sm hover:bg-cyan-500 hover:text-white transition-all duration-300 cursor-pointer">Blog</span>
                                <span class="px-4 py-2 bg-gray-100 text-gray-700 rounded-full text-sm hover:bg-cyan-500 hover:text-white transition-all duration-300 cursor-pointer">Article</span>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>