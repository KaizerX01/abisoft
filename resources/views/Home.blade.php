<!DOCTYPE html>
<html lang="fr" data-theme="light">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $settings->site_name ?? 'Abisoft' }} - Solutions Technologiques Innovantes</title>
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    
    <!-- DaisyUI -->
    <link href="https://cdn.jsdelivr.net/npm/daisyui@4.12.10/dist/full.min.css" rel="stylesheet" type="text/css" />
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" crossorigin="anonymous" />
    
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
        
        .hero-bg {
            background: linear-gradient(135deg, 
                rgba(30, 64, 175, 0.95) 0%, 
                rgba(67, 56, 202, 0.95) 50%, 
                rgba(99, 102, 241, 0.95) 100%);
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            position: relative;
            overflow: hidden;
        }
        
        .hero-bg-image {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-size: cover;
            background-position: center;
            opacity: 0;
            transition: opacity 1.5s ease-in-out; /* Smooth fade transition */
            z-index: 1;
        }
        
        .hero-bg-image.active {
            opacity: 1;
        }
        
        .hero-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(135deg, 
                rgba(30, 64, 175, 0.95) 0%, 
                rgba(67, 56, 202, 0.95) 50%, 
                rgba(99, 102, 241, 0.95) 100%);
            z-index: 2;
        }
        
        .gradient-text {
            background: linear-gradient(135deg, #1e40af 0%, #4338ca 50%, #6366f1 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
        
        .glass-effect {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }
        
        .card-hover {
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        }
        
        .card-hover:hover {
            transform: translateY(-12px) scale(1.02);
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
        }
        
        .floating {
            animation: float 6s ease-in-out infinite;
        }
        
        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-20px); }
        }
        
        .fade-in {
            opacity: 0;
            transform: translateY(30px);
            transition: all 0.8s ease-out;
        }
        
        .fade-in.visible {
            opacity: 1;
            transform: translateY(0);
        }
        
        .counter {
            transition: all 0.3s ease;
        }
        
        .partner-logo {
            filter: grayscale(100%) opacity(0.7);
            transition: all 0.3s ease;
        }
        
        .partner-logo:hover {
            filter: grayscale(0%) opacity(1);
            transform: scale(1.1);
        }
        
        .section-divider {
            height: 100px;
            background: linear-gradient(to bottom, transparent 0%, rgba(30, 64, 175, 0.1) 50%, transparent 100%);
        }
    </style>
</head>

<body class="font-sans antialiased bg-gray-50">
    <!-- Include Navigation -->
    @include('layouts.navigation')

    <!-- Hero Section -->
    <section id="accueil" class="hero min-h-screen hero-bg relative overflow-hidden">
        <!-- Background Images -->
        <div class="hero-bg-image active" style="background-image: url('https://images.unsplash.com/photo-1451187580459-43490279c0fa?ixlib=rb-4.0.3&auto=format&fit=crop&w=2072&q=80');"></div>
        <div class="hero-bg-image" style="background-image: url('https://images.unsplash.com/photo-1518709268805-4e9042af2176?ixlib=rb-4.0.3&auto=format&fit=crop&w=2072&q=80');"></div>
        <div class="hero-bg-image" style="background-image: url('https://images.unsplash.com/photo-1504384308090-c894fdcc538d?ixlib=rb-4.0.3&auto=format&fit=crop&w=2072&q=80');"></div>
        
        <!-- Overlay -->
        <div class="hero-overlay"></div>
        
        <!-- Floating Elements -->
        <div class="absolute inset-0 overflow-hidden z-5">
            <div class="absolute top-20 left-20 w-32 h-32 bg-blue-400/20 rounded-full floating" style="animation-delay: 0s;"></div>
            <div class="absolute top-40 right-32 w-24 h-24 bg-indigo-400/20 rounded-full floating" style="animation-delay: 1s;"></div>
            <div class="absolute bottom-32 left-40 w-28 h-28 bg-purple-400/20 rounded-full floating" style="animation-delay: 2s;"></div>
            <div class="absolute bottom-20 right-20 w-20 h-20 bg-cyan-400/20 rounded-full floating" style="animation-delay: 3s;"></div>
        </div>
        
        <div class="hero-content text-center text-white relative z-10">
            <div class="max-w-6xl fade-in">
                <h1 class="text-7xl md:text-9xl font-black mb-8 tracking-tight">
                    <span class="bg-gradient-to-r from-white via-blue-100 to-indigo-100 bg-clip-text text-transparent">
                        {{ $settings->site_name ?? 'Abisoft' }}
                    </span>
                </h1>
                <h2 class="text-4xl md:text-5xl font-bold mb-8 text-blue-100">
                    {{ $settings->hero_title ?? "C'EST VRAIMENT GÉNIAL" }}
                </h2>
                <p class="text-xl md:text-2xl mb-12 font-light max-w-4xl mx-auto leading-relaxed opacity-90">
                    {{ $settings->hero_description ?? "ON VOUS OFFRE DES PRODUITS ET DES SERVICES DE HAUTE QUALITÉ AVEC DES TRÈS BON PRIX" }}
                </p>
                <div class="flex flex-col sm:flex-row gap-6 justify-center items-center">
                    <button class="btn btn-lg bg-white text-blue-600 border-none px-12 hover:bg-blue-50 hover:scale-105 transition-all duration-300 shadow-2xl">
                        <i class="fas fa-rocket mr-2"></i>
                        EN SAVOIR PLUS
                    </button>
                    <button class="btn btn-lg btn-outline text-white border-white hover:bg-white hover:text-blue-600 px-10 transition-all duration-300">
                        <i class="fas fa-play mr-2"></i>
                        Regarder la Démo
                    </button>
                </div>
            </div>
        </div>
        
        <!-- Scroll Indicator -->
        <div class="absolute bottom-8 left-1/2 transform -translate-x-1/2 animate-bounce z-10">
            <div class="flex flex-col items-center text-white">
                <span class="text-sm mb-2 font-medium opacity-80">Découvrir</span>
                <i class="fas fa-chevron-down text-xl"></i>
            </div>
        </div>
    </section>

    <!-- Stats Section -->
    <section class="py-20 bg-gradient-to-r from-blue-50 to-indigo-50">
        <div class="container mx-auto px-6">
            <div class="stats stats-vertical lg:stats-horizontal shadow-2xl bg-white w-full rounded-3xl">
                <div class="stat place-items-center fade-in">
                    <div class="stat-figure text-blue-600">
                        <i class="fas fa-users text-4xl"></i>
                    </div>
                    <div class="stat-title text-gray-600 font-semibold">Clients Satisfaits</div>
                    <div class="stat-value text-5xl font-black gradient-text counter" data-target="{{ $settings->clients_count ?? 500 }}">0</div>
                    <div class="stat-desc text-blue-600 font-medium">Et ça continue!</div>
                </div>
                
                <div class="stat place-items-center fade-in" style="animation-delay: 0.1s;">
                    <div class="stat-figure text-indigo-600">
                        <i class="fas fa-box text-4xl"></i>
                    </div>
                    <div class="stat-title text-gray-600 font-semibold">Produits</div>
                    <div class="stat-value text-5xl font-black gradient-text counter" data-target="{{ $products->count() }}">0</div>
                    <div class="stat-desc text-indigo-600 font-medium">Solutions innovantes</div>
                </div>
                
                <div class="stat place-items-center fade-in" style="animation-delay: 0.2s;">
                    <div class="stat-figure text-purple-600">
                        <i class="fas fa-cogs text-4xl"></i>
                    </div>
                    <div class="stat-title text-gray-600 font-semibold">Services</div>
                    <div class="stat-value text-5xl font-black gradient-text counter" data-target="{{ $services->count() }}">0</div>
                    <div class="stat-desc text-purple-600 font-medium">Expertises diverses</div>
                </div>
                
                <div class="stat place-items-center fade-in" style="animation-delay: 0.3s;">
                    <div class="stat-figure text-cyan-600">
                        <i class="fas fa-graduation-cap text-4xl"></i>
                    </div>
                    <div class="stat-title text-gray-600 font-semibold">Formations</div>
                    <div class="stat-value text-5xl font-black gradient-text counter" data-target="{{ $formations->count() }}">0</div>
                    <div class="stat-desc text-cyan-600 font-medium">Apprentissage continu</div>
                </div>
            </div>
        </div>
    </section>

    <div class="section-divider"></div>

    <!-- Products Section -->
    <section id="produits" class="py-24 bg-white">
        <div class="container mx-auto px-6">
            <div class="text-center mb-20 fade-in">
                <h2 class="text-6xl font-black mb-6 gradient-text">
                    Nos Produits
                </h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto leading-relaxed">
                    Des solutions technologiques avancées pour propulser votre entreprise vers le succès
                </p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @forelse($products->take(3) as $index => $product)
                <div class="card card-hover bg-base-100 shadow-xl border-0 fade-in" style="animation-delay: {{ $index * 0.1 }}s">
                    <figure class="relative overflow-hidden">
                        @if($product->image)
                            <img src="{{ asset('storage/' . $product->image) }}" 
                                 alt="{{ $product->name }}" 
                                 class="w-full h-56 object-cover transition-transform duration-500 hover:scale-110" />
                        @else
                            <div class="w-full h-56 bg-gradient-to-br from-blue-500 to-indigo-600 flex items-center justify-center">
                                <i class="fas fa-box text-white text-6xl"></i>
                            </div>
                        @endif
                        <div class="absolute top-4 right-4">
                            <div class="badge badge-primary text-white font-bold">{{ $product->category->name ?? 'PRODUIT' }}</div>
                        </div>
                    </figure>
                    
                    <div class="card-body">
                        <div class="flex items-center mb-4">
                            <div class="avatar">
                                <div class="w-12 h-12 rounded-xl bg-gradient-to-br from-blue-500 to-blue-700 flex items-center justify-center">
                                    <i class="fas fa-box text-white text-lg"></i>
                                </div>
                            </div>
                            <div class="ml-3">
                                <h2 class="card-title text-xl font-bold text-gray-800">{{ $product->name }}</h2>
                                <div class="text-sm text-gray-500">Catégorie: {{ $product->category->name ?? 'Non classé' }}</div>
                            </div>
                        </div>
                        
                        <p class="text-gray-600 leading-relaxed mb-4">
                            {{ Str::limit($product->description, 120) }}
                        </p>
                        
                        <div class="flex items-center justify-between mb-4">
                            <div class="text-2xl font-bold text-blue-600">€{{ number_format($product->price, 2) }}</div>
                            <div class="rating rating-sm">
                                @for($i = 1; $i <= 5; $i++)
                                    <input type="radio" name="rating-{{ $product->id }}" class="mask mask-star-2 bg-orange-400" {{ $i == 5 ? 'checked' : '' }} />
                                @endfor
                            </div>
                        </div>
                        
                        <div class="card-actions justify-end">
                            <button class="btn btn-primary btn-sm">
                                <i class="fas fa-shopping-cart mr-2"></i>
                                Acheter
                            </button>
                            <button class="btn btn-outline btn-sm">
                                <i class="fas fa-eye mr-2"></i>
                                Détails
                            </button>
                        </div>
                    </div>
                </div>
                @empty
                <div class="col-span-full text-center py-20">
                    <div class="text-gray-400">
                        <i class="fas fa-box text-6xl mb-4"></i>
                        <p class="text-xl">Aucun produit disponible pour le moment</p>
                    </div>
                </div>
                @endforelse
            </div>
            
            <div class="text-center mt-12">
                <a href="{{ route('products.index') }}" class="btn btn-outline btn-primary btn-lg">
                    <i class="fas fa-th-large mr-2"></i>
                    Voir Tous les Produits
                </a>
            </div>
        </div>
    </section>

    <div class="section-divider"></div>

    <!-- Services Section -->
    <section id="services" class="py-24 bg-gradient-to-br from-gray-50 to-blue-50">
        <div class="container mx-auto px-6">
            <div class="text-center mb-20 fade-in">
                <h2 class="text-6xl font-black mb-6 gradient-text">
                    Nos Services
                </h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto leading-relaxed">
                    Services professionnels sur mesure pour accompagner votre transformation digitale
                </p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @forelse($services->take(3) as $index => $service)
                <div class="card card-hover bg-base-100 shadow-xl border-0 fade-in" style="animation-delay: {{ $index * 0.1 }}s">
                    <figure class="relative overflow-hidden">
                        @if($service->image)
                            <img src="{{ asset('storage/' . $service->image) }}" 
                                 alt="{{ $service->name }}" 
                                 class="w-full h-56 object-cover transition-transform duration-500 hover:scale-110" />
                        @else
                            <div class="w-full h-56 bg-gradient-to-br from-indigo-500 to-purple-600 flex items-center justify-center">
                                <i class="fas fa-cogs text-white text-6xl"></i>
                            </div>
                        @endif
                    </figure>
                    
                    <div class="card-body">
                        <div class="flex items-center mb-4">
                            <div class="avatar">
                                <div class="w-12 h-12 rounded-xl bg-gradient-to-br from-blue-500 to-cyan-600 flex items-center justify-center">
                                    <i class="fas fa-cogs text-white text-lg"></i>
                                </div>
                            </div>
                            <div class="ml-3">
                                <h2 class="card-title text-xl font-bold text-gray-800">{{ $service->name }}</h2>
                                <div class="text-sm text-gray-500">À partir de €{{ number_format($service->price, 2) }}</div>
                            </div>
                        </div>
                        
                        <p class="text-gray-600 leading-relaxed mb-4">
                            {{ Str::limit($service->description, 120) }}
                        </p>
                        
                        <div class="flex flex-wrap gap-2 mb-4">
                            <div class="badge badge-outline">{{ $service->category->name ?? 'Service' }}</div>
                            <div class="badge badge-outline">Professionnel</div>
                            <div class="badge badge-outline">Sur mesure</div>
                        </div>
                        
                        <div class="card-actions justify-end">
                            <button class="btn btn-primary btn-sm">
                                <i class="fas fa-calendar mr-2"></i>
                                Réserver
                            </button>
                        </div>
                    </div>
                </div>
                @empty
                <div class="col-span-full text-center py-20">
                    <div class="text-gray-400">
                        <i class="fas fa-cogs text-6xl mb-4"></i>
                        <p class="text-xl">Aucun service disponible pour le moment</p>
                    </div>
                </div>
                @endforelse
            </div>
            
            <div class="text-center mt-12">
                <a href="{{ route('services.index') }}" class="btn btn-outline btn-primary btn-lg">
                    <i class="fas fa-concierge-bell mr-2"></i>
                    Voir Tous les Services
                </a>
            </div>
        </div>
    </section>

    <div class="section-divider"></div>

    <!-- Formation Section -->
    <section id="formation" class="py-24 bg-white">
        <div class="container mx-auto px-6">
            <div class="text-center mb-20 fade-in">
                <h2 class="text-6xl font-black mb-6 gradient-text">
                    Nos Formations
                </h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto leading-relaxed">
                    Programmes de formation spécialisés pour développer vos compétences technologiques
                </p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @forelse($formations->take(3) as $index => $formation)
                <div class="card card-hover bg-base-100 shadow-xl border-0 fade-in" style="animation-delay: {{ $index * 0.1 }}s">
                    <figure class="relative overflow-hidden">
                        @if($formation->image)
                            <img src="{{ asset('storage/' . $formation->image) }}" 
                                 alt="{{ $formation->name }}" 
                                 class="w-full h-56 object-cover transition-transform duration-500 hover:scale-110" />
                        @else
                            <div class="w-full h-56 bg-gradient-to-br from-purple-500 to-violet-600 flex items-center justify-center">
                                <i class="fas fa-graduation-cap text-white text-6xl"></i>
                            </div>
                        @endif
                        <div class="absolute top-4 left-4">
                            <div class="badge badge-success text-white font-bold">FORMATION</div>
                        </div>
                    </figure>
                    
                    <div class="card-body">
                        <div class="flex items-center justify-between mb-4">
                            <div class="flex items-center">
                                <div class="avatar">
                                    <div class="w-12 h-12 rounded-xl bg-gradient-to-br from-green-500 to-teal-600 flex items-center justify-center">
                                        <i class="fas fa-graduation-cap text-white text-lg"></i>
                                    </div>
                                </div>
                                <div class="ml-3">
                                    <h2 class="card-title text-xl font-bold text-gray-800">{{ $formation->name }}</h2>
                                    <div class="text-sm text-gray-500">{{ $formation->category->name ?? 'Formation' }}</div>
                                </div>
                            </div>
                        </div>
                        
                        <p class="text-gray-600 leading-relaxed mb-4">
                            {{ Str::limit($formation->description, 120) }}
                        </p>
                        
                        <div class="flex items-center justify-between mb-4">
                            <div class="text-2xl font-bold text-green-600">€{{ number_format($formation->price, 2) }}</div>
                            <div class="flex items-center text-sm text-gray-500">
                                <i class="fas fa-users mr-1"></i>
                                Places limitées
                            </div>
                        </div>
                        
                        <div class="progress progress-primary w-full mb-2" value="70" max="100"></div>
                        <div class="text-sm text-gray-500 mb-4">Places disponibles</div>
                        
                        <div class="card-actions justify-end">
                            <button class="btn btn-success btn-sm">
                                <i class="fas fa-user-plus mr-2"></i>
                                S'inscrire
                            </button>
                        </div>
                    </div>
                </div>
                @empty
                <div class="col-span-full text-center py-20">
                    <div class="text-gray-400">
                        <i class="fas fa-graduation-cap text-6xl mb-4"></i>
                        <p class="text-xl">Aucune formation disponible pour le moment</p>
                    </div>
                </div>
                @endforelse
            </div>
            
            <div class="text-center mt-12">
                <a href="{{ route('formations.index') }}" class="btn btn-outline btn-primary btn-lg">
                    <i class="fas fa-graduation-cap mr-2"></i>
                    Voir Toutes les Formations
                </a>
            </div>
        </div>
    </section>

    <div class="section-divider"></div>

    <!-- Partners Section -->
    @if($partners->count() > 0)
    <section class="py-24 bg-gradient-to-br from-gray-50 to-indigo-50">
        <div class="container mx-auto px-6">
            <div class="text-center mb-20 fade-in">
                <h2 class="text-6xl font-black mb-6 gradient-text">
                    Nos Partenaires
                </h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto leading-relaxed">
                    Ils nous font confiance pour leurs projets technologiques
                </p>
            </div>
            
            <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-6 gap-8">
                @foreach($partners as $index => $partner)
                <div class="flex items-center justify-center p-6 bg-white rounded-2xl shadow-lg partner-logo fade-in" style="animation-delay: {{ $index * 0.1 }}s">
                    @if($partner->image)
                        <img src="{{ asset('storage/' . $partner->image) }}" alt="{{ $partner->name }}" class="max-h-12 w-auto">
                    @else
                        <span class="text-gray-600 font-bold text-lg">{{ $partner->name }}</span>
                    @endif
                </div>
                @endforeach
            </div>
        </div>
    </section>
    @endif


    <!-- CTA Section -->
    <section class="py-24 bg-gradient-to-br from-blue-600 via-indigo-700 to-purple-800 text-white relative overflow-hidden">
        <div class="absolute inset-0 bg-black/20"></div>
        
        <!-- Floating elements -->
        <div class="absolute inset-0 overflow-hidden">
            <div class="absolute top-20 left-20 w-40 h-40 bg-white/10 rounded-full floating" style="animation-delay: 0s;"></div>
            <div class="absolute bottom-32 right-32 w-32 h-32 bg-blue-300/20 rounded-full floating" style="animation-delay: 2s;"></div>
        </div>
        
        <div class="container mx-auto px-6 relative z-10">
            <div class="text-center fade-in">
                <h2 class="text-6xl font-black mb-8">Prêt à Transformer Votre Entreprise?</h2>
                <p class="text-2xl mb-12 opacity-90 leading-relaxed max-w-4xl mx-auto">
                    Rejoignez des centaines de clients satisfaits qui ont accéléré leur croissance avec nos solutions innovantes
                </p>
                <div class="flex flex-col sm:flex-row gap-6 justify-center">
                    <button class="btn btn-lg bg-white text-blue-600 border-none px-12 hover:bg-blue-50 hover:scale-105 transition-all duration-300 shadow-2xl">
                        <i class="fas fa-rocket mr-2"></i>
                        Commencer Maintenant
                    </button>
                    <button class="btn btn-lg btn-outline text-white border-white hover:bg-white hover:text-blue-600 px-10 transition-all duration-300">
                        <i class="fas fa-calendar mr-2"></i>
                        Consultation Gratuite
                    </button>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section id="contact" class="py-24 bg-white">
        <div class="container mx-auto px-6">
            <div class="text-center mb-20 fade-in">
                <h2 class="text-6xl font-black mb-6 gradient-text">
                    Contactez-Nous
                </h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto leading-relaxed">
                    Nous sommes là pour répondre à toutes vos questions et vous accompagner dans vos projets
                </p>
            </div>
            
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
                <!-- Contact Info -->
                <div class="fade-in">
                    <div class="space-y-8">
                        @if($settings->phone)
                        <div class="flex items-center space-x-4">
                            <div class="w-16 h-16 bg-gradient-to-br from-blue-500 to-indigo-600 rounded-2xl flex items-center justify-center">
                                <i class="fas fa-phone text-white text-xl"></i>
                            </div>
                            <div>
                                <h3 class="text-xl font-bold text-gray-800">Téléphone</h3>
                                <p class="text-gray-600">{{ $settings->phone }}</p>
                            </div>
                        </div>
                        @endif
                        
                        @if($settings->email)
                        <div class="flex items-center space-x-4">
                            <div class="w-16 h-16 bg-gradient-to-br from-indigo-500 to-purple-600 rounded-2xl flex items-center justify-center">
                                <i class="fas fa-envelope text-white text-xl"></i>
                            </div>
                            <div>
                                <h3 class="text-xl font-bold text-gray-800">Email</h3>
                                <p class="text-gray-600">{{ $settings->email }}</p>
                            </div>
                        </div>
                        @endif
                        
                        @if($settings->address)
                        <div class="flex items-center space-x-4">
                            <div class="w-16 h-16 bg-gradient-to-br from-purple-500 to-red-500 rounded-2xl flex items-center justify-center">
                                <i class="fas fa-map-marker-alt text-white text-xl"></i>
                            </div>
                            <div>
                                <h3 class="text-xl font-bold text-gray-800">Adresse</h3>
                                <p class="text-gray-600">{{ $settings->address }}</p>
                            </div>
                        </div>
                        @endif
                        
                        <div class="flex space-x-4 pt-8">
                            @if($settings->facebook)
                            <a href="{{ $settings->facebook }}" target="_blank" class="w-12 h-12 bg-blue-600 rounded-xl flex items-center justify-center text-white hover:bg-blue-700 transition-colors">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                            @endif
                            @if($settings->linkedin)
                            <a href="{{ $settings->linkedin }}" target="_blank" class="w-12 h-12 bg-blue-500 rounded-xl flex items-center justify-center text-white hover:bg-blue-600 transition-colors">
                                <i class="fab fa-linkedin-in"></i>
                            </a>
                            @endif
                            @if($settings->instagram)
                            <a href="{{ $settings->instagram }}" target="_blank" class="w-12 h-12 bg-gradient-to-br from-purple-500 to-red-500 rounded-xl flex items-center justify-center text-white hover:opacity-80 transition-opacity">
                                <i class="fab fa-instagram"></i>
                            </a>
                            @endif
                        </div>
                    </div>
                </div>
                
                <!-- Contact Form -->
                <div class="fade-in" style="animation-delay: 0.2s">
                    <div class="card bg-base-100 shadow-2xl">
                        <div class="card-body">
                            <form action="{{ route('contact.send') }}" method="POST" class="space-y-6">
                                @csrf
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                    <div class="form-control">
                                        <label class="label">
                                            <span class="label-text font-semibold">Nom</span>
                                        </label>
                                        <input type="text" name="name" placeholder="Votre nom" class="input input-bordered input-primary" required />
                                    </div>
                                    <div class="form-control">
                                        <label class="label">
                                            <span class="label-text font-semibold">Email</span>
                                        </label>
                                        <input type="email" name="email" placeholder="votre@email.com" class="input input-bordered input-primary" required />
                                    </div>
                                </div>
                                
                                <div class="form-control">
                                    <label class="label">
                                        <span class="label-text font-semibold">Sujet</span>
                                    </label>
                                    <select name="subject" class="select select-bordered select-primary" required>
                                        <option disabled selected>Choisissez un sujet</option>
                                        <option value="product">Demande de produit</option>
                                        <option value="service">Demande de service</option>
                                        <option value="formation">Inscription formation</option>
                                        <option value="support">Support technique</option>
                                        <option value="other">Autre</option>
                                    </select>
                                </div>
                                
                                <div class="form-control">
                                    <label class="label">
                                        <span class="label-text font-semibold">Message</span>
                                    </label>
                                    <textarea name="message" class="textarea textarea-bordered textarea-primary h-32" placeholder="Votre message..." required></textarea>
                                </div>
                                
                                <div class="form-control">
                                    <button type="submit" class="btn btn-primary btn-lg">
                                        <i class="fas fa-paper-plane mr-2"></i>
                                        Envoyer le Message
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
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
                Votre partenaire technologique pour l\'innovation et la transformation digitale
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

    <script>
        // Smooth scrolling for navigation links
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

        // Intersection Observer for animations
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        };

        const observer = new IntersectionObserver(function(entries) {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('visible');
                }
            });
        }, observerOptions);

        document.querySelectorAll('.fade-in').forEach(el => {
            observer.observe(el);
        });

        // Counter animation
        const counters = document.querySelectorAll('.counter');
        const counterObserver = new IntersectionObserver(function(entries) {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const counter = entry.target;
                    const target = parseInt(counter.getAttribute('data-target'));
                    let current = 0;
                    const increment = target / 60;
                    
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
                    counterObserver.unobserve(counter);
                }
            });
        }, observerOptions);

        counters.forEach(counter => counterObserver.observe(counter));

        // Initialize hero animation
        document.addEventListener('DOMContentLoaded', function() {
            setTimeout(() => {
                const heroContent = document.querySelector('.hero .fade-in');
                if (heroContent) {
                    heroContent.classList.add('visible');
                }
            }, 500);
        });

        // Navbar background on scroll
        window.addEventListener('scroll', function() {
            const navbar = document.querySelector('.navbar');
            if (window.scrollY > 100) {
                navbar.style.background = 'rgba(30, 64, 175, 0.95)';
                navbar.style.backdropFilter = 'blur(20px)';
            } else {
                navbar.style.background = 'rgba(255, 255, 255, 0.1)';
                navbar.style.backdropFilter = 'blur(20px)';
            }
        });

        // Form submission with AJAX (optional enhancement)
        document.querySelector('form').addEventListener('submit', function(e) {
            const submitBtn = this.querySelector('button[type="submit"]');
            const originalText = submitBtn.innerHTML;
            
            submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin mr-2"></i>Envoi en cours...';
            submitBtn.disabled = true;
            
            // Reset after 3 seconds (you can replace this with actual AJAX logic)
            setTimeout(() => {
                submitBtn.innerHTML = originalText;
                submitBtn.disabled = false;
            }, 3000);
        });

        // Hero background slideshow
        document.addEventListener('DOMContentLoaded', function() {
            const images = document.querySelectorAll('.hero-bg-image');
            let currentIndex = 0;

            function showNextImage() {
                images[currentIndex].classList.remove('active');
                currentIndex = (currentIndex + 1) % images.length;
                images[currentIndex].classList.add('active');
            }

            // Start the slideshow with a 5-second interval
            setInterval(showNextImage, 5000);

            // Ensure the first image is active on load
            images[currentIndex].classList.add('active');
        });
    </script>
</body>
</html>