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

    <div x-data="formationView()" class="space-y-8">
        
        <!-- Main Formation Section -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
            
            <!-- Formation Image Section -->
            <div class="space-y-6">
                <div class="gradient-border">
                    <div class="gradient-border-inner p-4">
                        <div class="relative aspect-square rounded-lg overflow-hidden bg-gradient-to-br from-gray-100 to-gray-200">
                            @if($formation->image)
                                <img src="{{ asset('storage/' . $formation->image) }}"
                                     alt="{{ $formation->name }}"
                                     class="image-zoom w-full h-full object-cover rounded-lg"
                                     @click="openImageModal('{{asset('storage/' . $formation->image)  }}')" />
                            @else
                                <div class="w-full h-full flex items-center justify-center">
                                    <div class="text-center">
                                        <i class="fas fa-graduation-cap text-8xl text-gray-400 mb-4"></i>
                                        <p class="text-gray-500 text-lg">Aucune image disponible</p>
                                    </div>
                                </div>
                            @endif
                            
                            
                        </div>
                    </div>
                </div>
                
                <!-- Share & Actions -->
                <div class="flex justify-center space-x-4">
                    <button @click="shareFormation()" class="share-button btn btn-outline btn-lg rounded-full">
                        <i class="fas fa-share-alt mr-2"></i>Partager
                    </button>
                    <button class="share-button btn btn-outline btn-lg rounded-full"
                     @click="downloadImage('{{ asset('storage/' . $formation->image)  }}', '{{ $formation->name }}')">
                        <i class="fas fa-download mr-2"></i>Télécharger
                    </button>
                 
                    
                </div>
            </div>
            
            <!-- Formation Details Section -->
            <div class="space-y-8">
                
                <!-- Category Badge -->
                <div class="flex justify-start">
                    <div class="floating-animation badge badge-primary badge-lg font-semibold px-4 py-3 text-base">
                        <i class="fas fa-bookmark mr-2"></i>{{ $formation->category?->name ?? 'Aucune catégorie' }}
                    </div>
                </div>
                
                <!-- Formation Title -->
                <div>
                    <h1 class="text-4xl md:text-5xl font-black text-gray-800 mb-4 leading-tight">
                        {{ $formation->name }}
                    </h1>
                </div>
                
                <!-- Price Section -->
                <div class="price-glow glass-card rounded-2xl p-6 text-center">
                    <div class="text-sm text-gray-600 mb-2">Prix de la formation</div>
                    <div class="text-5xl font-black text-green-600 mb-2">
                        {{ number_format($formation->price, 2) }} MAD
                    </div>
                    <div class="text-sm text-gray-500">TVA incluse</div>
                </div>
                
                <!-- Formation Description -->
                @if($formation->description)
                    <div class="glass-card rounded-2xl p-6">
                        <h3 class="text-xl font-bold text-gray-800 mb-4 flex items-center">
                            <i class="fas fa-align-left mr-3 text-indigo-500"></i>Description
                        </h3>
                        <div class="prose prose-lg text-gray-700 leading-relaxed">
                            {{ $formation->description }}
                        </div>
                    </div>
                @endif
                
                <!-- Action Buttons -->
                <div class="flex flex-col sm:flex-row gap-4">
                    <button class="btn btn-primary btn-lg flex-1 rounded-2xl font-bold text-lg hover:scale-105 transition-transform duration-200">
                        <i class="fas fa-play-circle mr-3 text-xl"></i>
                        Commencer la formation
                    </button>
                    <button class="btn btn-secondary btn-lg flex-1 rounded-2xl font-bold text-lg hover:scale-105 transition-transform duration-200">
                        <i class="fas fa-credit-card mr-3 text-xl"></i>
                        S'inscrire maintenant
                    </button>
                </div>
            </div>
        </div>
        
        <!-- Additional Information Cards -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            
            <!-- Formation Details Card -->
            <div class="info-card glass-card rounded-2xl p-6">
                <h3 class="text-xl font-bold text-gray-800 mb-4 flex items-center">
                    <i class="fas fa-info-circle mr-3 text-blue-500"></i>Détails
                </h3>
                <div class="space-y-4">
                    <div class="flex justify-between items-center py-2 border-b border-gray-100">
                        <span class="text-gray-600">ID Formation</span>
                        <span class="font-semibold">#{{ str_pad($formation->id, 6, '0', STR_PAD_LEFT) }}</span>
                    </div>
                    <div class="flex justify-between items-center py-2 border-b border-gray-100">
                        <span class="text-gray-600">Catégorie</span>
                        <span class="font-semibold">{{ $formation->category?->name ?? 'Non définie' }}</span>
                    </div>
                    <div class="flex justify-between items-center py-2 border-b border-gray-100">
                        <span class="text-gray-600">Date d'ajout</span>
                        <span class="font-semibold">{{ $formation->created_at->format('d/m/Y') }}</span>
                    </div>
                    <div class="flex justify-between items-center py-2">
                        <span class="text-gray-600">Dernière MAJ</span>
                        <span class="font-semibold">{{ $formation->updated_at->format('d/m/Y') }}</span>
                    </div>
                </div>
            </div>
            
            <!-- Rating & Reviews Card -->
            <div class="info-card glass-card rounded-2xl p-6">
                <h3 class="text-xl font-bold text-gray-800 mb-4 flex items-center">
                    <i class="fas fa-star mr-3 text-yellow-500"></i>Évaluations
                </h3>
                <div class="text-center mb-4">
                    <div class="text-3xl font-bold text-gray-800 mb-2">4.9</div>
                    <div class="rating rating-lg mb-2">
                        <input type="radio" class="mask mask-star-2 bg-yellow-400" disabled checked />
                        <input type="radio" class="mask mask-star-2 bg-yellow-400" disabled checked />
                        <input type="radio" class="mask mask-star-2 bg-yellow-400" disabled checked />
                        <input type="radio" class="mask mask-star-2 bg-yellow-400" disabled checked />
                        <input type="radio" class="mask mask-star-2 bg-yellow-400" disabled checked />
                    </div>
                    <div class="text-sm text-gray-500">Basé sur 89 avis</div>
                </div>
                <button class="btn btn-outline btn-block rounded-full">
                    <i class="fas fa-comment mr-2"></i>Voir les avis
                </button>
            </div>
            
            <!-- Formation Features Card -->
            <div class="info-card glass-card rounded-2xl p-6">
                <h3 class="text-xl font-bold text-gray-800 mb-4 flex items-center">
                    <i class="fas fa-graduation-cap mr-3 text-green-500"></i>Caractéristiques
                </h3>
                <div class="space-y-4">
                    <div class="flex items-center space-x-3">
                        <div class="w-3 h-3 bg-green-500 rounded-full animate-pulse"></div>
                        <span class="font-semibold text-green-600">Accès immédiat</span>
                    </div>
                    <div class="text-sm text-gray-600">
                        <i class="fas fa-infinity mr-2"></i>
                        Accès à vie
                    </div>
                    <div class="text-sm text-gray-600">
                        <i class="fas fa-certificate mr-2"></i>
                        Certificat inclus
                    </div>
                    <div class="text-sm text-gray-600">
                        <i class="fas fa-mobile-alt mr-2"></i>
                        Compatible mobile
                    </div>
                    <div class="text-sm text-gray-600">
                        <i class="fas fa-headset mr-2"></i>
                        Support instructeur
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Related Formations Section -->
        <div class="glass-card rounded-2xl p-8">
            <h3 class="text-2xl font-bold text-gray-800 mb-6 flex items-center">
                <i class="fas fa-layer-group mr-3 text-purple-500"></i>
                Formations similaires
            </h3>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                @php
                    // Get similar formations (same category, excluding current formation)
                    $relatedFormations = App\Models\Formation::where('category_formation_id', $formation->category_formation_id)
                                                        ->where('id', '!=', $formation->id)
                                                        ->take(4)
                                                        ->get();
                @endphp
                
                @forelse($relatedFormations as $relatedFormation)
                    <a href="{{ route('formations.show', $relatedFormation) }}" 
                       class="card bg-white shadow-lg hover:shadow-xl transition-all duration-300 hover:-translate-y-2 group">
                        <figure class="relative h-32 overflow-hidden">
                            @if($relatedFormation->image)
                                <img src="{{asset('storage/' . $relatedFormation->image)  }}" 
                                     alt="{{ $relatedFormation->name }}"
                                     class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-300" />
                            @else
                                <div class="w-full h-full bg-gray-100 flex items-center justify-center">
                                    <i class="fas fa-graduation-cap text-2xl text-gray-400"></i>
                                </div>
                            @endif
                        </figure>
                        <div class="card-body p-4">
                            <h4 class="card-title text-sm font-semibold line-clamp-2">{{ $relatedFormation->name }}</h4>
                            <div class="text-lg font-bold text-green-600">{{ number_format($relatedFormation->price, 2) }} MAD</div>
                        </div>
                    </a>
                @empty
                    <div class="col-span-full text-center py-8 text-gray-500">
                        <i class="fas fa-graduation-cap text-4xl mb-4"></i>
                        <p>Aucune formation similaire trouvée</p>
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
                     alt="{{ $formation->name }}"
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
        function formationView() {
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
                
                shareFormation() {
                    if (navigator.share) {
                        navigator.share({
                            title: '{{ $formation->name }}',
                            text: '{{ $formation->description }}',
                            url: window.location.href,
                        });
                    } else {
                        // Fallback: copy to clipboard
                        navigator.clipboard.writeText(window.location.href).then(() => {
                            this.showNotification('Lien copié dans le presse-papiers!');
                        });
                    }
                },
                
                downloadImage(imageSrc, formationName) {
                    const link = document.createElement('a');
                    link.href = imageSrc;
                    link.download = formationName + '.jpg';
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