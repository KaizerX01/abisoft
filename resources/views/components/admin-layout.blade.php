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
    <link href="https://fonts.bunny.net/css?family=inter:300,400,500,600,700,800&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
      :root {
        --primary: #6366f1;
        --primary-dark: #4f46e5;
        --secondary: #0f172a;
        --success: #10b981;
        --surface: #ffffff;
        --surface-alt: #f8fafc;
        --text: #0f172a;
        --text-muted: #64748b;
        --shadow: rgba(15, 23, 42, 0.08);
        --gradient-primary: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
      }

      body {
        font-family: 'Inter', sans-serif;
        background: linear-gradient(135deg, #667eea 10%, #764ba2 90%);
        min-height: 100vh;
      }

      html {
        scroll-behavior: smooth;
      }

      /* Custom scrollbar */
      ::-webkit-scrollbar {
        width: 8px;
      }

      ::-webkit-scrollbar-track {
        background: var(--surface-alt);
      }

      ::-webkit-scrollbar-thumb {
        background: var(--primary);
        border-radius: 4px;
      }

      /* Animations */
      .slide-up {
        animation: slideUp 0.8s cubic-bezier(0.4, 0, 0.2, 1);
      }

      @keyframes slideUp {
        from { opacity: 0; transform: translateY(40px); }
        to { opacity: 1; transform: translateY(0); }
      }

      .fade-in {
        animation: fadeIn 1s ease-out;
      }

      @keyframes fadeIn {
        from { opacity: 0; }
        to { opacity: 1; }
      }

      .slide-in-left {
        animation: slideInLeft 0.6s ease-out;
      }

      @keyframes slideInLeft {
        from { opacity: 0; transform: translateX(-40px); }
        to { opacity: 1; transform: translateX(0); }
      }

      /* Glassmorphism effects */
      .glass {
        background: rgba(255, 255, 255, 0.95);
        backdrop-filter: blur(20px);
      }

      .glass-dark {
        background: rgba(15, 23, 42, 0.9);
        backdrop-filter: blur(20px);
      }

      /* Sidebar */
      .sidebar {
        background: linear-gradient(180deg, #1e293b 0%, #0f172a 100%);
        box-shadow: 4px 0 20px rgba(0, 0, 0, 0.15);
      }

      .sidebar-title {
        background: var(--gradient-primary);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
      }

      /* Navigation links */
      .nav-link {
        position: relative;
        overflow: hidden;
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
      }

      .nav-link::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: var(--gradient-primary);
        transition: left 0.3s ease;
        z-index: -1;
        border-radius: 12px;
      }

      .nav-link:hover::before,
      .active-link::before {
        left: 0;
      }

      .nav-link:hover {
        transform: translateX(10px);
        color: white;
      }

      .active-link {
        background: var(--gradient-primary) !important;
        transform: translateX(10px);
        box-shadow: 0 4px 15px rgba(102, 126, 234, 0.4);
      }

      /* Header */
      .main-header {
        background: rgba(255, 255, 255, 0.95);
        backdrop-filter: blur(20px);
        box-shadow: 0 4px 20px var(--shadow);
      }

      .header-title {
        background: var(--gradient-primary);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
      }

      /* User avatar */
      .user-avatar {
        background: var(--gradient-primary);
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
        transition: all 0.3s ease;
      }

      .user-avatar:hover {
        transform: translateY(-3px);
        box-shadow: 0 8px 25px rgba(0, 0, 0, 0.3);
      }

      /* Main content area */
      .main-content {
        background: rgba(255, 255, 255, 0.98);
        backdrop-filter: blur(20px);
        border-radius: 24px;
        box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
        margin: 3rem;
        min-height: calc(100vh - 200px);
      }

      /* Icons */
      .nav-icon {
        width: 24px;
        height: 24px;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: all 0.3s ease;
      }

      .nav-link:hover .nav-icon {
        transform: scale(1.15);
      }

      /* Footer */
      .footer {
        background: linear-gradient(180deg, #1e293b 0%, #0f172a 100%);
        margin: 0 3rem 3rem;
        border-radius: 0 0 24px 24px;
        padding: 2rem;
      }

      .footer-text {
        background: var(--gradient-primary);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
      }

      /* Button styles */
      .btn-primary {
        background: var(--gradient-primary);
        color: white;
        padding: 1rem 2rem;
        border-radius: 12px;
        font-weight: 600;
        font-size: 1.125rem;
        transition: all 0.3s ease;
        box-shadow: 0 4px 15px rgba(102, 126, 234, 0.4);
      }

      .btn-primary:hover {
        transform: translateY(-3px);
        box-shadow: 0 8px 25px rgba(102, 126, 234, 0.6);
      }

      /* Hover effects */
      .hover-lift {
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
      }

      .hover-lift:hover {
        transform: translateY(-3px);
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15);
      }

      /* Background pattern */
      .bg-pattern {
        background-image: radial-gradient(circle at 50% 50%, rgba(102, 126, 234, 0.2) 1px, transparent 1px);
        background-size: 40px 40px;
      }

      /* Responsive adjustments */
      @media (max-width: 1024px) {
        .main-content {
          margin: 1.5rem;
          border-radius: 16px;
        }
        .footer {
          margin: 0 1.5rem 1.5rem;
          border-radius: 0 0 16px 16px;
        }
      }
    </style>
  </head>

  <body class="font-sans antialiased bg-pattern text-gray-900">
    <div class="min-h-screen flex flex-col fade-in">

      <!-- Top Navigation -->
      <div class="glass shadow-lg z-50 sticky top-0 slide-up">
        @include('layouts.navigation')
      </div>

      <!-- Main Wrapper -->
      <div class="ml-80 flex-1 flex flex-col overflow-y-auto">
        <!-- Sidebar -->
        <aside class="fixed top-16 left-0 w-80 h-[calc(100vh-64px)] sidebar text-white p-8 overflow-y-auto transition-all duration-300 z-40 slide-in-left">
          <h1 class="text-3xl font-bold mb-10 text-center sidebar-title">Panneau d'Administration</h1>
          <nav class="space-y-4">
            <a href="/admin/manage" class="nav-link flex items-center gap-5 px-5 py-4 rounded-xl transition-all duration-300 hover-lift {{ request()->is('admin/manage*') ? 'active-link' : '' }}">
              <div class="nav-icon">
                <i class="fa-solid fa-layer-group"></i>
              </div>
              <span class="font-medium text-lg">Gérer Tout</span>
            </a>
            <a href="/admin/categories-tags" class="nav-link flex items-center gap-5 px-5 py-4 rounded-xl transition-all duration-300 hover-lift {{ request()->is('admin/categories-tags*') ? 'active-link' : '' }}">
              <div class="nav-icon">
                <i class="fa-solid fa-tags"></i>
              </div>
              <span class="font-medium text-lg">Catégories</span>
            </a>
            <a href="/admin/users" class="nav-link flex items-center gap-5 px-5 py-4 rounded-xl transition-all duration-300 hover-lift {{ request()->is('admin/users*') ? 'active-link' : '' }}">
              <div class="nav-icon">
                <i class="fa-solid fa-users"></i>
              </div>
              <span class="font-medium text-lg">Utilisateurs</span>
            </a>
            <a href="/admin/activity-logs" class="nav-link flex items-center gap-5 px-5 py-4 rounded-xl transition-all duration-300 hover-lift {{ request()->is('admin/activity-logs*') ? 'active-link' : '' }}">
              <div class="nav-icon">
                <i class="fa-solid fa-chart-line"></i>
              </div>
              <span class="font-medium text-lg">Activité</span>
            </a>
            <a href="/admin/partners" class="nav-link flex items-center gap-5 px-5 py-4 rounded-xl transition-all duration-300 hover-lift {{ request()->is('admin/partners*') ? 'active-link' : '' }}">
              <div class="nav-icon">
                <i class="fa-solid fa-handshake"></i>
              </div>
              <span class="font-medium text-lg">Partenaires</span>
            </a>
            <a href="/admin/settings" class="nav-link flex items-center gap-5 px-5 py-4 rounded-xl transition-all duration-300 hover-lift {{ request()->is('admin/settings*') ? 'active-link' : '' }}">
              <div class="nav-icon">
                <i class="fa-solid fa-gear"></i>
              </div>
              <span class="font-medium text-lg">Paramètres du Site</span>
            </a>
          </nav>
        </aside>

        <!-- Main Content -->
        <div class="flex-1 flex flex-col overflow-y-auto">
          @isset($header)
            <header class="main-header px-10 py-8 sticky top-0 z-10 slide-up">
              <div class="flex justify-between items-center">
                <h1 class="text-4xl font-bold header-title">{{ $header }}</h1>
                <div class="flex items-center gap-6">
                  <span class="text-gray-600 font-medium text-lg">{{ Auth::user()->name ?? 'Admin' }}</span>
                  <div class="user-avatar w-14 h-14 rounded-full text-white flex items-center justify-center font-bold text-xl">
                    {{ strtoupper(substr(Auth::user()->name ?? 'Admin', 0, 1)) }}
                  </div>
                </div>
              </div>
            </header>
          @endisset

          <main class="main-content p-10 slide-up">
            {{ $slot }}
          </main>

          <footer class="footer text-center py-8">
            <p class="text-lg font-medium footer-text">
              &copy; {{ date('Y') }} {{ config('app.name') }} Admin. Tous droits réservés.
            </p>
          </footer>
        </div>
      </div>
    </div>

    <script>
      document.addEventListener('DOMContentLoaded', function() {
        // Stagger navigation link animations
        const navLinks = document.querySelectorAll('.nav-link');
        navLinks.forEach((link, index) => {
          link.style.animationDelay = `${index * 0.1}s`;
          link.classList.add('slide-in-left');
        });

        // Hover effects for navigation links
        navLinks.forEach(link => {
          link.addEventListener('mouseenter', () => {
            if (!link.classList.contains('active-link')) {
              link.style.transform = 'translateX(10px) scale(1.02)';
            }
          });
          link.addEventListener('mouseleave', () => {
            if (!link.classList.contains('active-link')) {
              link.style.transform = 'translateX(0) scale(1)';
            }
          });
        });

        // Smooth scrolling for internal links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
          anchor.addEventListener('click', function(e) {
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

        // User avatar interaction
        const userAvatar = document.querySelector('.user-avatar');
        if (userAvatar) {
          userAvatar.addEventListener('click', function() {
            this.style.transform = 'scale(0.95)';
            setTimeout(() => {
              this.style.transform = 'scale(1)';
            }, 150);
          });
        }
      });
    </script>
  </body>
</html>