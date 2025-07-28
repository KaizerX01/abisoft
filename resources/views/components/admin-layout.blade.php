<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-theme="light">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>{{ config('app.name', 'Laravel') }} Admin</title>

    <!-- Tailwind CSS & Plugins -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="preconnect" href="https://fonts.bunny.net" />
    <link href="https://fonts.bunny.net/css?family=inter:300,400,500,600,700&display=swap" rel="stylesheet" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
      body {
        font-family: 'Inter', sans-serif;
      }
      html {
        scroll-behavior: smooth;
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
      .active-link {
        background-color: #4b5563;
      }
    </style>
  </head>

  <body class="font-sans antialiased bg-gray-50 text-gray-900">
    <div class="min-h-screen flex flex-col">

      <!-- Top Navigation -->
      <div class="bg-white shadow z-50 sticky top-0">
        @include('layouts.navigation')
      </div>

      <!-- Main Wrapper -->
      <div class="ml-64 flex-1 flex flex-col overflow-y-auto p-16">
        <!-- Sidebar -->
        <aside class="fixed top-16 left-0 w-64 h-[calc(100vh-64px)] bg-gray-800 text-white p-6 overflow-y-auto transition-all duration-300 z-40">
          <h1 class="text-2xl font-bold mb-6 text-center">Panneau d'Administration</h1>
          <nav class="space-y-2">
            <a href="/admin/manage" class="flex items-center gap-3 px-4 py-3 rounded hover:bg-gray-700 transition-all duration-300">
              <i class="fa-solid fa-layer-group w-5"></i> <span>Gérer Tout</span>
            </a>
            <a href="/admin/categories-tags" class="flex items-center gap-3 px-4 py-3 rounded hover:bg-gray-700 transition-all duration-300">
              <i class="fa-solid fa-tags w-5"></i> <span>Catégories</span>
            </a>
            <a href="/admin/users" class="flex items-center gap-3 px-4 py-3 rounded hover:bg-gray-700 transition-all duration-300">
              <i class="fa-solid fa-users w-5"></i> <span>Utilisateurs</span>
            </a>
            <a href="/admin/activity-logs" class="flex items-center gap-3 px-4 py-3 rounded hover:bg-gray-700 transition-all duration-300">
              <i class="fa-solid fa-chart-line w-5"></i> <span>Activité</span>
            </a>
            <a href="/admin/partners" class="flex items-center gap-3 px-4 py-3 rounded hover:bg-gray-700 transition-all duration-300">
              <i class="fa-solid fa-handshake w-5"></i> <span>Partenaires</span>
            </a>
            <a href="/admin/settings" class="flex items-center gap-3 px-4 py-3 rounded hover:bg-gray-700 transition-all duration-300">
              <i class="fa-solid fa-gear w-5"></i> <span>Paramètres du Site</span>
            </a>
          </nav>
        </aside>

        <!-- Main Content -->
        <div class="flex-1 flex flex-col overflow-y-auto">

          @isset($header)
            <header class="bg-white shadow border-b border-gray-200 px-8 py-5 sticky top-0 z-10">
              <div class="flex justify-between items-center">
                <h1 class="text-2xl font-bold text-green-700">{{ $header }}</h1>
                <div class="flex items-center gap-4">
                  <span class="text-gray-600">Admin</span>
                  <div class="w-10 h-10 rounded-full bg-blue-500 text-white flex items-center justify-center font-bold">A</div>
                </div>
              </div>
            </header>
          @endisset

          <main class="px-8 py-10">
            {{ $slot }}
          </main>

          <footer class="text-center py-6">
            <p class="text-gray-500 text-sm">
              &copy; {{ date('Y') }} {{ config('app.name') }} Admin. Tous droits réservés.
            </p>
          </footer>
        </div>
      </div>
    </div>
  </body>
</html>