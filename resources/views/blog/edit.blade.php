<x-app-layout>
    <div class="max-w-4xl mx-auto bg-white shadow-xl rounded-2xl p-10 mt-10">
        <h1 class="text-4xl font-bold text-gray-800 mb-8">✏️ Edit Blog Post</h1>

        <form action="{{ route('blog.update', $post->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf
            @method('PUT')

            <!-- Title -->
            <div>
                <label class="label font-semibold text-gray-700">Title</label>
                <input 
                    type="text" 
                    name="title" 
                    value="{{ old('title', $post->title) }}" 
                    required 
                    class="input input-bordered w-full bg-white text-gray-800 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500"
                />
            </div>

            <!-- Current Image + Upload -->
            <div>
                <label class="label font-semibold text-gray-700">Current Image</label>
                @if($post->image)
                    <img src="{{ asset('storage/' . $post->image) }}" alt="Blog Image" class="w-40 rounded-md mb-2">
                @else
                    <p class="text-sm text-gray-500">No image uploaded.</p>
                @endif
                <input 
                    type="file" 
                    name="image" 
                    class="file-input file-input-bordered w-full bg-white text-gray-800 hover:cursor-pointer"
                />
            </div>

            <!-- Description -->
            <div>
                <label class="label font-semibold text-gray-700">Short Description</label>
                <textarea 
                    name="description" 
                    rows="3" 
                    placeholder="Update the short description..." 
                    class="textarea textarea-bordered w-full bg-white text-gray-800 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500"
                >{{ old('description', $post->description) }}</textarea>
            </div>

            <!-- Content -->
            <div>
                <label class="label font-semibold text-gray-700">Content</label>
                <textarea 
                    name="content" 
                    rows="8" 
                    required 
                    placeholder="Update blog content..." 
                    class="textarea textarea-bordered w-full bg-white text-gray-800 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500"
                >{{ old('content', $post->content) }}</textarea>
            </div>

            <!-- Tags (BIG dropdown) -->
            <div>
                <label class="label font-semibold text-gray-700">Tags</label>
                <select 
                    name="tags[]" 
                    multiple 
                    size="6"
                    class="select select-bordered w-full bg-white text-gray-800 h-48 overflow-y-auto focus:outline-none focus:ring-2 focus:ring-blue-500"
                >
                    @foreach ($tags as $tag)
                        <option value="{{ $tag->id }}" {{ in_array($tag->id, $post->tags->pluck('id')->toArray()) ? 'selected' : '' }}>
                            {{ $tag->name }}
                        </option>
                    @endforeach
                </select>
                <small class="text-gray-500 block mt-1">Hold <kbd class="kbd kbd-sm">Ctrl</kbd> or <kbd class="kbd kbd-sm">Cmd</kbd> to select multiple</small>
            </div>

            <!-- Update Button -->
            <div class="pt-4">
                <button 
                    type="submit" 
                    class="btn bg-green-600 text-white px-8 py-2 rounded-md hover:bg-green-700 transition-all duration-200 shadow-md"
                >
                    💾 Update
                </button>
            </div>
        </form>
    </div>
</x-app-layout>
