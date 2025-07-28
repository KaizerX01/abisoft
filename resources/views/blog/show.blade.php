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
        
        .tag-hover {
            transition: all 0.3s ease;
        }
        
        .tag-hover:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .reading-progress {
            position: fixed;
            top: 0;
            left: 0;
            width: 0%;
            height: 4px;
            background: linear-gradient(to right, #667eea, #764ba2);
            z-index: 1000;
            transition: width 0.3s ease;
        }
    </style>

    <div x-data="blogView()" class="space-y-8">
        
        <!-- Reading Progress Bar -->
        <div class="reading-progress" x-ref="progressBar"></div>
        
        <!-- Main Blog Post Section -->
        <div class="max-w-4xl mx-auto">
            
            <!-- Blog Header -->
            <div class="glass-card rounded-2xl p-8 mb-8">
                
                <!-- Tags -->
                @if($post->tags->count() > 0)
                    <div class="flex flex-wrap gap-2 mb-6">
                        @foreach($post->tags as $tag)
                            <span class="tag-hover badge badge-primary badge-lg font-semibold px-4 py-3 text-sm">
                                <i class="fas fa-tag mr-2"></i>{{ $tag->name }}
                            </span>
                        @endforeach
                    </div>
                @endif
                
                <!-- Blog Title -->
                <div class="mb-6">
                    <h1 class="text-4xl md:text-5xl font-black text-gray-800 mb-4 leading-tight">
                        {{ $post->title }}
                    </h1>
                </div>
                
                <!-- Blog Meta Info -->
                <div class="flex flex-wrap items-center gap-6 text-gray-600 mb-6">
                    <div class="flex items-center">
                        <i class="fas fa-calendar-alt mr-2"></i>
                        <span>{{ $post->created_at->format('d M Y') }}</span>
                    </div>
                    <div class="flex items-center">
                        <i class="fas fa-clock mr-2"></i>
                        <span>{{ ceil(str_word_count(strip_tags($post->content)) / 200) }} min de lecture</span>
                    </div>
                    <div class="flex items-center">
                        <i class="fas fa-eye mr-2"></i>
                        <span>1,234 vues</span>
                    </div>
                </div>
                
                <!-- Blog Description -->
                @if($post->description)
                    <div class="text-xl text-gray-700 leading-relaxed font-medium border-l-4 border-indigo-500 pl-6 bg-gray-50 p-4 rounded-r-lg">
                        {{ $post->description }}
                    </div>
                @endif
                
            </div>
            
            <!-- Blog Image Section -->
            @if($post->image)
                <div class="mb-8">
                    <div class="gradient-border">
                        <div class="gradient-border-inner p-4">
                            <div class="relative rounded-lg overflow-hidden">
                                <img src="{{ asset('storage/' . $post->image) }}"
                                     alt="{{ $post->title }}"
                                     class="image-zoom w-full h-auto object-cover rounded-lg"
                                     @click="openImageModal('{{asset('storage/' . $post->image)  }}')" />
                            </div>
                        </div>
                    </div>
                </div>
            @endif
            
            <!-- Blog Content -->
            <div class="glass-card rounded-2xl p-8 mb-8">
                <div class="prose prose-lg max-w-none text-gray-800 leading-relaxed">
                    {!! nl2br(e($post->content)) !!}
                </div>
            </div>
            
            <!-- Share & Actions -->
            <div class="glass-card rounded-2xl p-6 mb-8">
                <div class="flex flex-col sm:flex-row items-center justify-between gap-4">
                    <div class="text-lg font-semibold text-gray-700">
                        <i class="fas fa-heart mr-2 text-red-500"></i>
                        Cet article vous a plu ?
                    </div>
                    <div class="flex space-x-4">
                        <button @click="sharepost()" class="share-button btn btn-outline btn-lg rounded-full">
                            <i class="fas fa-share-alt mr-2"></i>Partager
                        </button>
                        <button class="share-button btn btn-outline btn-lg rounded-full"
                         @click="downloadImage('{{ asset('storage/' . $post->image)  }}', '{{ $post->title }}')">
                            <i class="fas fa-download mr-2"></i>Télécharger
                        </button>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Additional Information Cards -->
        <div class="max-w-6xl mx-auto grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
            
            <!-- Blog Details Card -->
            <div class="info-card glass-card rounded-2xl p-6">
                <h3 class="text-xl font-bold text-gray-800 mb-4 flex items-center">
                    <i class="fas fa-info-circle mr-3 text-blue-500"></i>Détails
                </h3>
                <div class="space-y-4">
                    <div class="flex justify-between items-center py-2 border-b border-gray-100">
                        <span class="text-gray-600">ID Article</span>
                        <span class="font-semibold">#{{ str_pad($post->id, 6, '0', STR_PAD_LEFT) }}</span>
                    </div>
                    <div class="flex justify-between items-center py-2 border-b border-gray-100">
                        <span class="text-gray-600">Mots</span>
                        <span class="font-semibold">{{ str_word_count(strip_tags($post->content)) }}</span>
                    </div>
                    <div class="flex justify-between items-center py-2 border-b border-gray-100">
                        <span class="text-gray-600">Publié le</span>
                        <span class="font-semibold">{{ $post->created_at->format('d/m/Y') }}</span>
                    </div>
                    <div class="flex justify-between items-center py-2">
                        <span class="text-gray-600">Modifié le</span>
                        <span class="font-semibold">{{ $post->updated_at->format('d/m/Y') }}</span>
                    </div>
                </div>
            </div>
            
            <!-- Engagement Card -->
            <div class="info-card glass-card rounded-2xl p-6">
                <h3 class="text-xl font-bold text-gray-800 mb-4 flex items-center">
                    <i class="fas fa-heart mr-3 text-red-500"></i>Engagement
                </h3>
                <div class="space-y-4">
                    <div class="flex justify-between items-center">
                        <span class="text-gray-600">Vues</span>
                        <span class="font-bold text-blue-600">1,234</span>
                    </div>
                    <div class="flex justify-between items-center">
                        <span class="text-gray-600">Partages</span>
                        <span class="font-bold text-green-600">89</span>
                    </div>
                    <div class="flex justify-between items-center">
                        <span class="text-gray-600">Commentaires</span>
                        <span class="font-bold text-purple-600">23</span>
                    </div>
                    <div class="flex justify-between items-center">
                        <span class="text-gray-600">J'aime</span>
                        <span class="font-bold text-red-600">156</span>
                    </div>
                </div>
                <div class="mt-4 pt-4 border-t border-gray-100">
                    <button class="btn btn-outline btn-block rounded-full">
                        <i class="fas fa-thumbs-up mr-2"></i>J'aime cet article
                    </button>
                </div>
            </div>
            
            <!-- Blog Features Card -->
            <div class="info-card glass-card rounded-2xl p-6">
                <h3 class="text-xl font-bold text-gray-800 mb-4 flex items-center">
                    <i class="fas fa-newspaper mr-3 text-green-500"></i>Informations
                </h3>
                <div class="space-y-4">
                    <div class="flex items-center space-x-3">
                        <div class="w-3 h-3 bg-green-500 rounded-full animate-pulse"></div>
                        <span class="font-semibold text-green-600">Article publié</span>
                    </div>
                    <div class="text-sm text-gray-600">
                        <i class="fas fa-clock mr-2"></i>
                        Lecture {{ ceil(str_word_count(strip_tags($post->content)) / 200) }} minutes
                    </div>
                    <div class="text-sm text-gray-600">
                        <i class="fas fa-mobile-alt mr-2"></i>
                        Optimisé mobile
                    </div>
                    <div class="text-sm text-gray-600">
                        <i class="fas fa-share-alt mr-2"></i>
                        Partageable
                    </div>
                    <div class="text-sm text-gray-600">
                        <i class="fas fa-bookmark mr-2"></i>
                        Sauvegardable
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Related Blog Posts Section -->
        <div class="max-w-6xl mx-auto glass-card rounded-2xl p-8">
            <h3 class="text-2xl font-bold text-gray-800 mb-6 flex items-center">
                <i class="fas fa-newspaper mr-3 text-purple-500"></i>
                Articles similaires
            </h3>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @php
                    // Get similar blog posts (excluding current post)
                    $relatedPosts = App\Models\BlogPost::where('id', '!=', $post->id)
                                                      ->latest()
                                                      ->take(3)
                                                      ->get();
                @endphp
                
                @forelse($relatedPosts as $relatedPost)
                    <a href="{{ route('blog.show', $relatedPost) }}" 
                       class="card bg-white shadow-lg hover:shadow-xl transition-all duration-300 hover:-translate-y-2 group">
                        <figure class="relative h-48 overflow-hidden">
                            @if($relatedPost->image)
                                <img src="{{asset('storage/' . $relatedPost->image)  }}" 
                                     alt="{{ $relatedPost->title }}"
                                     class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-300" />
                            @else
                                <div class="w-full h-full bg-gray-100 flex items-center justify-center">
                                    <i class="fas fa-newspaper text-4xl text-gray-400"></i>
                                </div>
                            @endif
                        </figure>
                        <div class="card-body p-6">
                            <h4 class="card-title text-lg font-bold line-clamp-2 mb-2">{{ $relatedPost->title }}</h4>
                            @if($relatedPost->description)
                                <p class="text-gray-600 text-sm line-clamp-2 mb-3">{{ $relatedPost->description }}</p>
                            @endif
                            <div class="flex items-center text-sm text-gray-500">
                                <i class="fas fa-calendar mr-2"></i>
                                {{ $relatedPost->created_at->format('d M Y') }}
                            </div>
                        </div>
                    </a>
                @empty
                    <div class="col-span-full text-center py-8 text-gray-500">
                        <i class="fas fa-newspaper text-4xl mb-4"></i>
                        <p>Aucun article similaire trouvé</p>
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
                     alt="{{ $post->title }}"
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
        function blogView() {
            return {
                showImageModal: false,
                modalImage: '',
                
                init() {
                    // Initialize reading progress
                    this.updateReadingProgress();
                    window.addEventListener('scroll', () => this.updateReadingProgress());
                },
                
                updateReadingProgress() {
                    const winScroll = document.body.scrollTop || document.documentElement.scrollTop;
                    const height = document.documentElement.scrollHeight - document.documentElement.clientHeight;
                    const scrolled = (winScroll / height) * 100;
                    this.$refs.progressBar.style.width = scrolled + '%';
                },
                
                openImageModal(imageSrc) {
                    this.modalImage = imageSrc;
                    this.showImageModal = true;
                    document.body.style.overflow = 'hidden';
                },
                
                closeImageModal() {
                    this.showImageModal = false;
                    document.body.style.overflow = 'auto';
                },
                
                sharepost() {
                    if (navigator.share) {
                        navigator.share({
                            title: '{{ $post->title }}',
                            text: '{{ $post->description }}',
                            url: window.location.href,
                        });
                    } else {
                        // Fallback: copy to clipboard
                        navigator.clipboard.writeText(window.location.href).then(() => {
                            this.showNotification('Lien copié dans le presse-papiers!');
                        });
                    }
                },
                
                downloadImage(imageSrc, blogTitle) {
                    if (imageSrc && imageSrc !== '{{ asset('storage/') }}') {
                        const link = document.createElement('a');
                        link.href = imageSrc;
                        link.download = blogTitle + '.jpg';
                        document.body.appendChild(link);
                        link.click();
                        document.body.removeChild(link);
                    }
                },
                
                showNotification(message) {
                    // You can integrate with your preferred toast notification system
                    alert(message);
                }
            }
        }
    </script>

</x-app-layout>