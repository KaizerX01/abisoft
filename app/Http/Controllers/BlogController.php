<?php

namespace App\Http\Controllers;

use App\Models\BlogPost;
use App\Models\BlogTag;
use Illuminate\Http\Request;

class BlogController extends Controller
{


    public function show(BlogPost $post)
{
    $post->load('tags');
    return view('blog.show', compact('post'));
}


    // Display a list of blog posts with optional tag filtering
    public function index(Request $request)
    {
        $tagIds = $request->query('tag', []);

        $query = BlogPost::with('tags')->latest();

        if (!empty($tagIds)) {
            foreach ($tagIds as $tagId) {
                $query->whereHas('tags', function ($q) use ($tagId) {
                    $q->where('blog_tags.id', $tagId);
                });
            }
        }

        $posts = $query->paginate(6)->appends(['tag' => $tagIds]);
        $tags = BlogTag::all();

        return view('blog.index', compact('posts', 'tags', 'tagIds'));
    }

    // Show the form to create a new blog post
    public function create()
    {
        $tags = BlogTag::all();
        return view('blog.create', compact('tags'));
    }

    // Store the new blog post
   public function store(Request $request)
{
    $validated = $request->validate([
        'title' => 'required|string|max:255',
        'content' => 'required|string',
        'description' => 'nullable|string',
        'image' => 'nullable|image',
        'tags' => 'nullable|array',
        'tags.*' => 'exists:blog_tags,id',
    ]);

    // Handle image upload
    if ($request->hasFile('image')) {
        $validated['image'] = $request->file('image')->store('blog_images', 'public');
    }

    // Create the post
    $post = BlogPost::create([
        'title' => $validated['title'],
        'content' => $validated['content'],
        'description' => $validated['description'] ?? null,
        'image' => $validated['image'] ?? null,
    ]);

    // Attach tags if provided
    if (!empty($validated['tags'])) {
        $post->tags()->sync($validated['tags']);
    }

    return redirect()->route('blog.index')->with('success', 'Article créé avec succès.');
}

    // Show the form to edit a blog post
    public function edit(BlogPost $post)
    {
        $tags = BlogTag::all();
        $selectedTags = $post->tags->pluck('id')->toArray();

        return view('blog.edit', compact('post', 'tags', 'selectedTags'));
    }

    // Update the blog post

    
        public function update(Request $request, BlogPost $post)
        {
            $validated = $request->validate([
                'title' => 'required|string|max:255',
                'content' => 'required|string',
                'description' => 'nullable|string',
                'image' => 'nullable|image',
                'tags' => 'nullable|array',
                'tags.*' => 'exists:blog_tags,id',
            ]);

            // If new image uploaded, delete old one and store new
            if ($request->hasFile('image')) {
                if ($post->image && Storage::disk('public')->exists($post->image)) {
                    Storage::disk('public')->delete($post->image);
                }
                $validated['image'] = $request->file('image')->store('blog_images', 'public');
            }

            $post->update([
                'title' => $validated['title'],
                'content' => $validated['content'],
                'description' => $validated['description'] ?? $post->description,
                'image' => $validated['image'] ?? $post->image,
            ]);

            $post->tags()->sync($validated['tags'] ?? []);

            return redirect()->route('blog.index')->with('success', 'Article mis à jour avec succès.');
        }

    // Delete a blog post
    public function destroy(BlogPost $post)
    {
        $post->tags()->detach();
        $post->delete();

        return redirect()->route('blog.index')->with('success', 'Article supprimé avec succès.');
    }
}
