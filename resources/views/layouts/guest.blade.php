<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:300,400,500,600,700&display=swap" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/daisyui@4.12.10/dist/full.min.css" rel="stylesheet" type="text/css" />
    <script src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" integrity="sha512-..." crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        body {
            font-family: 'Inter', sans-serif;
            background: linear-gradient(135deg, #0f172a, #1e293b);
            color: #e2e8f0;
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
            box-shadow: 0 0 20px rgba(99, 102, 241, 0.4);
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
        html {
            scroll-behavior: smooth;
        }
        /* Prevent navbar overlap */
        .content-container {
            padding-top: 4.5rem; /* Matches navbar height (h-16 = 4rem) + extra for spacing */
        }
        @media (max-width: 640px) {
            .content-container {
                padding-top: 5rem; /* Extra padding for mobile hamburger menu */
            }
        }
    </style>
</head>
<body class="antialiased">
    <div class="min-h-screen relative">
        <!-- Subtle background pattern -->
        <div class="absolute inset-0 bg-gradient-to-br from-gray-900 via-slate-800 to-indigo-900 opacity-80"></div>

        <!-- Navigation -->
        <div class="relative z-20 navigation-slide">
            @include('layouts.navigation')
        </div>

        <!-- Main content -->
        <div class="relative z-10 min-h-screen flex flex-col justify-center items-center px-4 py-12 content-container pt-20">
            <!-- Form container -->
            <div class="w-full max-w-md slide-up" style="animation-delay: 0.2s;">
                <div class="bg-slate-800/60 backdrop-blur-lg rounded-2xl shadow-2xl border border-slate-700/50 p-8 glow-effect">
                    {{ $slot }}
                </div>
            </div>

            <!-- Footer -->
            <div class="mt-8 text-center slide-up" style="animation-delay: 0.4s;">
                <p class="text-gray-400 text-sm">
                    © {{ date('Y') }} {{ config('app.name', 'Laravel') }}. All rights reserved.
                </p>
            </div>
        </div>
    </div>
</body>
</html>