<x-app-layout>

    
    
    <style>
        .glass-card {
            backdrop-filter: blur(20px);
            background: rgba(255, 255, 255, 0.9);
            border: 1px solid rgba(255, 255, 255, 0.3);
        }
        
        .image-zoom {
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            cursor: zoom-in;
        }
        
        .image-zoom:hover {
            transform: scale(1.05);
        }
        
        .floating-animation {
            animation: float 6s ease-in-out infinite;
        }
        
        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-10px); }
        }
        
        .gradient-border {
            background: linear-gradient(45deg, #667eea, #764ba2);
            border-radius: 1rem;
            padding: 2px;
        }
        
        .gradient-border-inner {
            background: white;
            border-radius: calc(1rem - 2px);
        }
        
        .price-glow {
            animation: price-pulse 2s infinite;
        }
        
        @keyframes price-pulse {
            0%, 100% { 
                box-shadow: 0 0 20px rgba(34, 197, 94, 0.3);
                transform: scale(1);
            }
            50% { 
                box-shadow: 0 0 30px rgba(34, 197, 94, 0.5);
                transform: scale(1.02);
            }
        }
        
        .info-card {
            transition: all 0.3s ease;
        }
        
        .info-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 40px -12px rgba(0, 0, 0, 0.15);
        }
        
        .modal-backdrop {
            backdrop-filter: blur(10px);
            background: rgba(0, 0, 0, 0.5);
        }
        
        .zoom-overlay {
            cursor: zoom-out;
        }
        
        .share-button {
            transition: all 0.3s ease;
        }
        
        .share-button:hover {
            transform: scale(1.1) rotate(5deg);
        }
    </style>

    <div x-data="serviceView()" class="space-y-8">
        
        <!-- Main Service Section -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
            
            <!-- Service Image Section -->
            <div class="space-y-6">
                <div class="gradient-border">
                    <div class="gradient-border-inner p-4">
                        <div class="relative aspect-square rounded-lg overflow-hidden bg-gradient-to-br from-gray-100 to-gray-200">
                            @if($service->image)
                                <img src="{{ asset('storage/' . $service->image) }}"
                                     alt="{{ $service->name }}"
                                     class="image-zoom w-full h-full object-cover rounded-lg"
                                     @click="openImageModal('{{asset('storage/' . $service->image)  }}')" />
                            @else
                                <div class="w-full h-full flex items-center justify-center">
                                    <div class="text-center">
                                        <i class="fas fa-cogs text-8xl text-gray-400 mb-4"></i>
                                        <p class="text-gray-500 text-lg">Aucune image disponible</p>
                                    </div>
                                </div>
                            @endif
                            
                            
                        </div>
                    </div>
                </div>
                
                <!-- Share & Actions -->
                <div class="flex justify-center space-x-4">
                    <button @click="shareService()" class="share-button btn btn-outline btn-lg rounded-full">
                        <i class="fas fa-share-alt mr-2"></i>Partager
                    </button>
                    <button class="share-button btn btn-outline btn-lg rounded-full"
                     @click="downloadImage('{{ asset('storage/' . $service->image)  }}', '{{ $service->name }}')">
                        <i class="fas fa-download mr-2"></i>Télécharger
                    </button>
                 
                    
                </div>
            </div>
            
            <!-- Service Details Section -->
            <div class="space-y-8">
                
                <!-- Category Badge -->
                <div class="flex justify-start">
                    <div class="floating-animation badge badge-primary badge-lg font-semibold px-4 py-3 text-base">
                        <i class="fas fa-tags mr-2"></i>{{ $service->category?->name ?? 'Aucune catégorie' }}
                    </div>
                </div>
                
                <!-- Service Title -->
                <div>
                    <h1 class="text-4xl md:text-5xl font-black text-gray-800 mb-4 leading-tight">
                        {{ $service->name }}
                    </h1>
                </div>
                
                <!-- Price Section -->
                <div class="price-glow glass-card rounded-2xl p-6 text-center">
                    <div class="text-sm text-gray-600 mb-2">Prix du service</div>
                    <div class="text-5xl font-black text-green-600 mb-2">
                        {{ number_format($service->price, 2) }} MAD
                    </div>
                    <div class="text-sm text-gray-500">À partir de</div>
                </div>
                
                <!-- Service Description -->
                @if($service->description)
                    <div class="glass-card rounded-2xl p-6">
                        <h3 class="text-xl font-bold text-gray-800 mb-4 flex items-center">
                            <i class="fas fa-align-left mr-3 text-indigo-500"></i>Description
                        </h3>
                        <div class="prose prose-lg text-gray-700 leading-relaxed">
                            {{ $service->description }}
                        </div>
                    </div>
                @endif
                
                <!-- Action Buttons -->
                <div class="flex flex-col sm:flex-row gap-4">
                    <button class="btn btn-primary btn-lg flex-1 rounded-2xl font-bold text-lg hover:scale-105 transition-transform duration-200">
                        <i class="fas fa-calendar-check mr-3 text-xl"></i>
                        Réserver maintenant
                    </button>
                    <button class="btn btn-secondary btn-lg flex-1 rounded-2xl font-bold text-lg hover:scale-105 transition-transform duration-200">
                        <i class="fas fa-phone mr-3 text-xl"></i>
                        Nous contacter
                    </button>
                </div>
            </div>
        </div>
        
        <!-- Additional Information Cards -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            
            <!-- Service Details Card -->
            <div class="info-card glass-card rounded-2xl p-6">
                <h3 class="text-xl font-bold text-gray-800 mb-4 flex items-center">
                    <i class="fas fa-info-circle mr-3 text-blue-500"></i>Détails
                </h3>
                <div class="space-y-4">
                    <div class="flex justify-between items-center py-2 border-b border-gray-100">
                        <span class="text-gray-600">ID Service</span>
                        <span class="font-semibold">#{{ str_pad($service->id, 6, '0', STR_PAD_LEFT) }}</span>
                    </div>
                    <div class="flex justify-between items-center py-2 border-b border-gray-100">
                        <span class="text-gray-600">Catégorie</span>
                        <span class="font-semibold">{{ $service->category?->name ?? 'Non définie' }}</span>
                    </div>
                    <div class="flex justify-between items-center py-2 border-b border-gray-100">
                        <span class="text-gray-600">Date d'ajout</span>
                        <span class="font-semibold">{{ $service->created_at->format('d/m/Y') }}</span>
                    </div>
                    <div class="flex justify-between items-center py-2">
                        <span class="text-gray-600">Dernière MAJ</span>
                        <span class="font-semibold">{{ $service->updated_at->format('d/m/Y') }}</span>
                    </div>
                </div>
            </div>
            
            <!-- Rating & Reviews Card -->
            <div class="info-card glass-card rounded-2xl p-6">
                <h3 class="text-xl font-bold text-gray-800 mb-4 flex items-center">
                    <i class="fas fa-star mr-3 text-yellow-500"></i>Évaluations
                </h3>
                <div class="text-center mb-4">
                    <div class="text-3xl font-bold text-gray-800 mb-2">4.7</div>
                    <div class="rating rating-lg mb-2">
                        <input type="radio" class="mask mask-star-2 bg-yellow-400" disabled checked />
                        <input type="radio" class="mask mask-star-2 bg-yellow-400" disabled checked />
                        <input type="radio" class="mask mask-star-2 bg-yellow-400" disabled checked />
                        <input type="radio" class="mask mask-star-2 bg-yellow-400" disabled checked />
                        <input type="radio" class="mask mask-star-2 bg-yellow-400" disabled />
                    </div>
                    <div class="text-sm text-gray-500">Basé sur 156 avis</div>
                </div>
                <button class="btn btn-outline btn-block rounded-full">
                    <i class="fas fa-comment mr-2"></i>Voir les avis
                </button>
            </div>
            
            <!-- Service Features Card -->
            <div class="info-card glass-card rounded-2xl p-6">
                <h3 class="text-xl font-bold text-gray-800 mb-4 flex items-center">
                    <i class="fas fa-check-circle mr-3 text-green-500"></i>Avantages
                </h3>
                <div class="space-y-4">
                    <div class="flex items-center space-x-3">
                        <div class="w-3 h-3 bg-green-500 rounded-full animate-pulse"></div>
                        <span class="font-semibold text-green-600">Service professionnel</span>
                    </div>
                    <div class="text-sm text-gray-600">
                        <i class="fas fa-clock mr-2"></i>
                        Disponible 24/7
                    </div>
                    <div class="text-sm text-gray-600">
                        <i class="fas fa-shield-alt mr-2"></i>
                        Garantie qualité
                    </div>
                    <div class="text-sm text-gray-600">
                        <i class="fas fa-tools mr-2"></i>
                        Équipement professionnel
                    </div>
                    <div class="text-sm text-gray-600">
                        <i class="fas fa-user-tie mr-2"></i>
                        Experts certifiés
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Related Services Section -->
        <div class="glass-card rounded-2xl p-8">
            <h3 class="text-2xl font-bold text-gray-800 mb-6 flex items-center">
                <i class="fas fa-layer-group mr-3 text-purple-500"></i>
                Services similaires
            </h3>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                @php
                    // Get similar services (same category, excluding current service)
                    $relatedServices = App\Models\Service::where('category_service_id', $service->category_service_id)
                                                        ->where('id', '!=', $service->id)
                                                        ->take(4)
                                                        ->get();
                @endphp
                
                @forelse($relatedServices as $relatedService)
                    <a href="{{ route('services.show', $relatedService) }}" 
                       class="card bg-white shadow-lg hover:shadow-xl transition-all duration-300 hover:-translate-y-2 group">
                        <figure class="relative h-32 overflow-hidden">
                            @if($relatedService->image)
                                <img src="{{asset('storage/' . $relatedService->image)  }}" 
                                     alt="{{ $relatedService->name }}"
                                     class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-300" />
                            @else
                                <div class="w-full h-full bg-gray-100 flex items-center justify-center">
                                    <i class="fas fa-cogs text-2xl text-gray-400"></i>
                                </div>
                            @endif
                        </figure>
                        <div class="card-body p-4">
                            <h4 class="card-title text-sm font-semibold line-clamp-2">{{ $relatedService->name }}</h4>
                            <div class="text-lg font-bold text-green-600">{{ number_format($relatedService->price, 2) }} MAD</div>
                        </div>
                    </a>
                @empty
                    <div class="col-span-full text-center py-8 text-gray-500">
                        <i class="fas fa-cogs text-4xl mb-4"></i>
                        <p>Aucun service similaire trouvé</p>
                    </div>
                @endforelse
            </div>
        </div>
        
        <!-- Image Modal -->
        <div x-show="showImageModal" 
             x-transition:enter="transition ease-out duration-300"
             x-transition:enter-start="opacity-0"
             x-transition:enter-end="opacity-100"
             x-transition:leave="transition ease-in duration-200"
             x-transition:leave-start="opacity-100"
             x-transition:leave-end="opacity-0"
             class="fixed inset-0 z-50 modal-backdrop flex items-center justify-center p-4"
             @click="closeImageModal()"
             style="display: none;">
            
            <div class="relative max-w-4xl max-h-full">
                <img :src="modalImage" 
                     alt="{{ $service->name }}"
                     class="max-w-full max-h-full object-contain rounded-lg shadow-2xl"
                     @click.stop />
                     
                <button @click="closeImageModal()" 
                        class="absolute top-4 right-4 btn btn-circle btn-sm bg-black/50 text-white hover:bg-black/70">
                    <i class="fas fa-times"></i>
                </button>
            </div>
        </div>
    </div>

    <script>
        function serviceView() {
            return {
                showImageModal: false,
                modalImage: '',
                
                openImageModal(imageSrc) {
                    this.modalImage = imageSrc;
                    this.showImageModal = true;
                    document.body.style.overflow = 'hidden';
                },
                
                closeImageModal() {
                    this.showImageModal = false;
                    document.body.style.overflow = 'auto';
                },
                
                shareService() {
                    if (navigator.share) {
                        navigator.share({
                            title: '{{ $service->name }}',
                            text: '{{ $service->description }}',
                            url: window.location.href,
                        });
                    } else {
                        // Fallback: copy to clipboard
                        navigator.clipboard.writeText(window.location.href).then(() => {
                            this.showNotification('Lien copié dans le presse-papiers!');
                        });
                    }
                },
                
                downloadImage(imageSrc, serviceName) {
                    const link = document.createElement('a');
                    link.href = imageSrc;
                    link.download = serviceName + '.jpg';
                    document.body.appendChild(link);
                    link.click();
                    document.body.removeChild(link);
                },
                
                showNotification(message) {
                    // You can integrate with your preferred toast notification system
                    alert(message);
                }
            }
        }
    </script>

</x-app-layout>