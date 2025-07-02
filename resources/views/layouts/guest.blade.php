<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-theme="light">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{ config('app.name', 'Laravel') }}</title>
        
        <!-- Fonts -->
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
        </style>
    </head>
    <body class="antialiased">
        <!-- Clean white background -->
        <div class="min-h-screen bg-gray-50 relative">
            
            <!-- Main content -->
            <div class="relative z-10 min-h-screen flex flex-col justify-center items-center px-4 py-12">
                <!-- Logo section -->
                <div class="slide-up mb-8">
                    <div class="flex flex-col items-center space-y-4">
                        <div class="w-20 h-20 bg-indigo-600 rounded-2xl shadow-lg flex items-center justify-center">
                            <svg class="w-12 h-12 text-white" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M3 4a1 1 0 011-1h12a1 1 0 011 1v2a1 1 0 01-1 1H4a1 1 0 01-1-1V4zM3 10a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H4a1 1 0 01-1-1v-6zM14 9a1 1 0 00-1 1v6a1 1 0 001 1h2a1 1 0 001-1v-6a1 1 0 00-1-1h-2z"/>
                            </svg>
                        </div>
                        <div class="text-center">
                            <h1 class="text-2xl font-bold text-gray-800">{{ config('app.name', 'Laravel') }}</h1>
                            <p class="text-gray-600 text-sm mt-1">Welcome to your platform</p>
                        </div>
                    </div>
                </div>
                
                <!-- Form container -->
                <div class="w-full max-w-md slide-up" style="animation-delay: 0.2s;">
                    <div class="bg-white rounded-2xl shadow-xl border border-gray-200 p-8">
                        {{ $slot }}
                    </div>
                </div>
                
                <!-- Footer -->
                <div class="mt-8 text-center slide-up" style="animation-delay: 0.4s;">
                    <p class="text-gray-500 text-sm">
                        © {{ date('Y') }} {{ config('app.name', 'Laravel') }}. All rights reserved.
                    </p>
                </div>
            </div>
        </div>
    </body>
</html>