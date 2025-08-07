<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-theme="light" class="transition-all duration-300">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Error - {{ config('app.name', 'Laravel') }}</title>

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
        @apply bg-gray-100 text-gray-900;
      }
      .slide-up {
        animation: slideUp 0.8s ease-out forwards;
      }
      @keyframes slideUp {
        from { opacity: 0; transform: translateY(40px); }
        to { opacity: 1; transform: translateY(0); }
      }
      .fade-in {
        animation: fadeIn 1.2s ease-out forwards;
      }
      @keyframes fadeIn {
        from { opacity: 0; }
        to { opacity: 1; }
      }
      .glow-effect {
        @apply shadow-2xl hover:shadow-3xl transition-shadow duration-400;
      }
      .bg-pattern {
        background-image: radial-gradient(circle, rgba(99, 102, 241, 0.15) 1px, transparent 1px);
        background-size: 30px 30px;
      }
      html {
        scroll-behavior: smooth;
      }
      .error-svg {
        filter: drop-shadow(0 4px 12px rgba(99, 102, 241, 0.2));
      }
    </style>
  </head>

  <body class="antialiased min-h-screen flex flex-col bg-pattern">
    <!-- Navigation -->
    <nav class="fixed top-0 left-0 right-0 z-50 bg-white/95 backdrop-blur-lg shadow-lg">
      <div class="max-w-8xl mx-auto px-8 sm:px-10 lg:px-12 py-6 flex justify-between items-center">
        <h1 class="text-3xl font-bold text-gray-900">{{ config('app.name', 'Laravel') }}</h1>
        @include('layouts.navigation')
      </div>
    </nav>

    <!-- Main Content -->
    <main class="flex-1 flex items-center justify-center px-8 py-24 max-w-8xl mx-auto pt-24">
      <div class="bg-white/85 backdrop-blur-xl rounded-3xl shadow-2xl border border-gray-100/50 p-16 slide-up glow-effect text-center max-w-5xl w-full">
        <!-- Error Illustration -->
        <div class="mb-8">
          @if($status == 404)
            <svg class="w-32 h-32 mx-auto text-indigo-600 error-svg" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.172 16.172a4 4 0 015.656 0M12 12v4m0 0h.01M3.055 3.055A18.5 18.5 0 0021 21m-2.828-2.828A18.5 18.5 0 013 3"/>
            </svg>
          @elseif($status == 500)
            <svg class="w-32 h-32 mx-auto text-red-600 error-svg" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
            </svg>
          @else
            <svg class="w-32 h-32 mx-auto text-gray-600 error-svg" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
            </svg>
          @endif
        </div>
        <h1 class="text-8xl font-extrabold text-indigo-700 mb-6 tracking-tight">{{ $status ?? 'Error' }}</h1>
        <p class="text-4xl text-gray-700 font-semibold mb-8">
          {{ $message ?? 'Oops, something went wrong!' }}
        </p>
        <p class="text-2xl text-gray-500 mb-12 max-w-2xl mx-auto">
          @if($status == 404)
            The page you're looking for has vanished. Let's guide you back to safety!
          @elseif($status == 500)
            Our servers hit a snag. We're on it, promise!
          @else
            An unexpected hiccup occurred. Please try again soon.
          @endif
        </p>
        <a href="{{ route('home') }}" class="inline-flex items-center px-12 py-6 bg-gradient-to-br from-indigo-600 to-blue-700 text-white font-bold text-2xl rounded-xl hover:bg-indigo-800 transition-all duration-400 glow-effect">
          <i class="fas fa-home mr-3 text-xl"></i> Return to Home
        </a>
      </div>
    </main>

    <!-- Footer -->
    <footer class="footer footer-center p-16 bg-gradient-to-br from-gray-800 to-gray-900 text-white">
      <div class="fade-in">
        <div class="flex items-center space-x-6 mb-8">
          <div class="avatar">
            <div class="w-20 h-20 rounded-2xl bg-gradient-to-br from-blue-600 to-indigo-700 flex items-center justify-center shadow-2xl">
              <img src="{{ asset('abi_cl.svg') }}" alt="Abisoft" class="h-16 w-auto" />
            </div>
          </div>
          <span class="text-white font-bold text-4xl tracking-tight">{{ config('app.site_name', 'Abisoft') }}</span>
        </div>
        <p class="text-gray-300 max-w-xl text-xl">
          Votre partenaire technologique pour l'innovation et la transformation digitale
        </p>
        <div class="flex space-x-8 mb-8">
          @if(config('app.social.facebook'))
          <a href="{{ config('app.social.facebook') }}" target="_blank" class="text-gray-300 hover:text-white transition-colors">
            <i class="fab fa-facebook-f text-3xl"></i>
          </a>
          @endif
          @if(config('app.social.linkedin'))
          <a href="{{ config('app.social.linkedin') }}" target="_blank" class="text-gray-300 hover:text-white transition-colors">
            <i class="fab fa-linkedin-in text-3xl"></i>
          </a>
          @endif
          @if(config('app.social.instagram'))
          <a href="{{ config('app.social.instagram') }}" target="_blank" class="text-gray-300 hover:text-white transition-colors">
            <i class="fab fa-instagram text-3xl"></i>
          </a>
          @endif
        </div>
        <p class="text-gray-400 text-lg">
          © {{ date('Y') }} {{ config('app.site_name', 'Abisoft') }}. Tous droits réservés.
        </p>
      </div>
    </footer>
  </body>
</html>