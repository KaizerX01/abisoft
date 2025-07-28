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

    <div x-data="productView()" class="space-y-8">
        
        <!-- Main Product Section -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
            
            <!-- Product Image Section -->
            <div class="space-y-6">
                <div class="gradient-border">
                    <div class="gradient-border-inner p-4">
                        <div class="relative aspect-square rounded-lg overflow-hidden bg-gradient-to-br from-gray-100 to-gray-200">
                            @if($product->image)
                                <img src="{{ asset('storage/' . $product->image) }}""
                                     alt="{{ $product->name }}"
                                     class="image-zoom w-full h-full object-cover rounded-lg"
                                     @click="openImageModal('{{asset('storage/' . $product->image)  }}')" />
                            @else
                                <div class="w-full h-full flex items-center justify-center">
                                    <div class="text-center">
                                        <i class="fas fa-image text-8xl text-gray-400 mb-4"></i>
                                        <p class="text-gray-500 text-lg">Aucune image disponible</p>
                                    </div>
                                </div>
                            @endif
                            
                            
                        </div>
                    </div>
                </div>
                
                <!-- Share & Actions -->
                <div class="flex justify-center space-x-4">
                    <button @click="shareProduct()" class="share-button btn btn-outline btn-lg rounded-full">
                        <i class="fas fa-share-alt mr-2"></i>Partager
                    </button>
                    <button class="share-button btn btn-outline btn-lg rounded-full"
                     @click="downloadImage('{{ asset('storage/' . $product->image)  }}', '{{ $product->name }}')">
                        <i class="fas fa-heart mr-2"></i>Download
                    </button>
                 
                    
                </div>
            </div>
            
            <!-- Product Details Section -->
            <div class="space-y-8">
                
                <!-- Category Badge -->
                <div class="flex justify-start">
                    <div class="floating-animation badge badge-primary badge-lg font-semibold px-4 py-3 text-base">
                        <i class="fas fa-tag mr-2"></i>{{ $product->category->name }}
                    </div>
                </div>
                
                <!-- Product Title -->
                <div>
                    <h1 class="text-4xl md:text-5xl font-black text-gray-800 mb-4 leading-tight">
                        {{ $product->name }}
                    </h1>
                </div>
                
                <!-- Price Section -->
                <div class="price-glow glass-card rounded-2xl p-6 text-center">
                    <div class="text-sm text-gray-600 mb-2">Prix du produit</div>
                    <div class="text-5xl font-black text-green-600 mb-2">
                        {{ number_format($product->price, 2) }} MAD
                    </div>
                    <div class="text-sm text-gray-500">TVA incluse</div>
                </div>
                
                <!-- Product Description -->
                @if($product->description)
                    <div class="glass-card rounded-2xl p-6">
                        <h3 class="text-xl font-bold text-gray-800 mb-4 flex items-center">
                            <i class="fas fa-align-left mr-3 text-indigo-500"></i>Description
                        </h3>
                        <div class="prose prose-lg text-gray-700 leading-relaxed">
                            {{ $product->description }}
                        </div>
                    </div>
                @endif
                
                <!-- Action Buttons -->
                <div class="flex flex-col sm:flex-row gap-4">
                    <button class="btn btn-primary btn-lg flex-1 rounded-2xl font-bold text-lg hover:scale-105 transition-transform duration-200">
                        <i class="fas fa-shopping-cart mr-3 text-xl"></i>
                        Ajouter au panier
                    </button>
                    <button class="btn btn-secondary btn-lg flex-1 rounded-2xl font-bold text-lg hover:scale-105 transition-transform duration-200">
                        <i class="fas fa-bolt mr-3 text-xl"></i>
                        Acheter maintenant
                    </button>
                </div>
            </div>
        </div>
        
        <!-- Additional Information Cards -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            
            <!-- Product Details Card -->
            <div class="info-card glass-card rounded-2xl p-6">
                <h3 class="text-xl font-bold text-gray-800 mb-4 flex items-center">
                    <i class="fas fa-info-circle mr-3 text-blue-500"></i>Détails
                </h3>
                <div class="space-y-4">
                    <div class="flex justify-between items-center py-2 border-b border-gray-100">
                        <span class="text-gray-600">ID Produit</span>
                        <span class="font-semibold">#{{ str_pad($product->id, 6, '0', STR_PAD_LEFT) }}</span>
                    </div>
                    <div class="flex justify-between items-center py-2 border-b border-gray-100">
                        <span class="text-gray-600">Catégorie</span>
                        <span class="font-semibold">{{ $product->category->name }}</span>
                    </div>
                    <div class="flex justify-between items-center py-2 border-b border-gray-100">
                        <span class="text-gray-600">Date d'ajout</span>
                        <span class="font-semibold">{{ $product->created_at->format('d/m/Y') }}</span>
                    </div>
                    <div class="flex justify-between items-center py-2">
                        <span class="text-gray-600">Dernière MAJ</span>
                        <span class="font-semibold">{{ $product->updated_at->format('d/m/Y') }}</span>
                    </div>
                </div>
            </div>
            
            <!-- Rating & Reviews Card -->
            <div class="info-card glass-card rounded-2xl p-6">
                <h3 class="text-xl font-bold text-gray-800 mb-4 flex items-center">
                    <i class="fas fa-star mr-3 text-yellow-500"></i>Évaluations
                </h3>
                <div class="text-center mb-4">
                    <div class="text-3xl font-bold text-gray-800 mb-2">4.8</div>
                    <div class="rating rating-lg mb-2">
                        <input type="radio" class="mask mask-star-2 bg-yellow-400" disabled checked />
                        <input type="radio" class="mask mask-star-2 bg-yellow-400" disabled checked />
                        <input type="radio" class="mask mask-star-2 bg-yellow-400" disabled checked />
                        <input type="radio" class="mask mask-star-2 bg-yellow-400" disabled checked />
                        <input type="radio" class="mask mask-star-2 bg-yellow-400" disabled />
                    </div>
                    <div class="text-sm text-gray-500">Basé sur 127 avis</div>
                </div>
                <button class="btn btn-outline btn-block rounded-full">
                    <i class="fas fa-comment mr-2"></i>Voir les avis
                </button>
            </div>
            
            <!-- Availability Card -->
            <div class="info-card glass-card rounded-2xl p-6">
                <h3 class="text-xl font-bold text-gray-800 mb-4 flex items-center">
                    <i class="fas fa-truck mr-3 text-green-500"></i>Disponibilité
                </h3>
                <div class="space-y-4">
                    <div class="flex items-center space-x-3">
                        <div class="w-3 h-3 bg-green-500 rounded-full animate-pulse"></div>
                        <span class="font-semibold text-green-600">En stock</span>
                    </div>
                    <div class="text-sm text-gray-600">
                        <i class="fas fa-shipping-fast mr-2"></i>
                        Prêt à l'emploi
                    </div>
                    <div class="text-sm text-gray-600">
                        <i class="fas fa-undo mr-2"></i>
                        Accès à vie
                    </div>
                    <div class="text-sm text-gray-600">
                        <i class="fas fa-shield-alt mr-2"></i>
                        Support client 24/7
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Related Products Section -->
        <div class="glass-card rounded-2xl p-8">
            <h3 class="text-2xl font-bold text-gray-800 mb-6 flex items-center">
                <i class="fas fa-layer-group mr-3 text-purple-500"></i>
                Produits similaires
            </h3>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                @php
                    // Get similar products (same category, excluding current product)
                    $relatedProducts = App\Models\Product::where('category_product_id', $product->category_product_id)
                                                        ->where('id', '!=', $product->id)
                                                        ->take(4)
                                                        ->get();
                @endphp
                
                @forelse($relatedProducts as $relatedProduct)
                    <a href="{{ route('products.show', $relatedProduct) }}" 
                       class="card bg-white shadow-lg hover:shadow-xl transition-all duration-300 hover:-translate-y-2 group">
                        <figure class="relative h-32 overflow-hidden">
                            @if($relatedProduct->image)
                                <img src="{{asset('storage/' . $product->image)  }}" 
                                     alt="{{ $relatedProduct->name }}"
                                     class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-300" />
                            @else
                                <div class="w-full h-full bg-gray-100 flex items-center justify-center">
                                    <i class="fas fa-image text-2xl text-gray-400"></i>
                                </div>
                            @endif
                        </figure>
                        <div class="card-body p-4">
                            <h4 class="card-title text-sm font-semibold line-clamp-2">{{ $relatedProduct->name }}</h4>
                            <div class="text-lg font-bold text-green-600">{{ number_format($relatedProduct->price, 2) }} MAD</div>
                        </div>
                    </a>
                @empty
                    <div class="col-span-full text-center py-8 text-gray-500">
                        <i class="fas fa-box-open text-4xl mb-4"></i>
                        <p>Aucun produit similaire trouvé</p>
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
                     alt="{{ $product->name }}"
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
        function productView() {
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
                
                shareProduct() {
                    if (navigator.share) {
                        navigator.share({
                            title: '{{ $product->name }}',
                            text: '{{ $product->description }}',
                            url: window.location.href,
                        });
                    } else {
                        // Fallback: copy to clipboard
                        navigator.clipboard.writeText(window.location.href).then(() => {
                            this.showNotification('Lien copié dans le presse-papiers!');
                        });
                    }
                },
                
                downloadImage(imageSrc, productName) {
                    const link = document.createElement('a');
                    link.href = imageSrc;
                    link.download = productName + '.jpg';
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