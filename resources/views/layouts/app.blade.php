<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-theme="light" class="transition-all duration-300">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{ config('app.name', 'Laravel') }}</title>
        
        <!-- Fonts and Styles -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=inter:300,400,500,600,700,800&display=swap" rel="stylesheet" />
        <script src="https://cdn.tailwindcss.com"></script>
        <link href="https://cdn.jsdelivr.net/npm/daisyui@4.12.10/dist/full.min.css" rel="stylesheet" type="text/css" />
        <script src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" integrity="sha512-Avb2QiuDEEvB4bZJYdft2mNjVShBftLdPG8FJ0V7irTLQ8Uo0qcPxh4Plq7G5tGm0rU+1SPhVotteLpBERIpQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        
        <!-- Vite Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <style>
            body {
                font-family: 'Inter', sans-serif;
                @apply bg-gray-50 text-gray-900;
            }
            .slide-up {
                animation: slideUp 0.6s ease-out forwards;
            }
            @keyframes slideUp {
                from {
                    opacity: 0;
                    transform: translateY(20px);
                }
                to {
                    opacity: 1;
                    transform: translateY(0);
                }
            }
            .fade-in {
                animation: fadeIn 1.2s ease-out forwards;
            }
            @keyframes fadeIn {
                from { opacity: 0; }
                to { opacity: 1; }
            }
            .nav-slide {
                animation: slideDown 0.5s ease-out forwards;
            }
            @keyframes slideDown {
                from {
                    opacity: 0;
                    transform: translateY(-15px);
                }
                to {
                    opacity: 1;
                    transform: translateY(0);
                }
            }
            .glow-effect {
                @apply shadow-lg hover:shadow-xl transition-shadow duration-300;
            }
            html {
                scroll-behavior: smooth;
            }
            .bg-pattern {
                background-image: radial-gradient(circle, rgba(99, 102, 241, 0.1) 1px, transparent 1px);
                background-size: 20px 20px;
            }
        </style>
    </head>
    <body class="antialiased min-h-screen">
        <!-- Navigation -->
        <nav class="fixed top-0 left-0 right-0 z-50 bg-white/90 backdrop-blur-md shadow-sm nav-slide">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                @include('layouts.navigation')
            </div>
        </nav>

        <!-- Main Content -->
        <div class="min-h-screen flex flex-col pt-20 bg-pattern">
            <!-- Header -->
            @isset($header)
                <header class="relative z-10 bg-white/95 backdrop-blur-md shadow-md slide-up">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        <div class="flex items-center space-x-4">
                            <div class="w-12 h-12 bg-indigo-600 rounded-2xl flex items-center justify-center glow-effect">
                                <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M3 4a1 1 0 011-1h12a1 1 0 011 1v2a1 1 0 01-1 1H4a1 1 0 01-1-1V4zM3 10a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H4a1 1 0 01-1-1v-6zM14 9a1 1 0 00-1 1v6a1 1 0 001 1h2a1 1 0 001-1v-6a1 1 0 00-1-1h-2z"/>
                                </svg>
                            </div>
                            <div class="text-2xl font-semibold text-gray-900">
                                {{ $header }}
                            </div>
                        </div>
                    </div>
                </header>
            @endisset

            <!-- Main Content -->
            <main class="flex-1 flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
                <div class="w-full max-w-7xl">
                    <div class="bg-white/80 backdrop-blur-lg rounded-3xl shadow-xl border border-gray-100/50 p-8 sm:p-10 lg:p-12 slide-up glow-effect">
                        <div class="fade-in" style="animation-delay: 0.3s;">
                            {{ $slot }}
                        </div>
                    </div>
                </div>
            </main>

            <!-- New Footer -->
            <footer class="footer footer-center p-10 bg-gradient-to-br from-gray-800 to-gray-900 text-white">
                <div class="fade-in">
                    <div class="flex items-center space-x-3 mb-4">
                        <div class="avatar">
                            <div class="w-12 h-12 rounded-2xl bg-gradient-to-br from-blue-600 to-indigo-700 flex items-center justify-center shadow-lg">
                                <img src="{{ asset('abi_cl.svg') }}" alt="Abisoft" class="h-10 w-auto" />
                            </div>
                        </div>
                        <span class="text-white font-bold text-2xl tracking-tight">Abisoft</span>
                    </div>
                    <p class="text-gray-300 max-w-md">
                        Votre partenaire technologique pour l'innovation et la transformation digitale
                    </p>
                    <div class="flex space-x-4 mb-4">
                        @if($settings->facebook)
                        <a href="{{ $settings->facebook }}" target="_blank" class="text-gray-300 hover:text-white transition-colors">
                            <i class="fab fa-facebook-f text-xl"></i>
                        </a>
                        @endif
                        @if($settings->linkedin)
                        <a href="{{ $settings->linkedin }}" target="_blank" class="text-gray-300 hover:text-white transition-colors">
                            <i class="fab fa-linkedin-in text-xl"></i>
                        </a>
                        @endif
                        @if($settings->instagram)
                        <a href="{{ $settings->instagram }}" target="_blank" class="text-gray-300 hover:text-white transition-colors">
                            <i class="fab fa-instagram text-xl"></i>
                        </a>
                        @endif
                    </div>
                    <p class="text-gray-400 text-sm">
                        © {{ date('Y') }} {{ $settings->site_name ?? 'Abisoft' }}. Tous droits réservés.
                    </p>
                </div>
            </footer>
        </div>
    </body>
</html>