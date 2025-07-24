<x-app-layout>
    <div class="max-w-4xl mx-auto bg-white shadow-xl rounded-2xl p-10 mt-10">
        <h1 class="text-4xl font-bold text-gray-800 mb-8">📝 Create Blog Post</h1>

        <form action="{{ route('blog.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf

            <!-- Title -->
            <div>
                <label class="label font-semibold text-gray-700">Title</label>
                <input 
                    type="text" 
                    name="title" 
                    placeholder="Enter blog title..." 
                    value="{{ old('title') }}" 
                    required 
                    class="input input-bordered w-full bg-white text-gray-800 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500"
                />
            </div>

            <!-- Image Upload -->
            <div>
                <label class="label font-semibold text-gray-700">Image</label>
                <input 
                    type="file" 
                    name="image" 
                    class="file-input file-input-bordered w-full bg-white text-gray-800 hover:cursor-pointer"
                />
            </div>

            <!-- Short Description -->
            <div>
                <label class="label font-semibold text-gray-700">Short Description</label>
                <textarea 
                    name="description" 
                    rows="3" 
                    placeholder="Write a short description for your blog..." 
                    class="textarea textarea-bordered w-full bg-white text-gray-800 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500"
                >{{ old('description') }}</textarea>
            </div>

            <!-- Content -->
            <div>
                <label class="label font-semibold text-gray-700">Content</label>
                <textarea 
                    name="content" 
                    rows="8" 
                    placeholder="Write your full blog content here..." 
                    required 
                    class="textarea textarea-bordered w-full bg-white text-gray-800 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500"
                >{{ old('content') }}</textarea>
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
                        <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                    @endforeach
                </select>
                <small class="text-gray-500 block mt-1">Hold <kbd class="kbd kbd-sm">Ctrl</kbd> or <kbd class="kbd kbd-sm">Cmd</kbd> to select multiple</small>
            </div>

            <!-- Submit -->
            <div class="pt-4">
                <button 
                    type="submit" 
                    class="btn bg-blue-600 text-white px-8 py-2 rounded-md hover:bg-blue-700 transition-all duration-200 shadow-md"
                >
                    🚀 Create
                </button>
            </div>
        </form>
    </div>
</x-app-layout>
