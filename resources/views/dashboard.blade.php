<x-app-layout>
   

    <div class="py-6 bg-gray-50 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Welcome Hero Section -->
            <div class="bg-gradient-to-r from-blue-500 to-purple-600 text-white rounded-lg mb-8 shadow-lg">
                <div class="text-center py-12">
                    <div class="max-w-md mx-auto">
                        <h1 class="text-4xl font-bold mb-4">{{ __('Welcome back!') }}</h1>
                        <p class="text-lg mb-6">{{ __('Ready to explore our amazing products, services, and formations?') }}</p>
                        <button class="bg-white text-blue-600 hover:bg-blue-50 font-semibold py-3 px-6 rounded-lg transition duration-200">{{ __('Get Started') }}</button>
                    </div>
                </div>
            </div>

            <!-- Quick Stats Cards -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                <div class="bg-white rounded-lg shadow-md p-6 border-l-4 border-blue-500">
                    <div class="flex items-center justify-between">
                        <div>
                            <div class="text-2xl font-bold text-blue-600">{{$productsCount}}+</div>
                            <div class="text-gray-600">{{ __('Products') }}</div>
                            <div class="text-sm text-gray-500">{{ __('Available now') }}</div>
                        </div>
                        <div class="text-blue-500">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="w-8 h-8 stroke-current">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                            </svg>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-lg shadow-md p-6 border-l-4 border-green-500">
                    <div class="flex items-center justify-between">
                        <div>
                            <div class="text-2xl font-bold text-green-600">{{$servicesCount}}+</div>
                            <div class="text-gray-600">{{ __('Services') }}</div>
                            <div class="text-sm text-gray-500">{{ __('Professional services') }}</div>
                        </div>
                        <div class="text-green-500">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="w-8 h-8 stroke-current">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                            </svg>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-lg shadow-md p-6 border-l-4 border-purple-500">
                    <div class="flex items-center justify-between">
                        <div>
                            <div class="text-2xl font-bold text-purple-600">{{$formationsCount}}+</div>
                            <div class="text-gray-600">{{ __('Formations') }}</div>
                            <div class="text-sm text-gray-500">{{ __('Training courses') }}</div>
                        </div>
                        <div class="text-purple-500">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="w-8 h-8 stroke-current">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 100 4m0-4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 100 4m0-4v2m0-6V4"></path>
                            </svg>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-lg shadow-md p-6 border-l-4 border-orange-500">
                    <div class="flex items-center justify-between">
                        <div>
                            <div class="text-2xl font-bold text-orange-600">{{$blogPostsCount}}+</div>
                            <div class="text-gray-600">{{ __('Blog Posts') }}</div>
                            <div class="text-sm text-gray-500">{{ __('Published articles') }}</div>
                        </div>
                        <div class="text-orange-500">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="w-8 h-8 stroke-current">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Main Content Grid -->
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                <!-- Left Column - Products & Services -->
                <div class="lg:col-span-2 space-y-8">
                    <!-- Featured Products -->
<div class="bg-white rounded-lg shadow-lg p-6">
    <h2 class="text-2xl font-bold text-gray-800 mb-4 flex items-center">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-2 text-blue-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
        </svg>
        {{ __('Featured Products') }}
    </h2>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        @foreach ($featuredProducts as $product)
            <div class="bg-gray-50 border border-gray-200 rounded-lg p-4 hover:shadow-md transition-shadow">
                <figure class="mb-4">
                    <img src="{{ $product->image_url ?? 'https://via.placeholder.com/300x200' }}" alt="{{ $product->name }}" class="rounded-lg w-full" />
                </figure>
                <h3 class="text-lg font-semibold text-gray-800">{{ $product->name }}</h3>
                <p class="text-sm text-gray-600 mb-3">{{ $product->description }}</p>
                <div class="flex justify-between items-center">
                    <span class="bg-blue-100 text-blue-800 text-sm font-medium px-2.5 py-0.5 rounded">${{ $product->price }}</span>
                    <a href="{{ route('products.index', $product) }}" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded text-sm">{{ __('View') }}</a>
                </div>
            </div>
        @endforeach
    </div>
    <div class="mt-6 text-right">
        <a href="{{ route('products.index') }}" class="border border-blue-500 text-blue-500 hover:bg-blue-50 px-4 py-2 rounded">{{ __('View All Products') }}</a>
    </div>
</div>


                    <!-- Services Section -->
                    <div class="bg-white rounded-lg shadow-lg p-6">
                        <h2 class="text-2xl font-bold text-gray-800 mb-4 flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-2 text-green-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2-2v2m8 0V6a2 2 0 012 2v6M8 6V4a2 2 0 012-2h4a2 2 0 012 2v2M8 6a2 2 0 00-2 2v6" />
                            </svg>
                            {{ __('Our Services') }}
                        </h2>
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                            <div class="text-center p-4 bg-gray-50 rounded-lg hover:bg-gray-100 transition-colors">
                                <div class="text-blue-500 text-3xl mb-2">🎯</div>
                                <h3 class="font-semibold text-gray-800">{{ __('Consulting') }}</h3>
                                <p class="text-sm text-gray-600">{{ __('Expert advice') }}</p>
                            </div>
                            <div class="text-center p-4 bg-gray-50 rounded-lg hover:bg-gray-100 transition-colors">
                                <div class="text-green-500 text-3xl mb-2">⚡</div>
                                <h3 class="font-semibold text-gray-800">{{ __('Development') }}</h3>
                                <p class="text-sm text-gray-600">{{ __('Custom solutions') }}</p>
                            </div>
                            <div class="text-center p-4 bg-gray-50 rounded-lg hover:bg-gray-100 transition-colors">
                                <div class="text-purple-500 text-3xl mb-2">🛠️</div>
                                <h3 class="font-semibold text-gray-800">{{ __('Support') }}</h3>
                                <p class="text-sm text-gray-600">{{ __('24/7 assistance') }}</p>
                            </div>
                        </div>
                        <div class="mt-6 text-right">
                            <a href="{{ route('services.index') }}">
                                <button class="border border-green-500 text-green-500 hover:bg-green-50 px-4 py-2 rounded">
                                    {{ __('Explore Services') }}
                                </button>
                            </a>
                        </div>
                    </div>

                    <!-- Formations Section -->
<div class="bg-white rounded-lg shadow-lg p-6">
    <h2 class="text-2xl font-bold text-gray-800 mb-4 flex items-center">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-2 text-purple-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
        </svg>
        {{ __('Training & Formations') }}
    </h2>
    <div class="space-y-3">
        @foreach ($formations as $formation)
            <div class="flex items-center justify-between p-3 bg-gray-50 rounded-lg">
                <div class="flex items-center space-x-3">
                    <div class="bg-purple-100 text-purple-800 text-xs font-medium px-2.5 py-0.5 rounded">
                        {{ $loop->first ? __('New') : ($loop->iteration == 2 ? __('Popular') : __('Limited')) }}
                    </div>
                    <div>
                        <h3 class="font-semibold text-gray-800">{{ $formation->name }}</h3>
                        <p class="text-sm text-gray-600">{{ $formation->description }}</p>
                    </div>
                </div>
                <a href="{{ route('formations.index', $formation) }}" class="bg-purple-500 hover:bg-purple-600 text-white px-3 py-1 rounded text-sm">{{ __('Enroll') }}</a>
            </div>
        @endforeach
    </div>
    <div class="mt-6 text-right">
        <a href="{{ route('formations.index') }}" class="border border-purple-500 text-purple-500 hover:bg-purple-50 px-4 py-2 rounded">{{ __('View All Formations') }}</a>
    </div>
</div>
                </div>

                <!-- Right Column - Blog & Profile -->
                <div class="space-y-8">
                                        <!-- Profile -->
                    <div class="bg-white rounded-lg shadow-lg p-6">
                        <h2 class="text-xl font-bold text-gray-800 mb-4 flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-2 text-indigo-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                            </svg>
                            {{ __('Profile') }}
                        </h2>

                        <div class="flex items-center space-x-4 mb-4">
                            <div class="w-16 h-16 rounded-full ring-2 ring-indigo-500 ring-offset-2 overflow-hidden">
                                <img src="{{ Auth::user()->profile_picture_url ?? 'https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_1280.png' }}" alt="Profile" class="w-full h-full object-cover" />
                            </div>
                            <div>
                                <h3 class="font-semibold text-lg text-gray-800">{{ Auth::user()->name }}</h3>
                                <p class="text-sm text-gray-600">
                                    {{ __('Member since') }} {{ Auth::user()->created_at->format('F Y') }}
                                </p>
                                <div class="flex space-x-1 mt-1">
                                    @if(Auth::user()->is_premium)
                                        <span class="bg-indigo-100 text-indigo-800 text-xs font-medium px-2.5 py-0.5 rounded">{{ __('Premium') }}</span>
                                    @endif
                                    @if(Auth::user()->email_verified_at)
                                        <span class="bg-green-100 text-green-800 text-xs font-medium px-2.5 py-0.5 rounded">{{ __('Verified') }}</span>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="space-y-2">
                            <a href="{{ route('profile.edit') }}" class="block w-full text-center border border-indigo-500 text-indigo-500 hover:bg-indigo-50 py-2 px-4 rounded">
                                {{ __('Edit Profile') }}
                            </a>
                            <a href="" class="block w-full text-center text-gray-600 hover:bg-gray-50 py-2 px-4 rounded">
                                {{ __('Account Settings') }}
                            </a>
                        </div>
                    </div>


                                        <!-- Recent Blog Posts -->
                    <div class="bg-white rounded-lg shadow-lg p-6">
                        <h2 class="text-xl font-bold text-gray-800 mb-4 flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-2 text-orange-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z" />
                            </svg>
                            {{ __('Latest Blog Posts') }}
                        </h2>

                        <div class="space-y-3">
                            @forelse ($blogs as $blog)
                                <div class="border-l-4 pl-4 {{ $loop->iteration == 1 ? 'border-orange-500' : ($loop->iteration == 2 ? 'border-blue-500' : 'border-green-500') }}">
                                    <h3 class="font-semibold text-sm text-gray-800">
                                        {{ $blog->title }}
                                    </h3>
                                    <p class="text-xs text-gray-600">
                                        {{ $blog->created_at->diffForHumans() }}
                                    </p>
                                </div>
                            @empty
                                <div class="text-gray-500 text-sm">{{ __('No blog posts available.') }}</div>
                            @endforelse
                        </div>

                        <div class="mt-6 text-right">
                            <a href="{{ route('blog.index') }}" class="border border-orange-500 text-orange-500 hover:bg-orange-50 px-4 py-2 rounded text-sm">
                                {{ __('Read More') }}
                            </a>
                        </div>
                    </div>


                    <!-- Quick Actions -->
                    <div class="bg-white rounded-lg shadow-lg p-6">
                        <h2 class="text-xl font-bold text-gray-800 mb-4 flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-2 text-pink-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                            </svg>
                            {{ __('Quick Actions') }}
                        </h2>
                        <div class="grid grid-cols-2 gap-2">
                            <button class="bg-blue-500 hover:bg-blue-600 text-white py-2 px-3 rounded text-sm">{{ __('New Order') }}</button>
                            <button class="bg-green-500 hover:bg-green-600 text-white py-2 px-3 rounded text-sm">{{ __('Support') }}</button>
                            <button class="bg-purple-500 hover:bg-purple-600 text-white py-2 px-3 rounded text-sm">{{ __('Downloads') }}</button>
                            <button class="bg-pink-500 hover:bg-pink-600 text-white py-2 px-3 rounded text-sm">{{ __('Feedback') }}</button>
                        </div>
                    </div>

                    <!-- Activity Feed -->
                    <div class="bg-white rounded-lg shadow-lg p-6">
                        <h2 class="text-xl font-bold text-gray-800 mb-4 flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-2 text-teal-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-5 5v-5zM4 5h5v5H4V5zm6 0h5v5h-5V5zM4 11h5v5H4v-5zm6 0h5v5h-5v-5z" />
                            </svg>
                            {{ __('Recent Activity') }}
                        </h2>
                        <div class="space-y-3">
                            <div class="flex items-center space-x-3">
                                <div class="w-2 h-2 bg-green-500 rounded-full"></div>
                                <div class="text-sm">
                                    <span class="font-semibold text-gray-800">{{ __('Course completed') }}</span>
                                    <p class="text-xs text-gray-600">{{ __('Web Development Basics') }}</p>
                                </div>
                            </div>
                            <div class="flex items-center space-x-3">
                                <div class="w-2 h-2 bg-blue-500 rounded-full"></div>
                                <div class="text-sm">
                                    <span class="font-semibold text-gray-800">{{ __('New product purchased') }}</span>
                                    <p class="text-xs text-gray-600">{{ __('Premium Plugin') }}</p>
                                </div>
                            </div>
                            <div class="flex items-center space-x-3">
                                <div class="w-2 h-2 bg-orange-500 rounded-full"></div>
                                <div class="text-sm">
                                    <span class="font-semibold text-gray-800">{{ __('Profile updated') }}</span>
                                    <p class="text-xs text-gray-600">{{ __('Contact information') }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>