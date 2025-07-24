<x-app-layout>
    <div class="bg-white overflow-hidden">

        {{-- Hero Section --}}
        <section class="relative min-h-screen flex items-center justify-center bg-gradient-to-br from-indigo-600 via-purple-600 to-pink-500 text-white overflow-hidden">
            {{-- Animated Background Elements --}}
            <div class="absolute inset-0 opacity-20">
                <div class="absolute top-20 left-20 w-32 h-32 bg-white rounded-full animate-pulse"></div>
                <div class="absolute top-40 right-32 w-24 h-24 bg-yellow-300 rounded-full animate-bounce"></div>
                <div class="absolute bottom-32 left-40 w-28 h-28 bg-pink-300 rounded-full animate-ping"></div>
                <div class="absolute bottom-20 right-20 w-20 h-20 bg-blue-300 rounded-full animate-pulse"></div>
            </div>
            
            {{-- Hero Content --}}
            <div class="relative z-10 text-center px-6 max-w-6xl mx-auto">
                <div class="animate-fade-in-up">
                    <h1 class="text-6xl md:text-8xl font-black mb-6 tracking-tight">
                        <span class="bg-gradient-to-r from-white to-yellow-200 bg-clip-text text-transparent">
                            Abisoft
                        </span>
                    </h1>
                    <p class="text-xl md:text-2xl mb-8 font-light max-w-3xl mx-auto leading-relaxed">
                        Transforming businesses through innovative products, expert services, and comprehensive training programs
                    </p>
                    <div class="flex flex-col sm:flex-row gap-4 justify-center items-center">
                        <button class="bg-white text-purple-600 px-8 py-4 rounded-full font-bold text-lg hover:shadow-2xl transform hover:scale-105 transition-all duration-300">
                            Explore Our Solutions
                        </button>
                        <button class="border-2 border-white px-8 py-4 rounded-full font-bold text-lg hover:bg-white hover:text-purple-600 transition-all duration-300">
                            Watch Demo
                        </button>
                    </div>
                </div>
            </div>
            
            {{-- Scroll Indicator --}}
            <div class="absolute bottom-8 left-1/2 transform -translate-x-1/2 animate-bounce">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3"></path>
                </svg>
            </div>
        </section>

        {{-- Stats Section --}}
        <section class="py-20 bg-gray-50">
            <div class="container mx-auto px-6">
                <div class="grid grid-cols-2 md:grid-cols-4 gap-8 text-center">
                    <div class="group hover:transform hover:scale-110 transition-all duration-300">
                        <div class="text-4xl font-black text-indigo-600 mb-2 counter" data-target="500">0</div>
                        <div class="text-gray-600 font-medium">Happy Clients</div>
                    </div>
                    <div class="group hover:transform hover:scale-110 transition-all duration-300">
                        <div class="text-4xl font-black text-purple-600 mb-2 counter" data-target="50">0</div>
                        <div class="text-gray-600 font-medium">Products</div>
                    </div>
                    <div class="group hover:transform hover:scale-110 transition-all duration-300">
                        <div class="text-4xl font-black text-pink-600 mb-2 counter" data-target="100">0</div>
                        <div class="text-gray-600 font-medium">Services</div>
                    </div>
                    <div class="group hover:transform hover:scale-110 transition-all duration-300">
                        <div class="text-4xl font-black text-yellow-600 mb-2 counter" data-target="1000">0</div>
                        <div class="text-gray-600 font-medium">Training Hours</div>
                    </div>
                </div>
            </div>
        </section>

        {{-- Products Section --}}
        <section class="py-24 bg-white">
            <div class="container mx-auto px-6">
                <div class="text-center mb-16">
                    <h2 class="text-5xl font-black mb-4 bg-gradient-to-r from-indigo-600 to-purple-600 bg-clip-text text-transparent">
                        Our Products
                    </h2>
                    <p class="text-xl text-gray-600 max-w-2xl mx-auto">
                        Cutting-edge solutions designed to accelerate your business growth
                    </p>
                </div>
                
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    @foreach($products as $index => $product)
                        <div class="group relative bg-white rounded-3xl shadow-lg hover:shadow-2xl transition-all duration-500 hover:-translate-y-2 overflow-hidden border border-gray-100"
                             style="animation-delay: {{ $index * 100 }}ms">
                            {{-- Gradient Overlay --}}
                            <div class="absolute inset-0 bg-gradient-to-br from-indigo-500/10 to-purple-500/10 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                            
                            {{-- Product Image --}}
                                <div class="relative h-48 overflow-hidden rounded-t-3xl">
                                    <img src="{{ asset('storage/' . $product->image) }}" 
                                         alt="{{ $product->name }}" 
                                         class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                                    <div class="absolute inset-0 bg-gradient-to-t from-black/20 to-transparent"></div>
                                </div>
                          
                            
                            <div class="relative p-8">
                                {{-- Icon --}}
                                <div class="w-16 h-16 bg-gradient-to-br from-indigo-500 to-purple-500 rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform duration-300">
                                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                </div>
                                
                                <h3 class="text-2xl font-bold mb-4 group-hover:text-indigo-600 transition-colors">
                                    {{ $product->name }}
                                </h3>
                                <p class="text-gray-600 leading-relaxed mb-6">
                                    {{ $product->description }}
                                </p>
                                
                                <button class="inline-flex items-center text-indigo-600 font-semibold hover:text-indigo-700 transition-colors group-hover:translate-x-2 transform duration-300">
                                    Learn More
                                    <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                                    </svg>
                                </button>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>

        {{-- Services Section --}}
        <section class="py-24 bg-gradient-to-br from-gray-50 to-indigo-50">
            <div class="container mx-auto px-6">
                <div class="text-center mb-16">
                    <h2 class="text-5xl font-black mb-4 bg-gradient-to-r from-purple-600 to-pink-600 bg-clip-text text-transparent">
                        Our Services
                    </h2>
                    <p class="text-xl text-gray-600 max-w-2xl mx-auto">
                        Professional services tailored to your unique business needs
                    </p>
                </div>
                
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    @foreach($services as $index => $service)
                        <div class="group bg-white rounded-3xl shadow-lg hover:shadow-2xl transition-all duration-500 hover:-translate-y-2 relative overflow-hidden border border-gray-100"
                             style="animation-delay: {{ $index * 100 }}ms">
                            {{-- Hover Effect --}}
                            <div class="absolute inset-0 bg-gradient-to-br from-purple-500/5 to-pink-500/5 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                            
                            {{-- Service Image --}}

                            <div class="relative h-48 overflow-hidden rounded-t-3xl">
                                    <img src="{{ asset('storage/' . $service->image) }}" 
                                         alt="{{ $service->name }}" 
                                         class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                                    <div class="absolute inset-0 bg-gradient-to-t from-black/20 to-transparent"></div>
                                </div>

                                
                            <div class="relative p-8">
                                <div class="w-16 h-16 bg-gradient-to-br from-purple-500 to-pink-500 rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform duration-300">
                                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                                    </svg>
                                </div>
                                
                                <h3 class="text-2xl font-bold mb-4 group-hover:text-purple-600 transition-colors">
                                    {{ $service->name }}
                                </h3>
                                <p class="text-gray-600 leading-relaxed mb-6">
                                    {{ $service->description }}
                                </p>
                                
                                <button class="inline-flex items-center text-purple-600 font-semibold hover:text-purple-700 transition-colors group-hover:translate-x-2 transform duration-300">
                                    Get Started
                                    <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                                    </svg>
                                </button>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>

        {{-- Formations Section --}}
        <section class="py-24 bg-white">
            <div class="container mx-auto px-6">
                <div class="text-center mb-16">
                    <h2 class="text-5xl font-black mb-4 bg-gradient-to-r from-pink-600 to-yellow-600 bg-clip-text text-transparent">
                        Training Programs
                    </h2>
                    <p class="text-xl text-gray-600 max-w-2xl mx-auto">
                        Comprehensive training programs to elevate your team's skills
                    </p>
                </div>
                
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    @foreach($formations as $index => $formation)
                        <div class="group bg-gradient-to-br from-white to-gray-50 rounded-3xl shadow-lg hover:shadow-2xl transition-all duration-500 hover:-translate-y-2 relative overflow-hidden border border-gray-100"
                             style="animation-delay: {{ $index * 100 }}ms">
                            <div class="absolute inset-0 bg-gradient-to-br from-pink-500/5 to-yellow-500/5 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                            
                            {{-- Formation Image --}}

                            <div class="relative h-48 overflow-hidden rounded-t-3xl">
                                    <img src="{{ asset('storage/' . $formation->image) }}" 
                                         alt="{{ $formation->name }}" 
                                         class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                                    <div class="absolute inset-0 bg-gradient-to-t from-black/20 to-transparent"></div>
                                </div>

                                
                            <div class="relative p-8">
                                <div class="w-16 h-16 bg-gradient-to-br from-pink-500 to-yellow-500 rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform duration-300">
                                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                                    </svg>
                                </div>
                                
                                <h3 class="text-2xl font-bold mb-4 group-hover:text-pink-600 transition-colors">
                                    {{ $formation->name }}
                                </h3>
                                <p class="text-gray-600 leading-relaxed mb-6">
                                    {{ $formation->description }}
                                </p>
                                
                                <button class="inline-flex items-center text-pink-600 font-semibold hover:text-pink-700 transition-colors group-hover:translate-x-2 transform duration-300">
                                    Enroll Now
                                    <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                                    </svg>
                                </button>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>

        {{-- CTA Section --}}
        <section class="py-24 bg-gradient-to-br from-indigo-600 via-purple-600 to-pink-600 text-white relative overflow-hidden">
            <div class="absolute inset-0 bg-black opacity-10"></div>
            <div class="relative container mx-auto px-6 text-center">
                <h2 class="text-5xl font-black mb-6">Ready to Transform Your Business?</h2>
                <p class="text-xl mb-8 max-w-3xl mx-auto opacity-90">
                    Join hundreds of satisfied clients who have accelerated their growth with our solutions
                </p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <button class="bg-white text-purple-600 px-10 py-4 rounded-full font-bold text-lg hover:shadow-2xl transform hover:scale-105 transition-all duration-300">
                        Start Your Journey
                    </button>
                    <button class="border-2 border-white px-10 py-4 rounded-full font-bold text-lg hover:bg-white hover:text-purple-600 transition-all duration-300">
                        Schedule Consultation
                    </button>
                </div>
            </div>
        </section>

        {{-- Partners Section --}}
        <section class="py-24 bg-gray-50">
            <div class="container mx-auto px-6">
                <h2 class="text-4xl font-black mb-16 text-center text-gray-800">Trusted By Industry Leaders</h2>
                <div class="flex flex-wrap justify-center items-center gap-12">
                    @foreach($partners as $partner)
                        <div class="group w-32 h-32 bg-white shadow-lg rounded-2xl flex items-center justify-center p-6 hover:shadow-xl transition-all duration-300 hover:scale-110">
                            @if($partner->image)
                                <img src="{{ asset('storage/' . $partner->image) }}" 
                                     alt="{{ $partner->name }}" 
                                     class="w-full h-full object-contain grayscale group-hover:grayscale-0 transition-all duration-300"
                                     onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
                                <div class="hidden w-full h-full flex-col items-center justify-center text-gray-400">
                                    <svg class="w-8 h-8 mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                                    </svg>
                                    <span class="text-xs font-medium">{{ $partner->name }}</span>
                                </div>
                            @else
                                <div class="w-full h-full flex flex-col items-center justify-center text-gray-400">
                                    <svg class="w-8 h-8 mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                                    </svg>
                                    <span class="text-xs font-medium text-center">{{ $partner->name }}</span>
                                </div>
                            @endif
                        </div>
                    @endforeach
                </div>
            </div>
        </section>

        {{-- Contact Section --}}
        <section class="py-24 bg-white">
            <div class="container mx-auto px-6">
                <div class="max-w-4xl mx-auto">
                    <div class="text-center mb-16">
                        <h2 class="text-4xl font-black mb-4 text-gray-800">Get In Touch</h2>
                        <p class="text-xl text-gray-600">Ready to start your journey? We're here to help.</p>
                    </div>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                        <a href="{{ $settings->facebook }}" target="_blank" 
                           class="group bg-blue-50 hover:bg-blue-100 p-8 rounded-2xl text-center transition-all duration-300 hover:scale-105">
                            <div class="w-16 h-16 bg-blue-500 rounded-full flex items-center justify-center mx-auto mb-4 group-hover:scale-110 transition-transform">
                                <svg class="w-8 h-8 text-white" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/>
                                </svg>
                            </div>
                            <h3 class="font-bold text-blue-600 mb-2">Facebook</h3>
                            <p class="text-gray-600 text-sm">Follow us for updates</p>
                        </a>

                        <a href="{{ $settings->linkedin }}" target="_blank" 
                           class="group bg-blue-50 hover:bg-blue-100 p-8 rounded-2xl text-center transition-all duration-300 hover:scale-105">
                            <div class="w-16 h-16 bg-blue-700 rounded-full flex items-center justify-center mx-auto mb-4 group-hover:scale-110 transition-transform">
                                <svg class="w-8 h-8 text-white" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/>
                                </svg>
                            </div>
                            <h3 class="font-bold text-blue-700 mb-2">LinkedIn</h3>
                            <p class="text-gray-600 text-sm">Connect professionally</p>
                        </a>

                        <a href="{{ $settings->instagram }}" target="_blank" 
                           class="group bg-pink-50 hover:bg-pink-100 p-8 rounded-2xl text-center transition-all duration-300 hover:scale-105">
                            <div class="w-16 h-16 bg-gradient-to-br from-pink-500 to-orange-500 rounded-full flex items-center justify-center mx-auto mb-4 group-hover:scale-110 transition-transform">
                                <svg class="w-8 h-8 text-white" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M12.017 0C5.396 0 .029 5.367.029 11.987c0 6.62 5.367 11.987 11.988 11.987 6.62 0 11.987-5.367 11.987-11.987C24.014 5.367 18.637.001 12.017.001zM8.449 16.988c-1.297 0-2.349-1.051-2.349-2.348 0-1.297 1.052-2.349 2.349-2.349 1.297 0 2.348 1.052 2.348 2.349 0 1.297-1.051 2.348-2.348 2.348zm7.718 0c-1.297 0-2.349-1.051-2.349-2.348 0-1.297 1.052-2.349 2.349-2.349 1.297 0 2.348 1.052 2.348 2.349 0 1.297-1.051 2.348-2.348 2.348z"/>
                                </svg>
                            </div>
                            <h3 class="font-bold text-pink-600 mb-2">Instagram</h3>
                            <p class="text-gray-600 text-sm">See our latest work</p>
                        </a>
                    </div>

                    <div class="mt-12 text-center bg-gray-50 p-8 rounded-2xl">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 text-left">
                            <div class="flex items-center">
                                <div class="w-12 h-12 bg-indigo-500 rounded-full flex items-center justify-center mr-4">
                                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                    </svg>
                                </div>
                                <div>
                                    <h4 class="font-bold text-gray-800">Location</h4>
                                    <p class="text-gray-600">{{ $settings->position }}</p>
                                </div>
                            </div>
                            <div class="flex items-center">
                                <div class="w-12 h-12 bg-purple-500 rounded-full flex items-center justify-center mr-4">
                                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                                    </svg>
                                </div>
                                <div>
                                    <h4 class="font-bold text-gray-800">Phone</h4>
                                    <p class="text-gray-600">{{ $settings->phone }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </div>

    {{-- Custom Styles and Scripts --}}
    <style>
        @keyframes fade-in-up {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        .animate-fade-in-up {
            animation: fade-in-up 1s ease-out;
        }
        
        /* Smooth scrolling */
        html {
            scroll-behavior: smooth;
        }
        
        /* Counter animation */
        .counter {
            transition: all 0.3s ease;
        }
    </style>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Counter Animation
            const counters = document.querySelectorAll('.counter');
            const observerOptions = {
                threshold: 0.5,
                rootMargin: '0px 0px -50px 0px'
            };

            const observer = new IntersectionObserver(function(entries) {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        const counter = entry.target;
                        const target = parseInt(counter.getAttribute('data-target'));
                        let current = 0;
                        const increment = target / 50;
                        
                        const updateCounter = () => {
                            if (current < target) {
                                current += increment;
                                counter.textContent = Math.ceil(current);
                                requestAnimationFrame(updateCounter);
                            } else {
                                counter.textContent = target;
                            }
                        };
                        
                        updateCounter();
                        observer.unobserve(counter);
                    }
                });
            }, observerOptions);

            counters.forEach(counter => observer.observe(counter));

            // Smooth scroll for anchor links
            document.querySelectorAll('a[href^="#"]').forEach(anchor => {
                anchor.addEventListener('click', function (e) {
                    e.preventDefault();
                    const target = document.querySelector(this.getAttribute('href'));
                    if (target) {
                        target.scrollIntoView({
                            behavior: 'smooth',
                            block: 'start'
                        });
                    }
                });
            });

            // Add scroll-triggered animations
            const animateOnScroll = document.querySelectorAll('.group');
            const scrollObserver = new IntersectionObserver(function(entries) {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.style.opacity = '1';
                        entry.target.style.transform = 'translateY(0)';
                    }
                });
            }, { threshold: 0.1 });

            animateOnScroll.forEach(el => {
                el.style.opacity = '0';
                el.style.transform = 'translateY(20px)';
                el.style.transition = 'all 0.6s ease';
                scrollObserver.observe(el);
            });
        });
    </script>
</x-app-layout>