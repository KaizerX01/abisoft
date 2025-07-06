<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-theme="dark">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{ config('app.name', 'Laravel') }}</title>
        
        <!-- Fonts -->
            <script src="https://cdn.tailwindcss.com"></script>
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=inter:300,400,500,600,700&display=swap" rel="stylesheet" />
        
        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        
        <style>
            body {
                font-family: 'Inter', sans-serif;
            }
            .slide-up {
                animation: slideUp 0.8s ease-out;
            }
            @keyframes slideUp {
                from {
                    opacity: 0;
                    transform: translateY(30px);
                }
                to {
                    opacity: 1;
                    transform: translateY(0);
                }
            }
            .fade-in {
                animation: fadeIn 1s ease-out;
            }
            @keyframes fadeIn {
                from {
                    opacity: 0;
                }
                to {
                    opacity: 1;
                }
            }
            .glow-effect {
                box-shadow: 0 0 20px rgba(99, 102, 241, 0.3);
            }
            .navigation-slide {
                animation: slideDown 0.6s ease-out;
            }
            @keyframes slideDown {
                from {
                    opacity: 0;
                    transform: translateY(-20px);
                }
                to {
                    opacity: 1;
                    transform: translateY(0);
                }
            }
        </style>
    </head>
    <body class="font-sans antialiased bg-white text-gray-900">
        <div class="min-h-screen flex flex-col relative">
            <!-- Subtle background pattern -->
            <div class="absolute inset-0 bg-gradient-to-br from-gray-50 via-white to-indigo-50 opacity-70"></div>
            
            <!-- Navigation with enhanced styling -->
            <div class="relative z-20 navigation-slide">
                @include('layouts.navigation')
            </div>
            
            <!-- Page Heading with enhanced styling and wider container -->
            @isset($header)
                <header class="relative z-10 bg-white/80 backdrop-blur-sm shadow-lg border-b border-gray-200 slide-up">
                    <div class="max-w-full mx-auto py-6 px-6 sm:px-8 lg:px-12">
                        <div class="flex items-center space-x-4">
                            <div class="w-10 h-10 bg-indigo-600 rounded-xl shadow-lg flex items-center justify-center glow-effect">
                                <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M3 4a1 1 0 011-1h12a1 1 0 011 1v2a1 1 0 01-1 1H4a1 1 0 01-1-1V4zM3 10a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H4a1 1 0 01-1-1v-6zM14 9a1 1 0 00-1 1v6a1 1 0 001 1h2a1 1 0 001-1v-6a1 1 0 00-1-1h-2z"/>
                                </svg>
                            </div>
                            <div>
                                {{ $header }}
                            </div>
                        </div>
                    </div>
                </header>
            @endisset
            
            <!-- Page Content with much wider container -->
            <main class="flex-1 flex items-center justify-center px-6 py-8 relative z-10 sm:px-8 lg:px-12">
                <div class="w-full max-w-none">
                    <!-- Content wrapper with glass morphism effect - much wider -->
                    <div class="bg-white/60 backdrop-blur-lg rounded-3xl shadow-2xl border border-gray-200/50 p-8 sm:p-12 lg:p-16 slide-up glow-effect mx-4 sm:mx-8 lg:mx-12">
                        
                        <!-- Main content slot -->
                        <div class="slide-up" style="animation-delay: 0.4s;">
                            {{ $slot }}
                        </div>
                    </div>
                    
                    <!-- Footer -->
                    <div class="mt-8 text-center slide-up mx-4 sm:mx-8 lg:mx-12" style="animation-delay: 0.6s;">
                        <p class="text-gray-500 text-sm">
                            © {{ date('Y') }} {{ config('app.name', 'Laravel') }}. All rights reserved.
                        </p>
                    </div>
                </div>
            </main>
        </div>
    </body>
</html>