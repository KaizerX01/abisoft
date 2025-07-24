<?php

namespace App\Http\Controllers;

use App\Models\BlogPost;
use App\Models\BlogTag;
use Illuminate\Http\Request;

class BlogController extends Controller
{
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
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'tags' => 'nullable|array',
            'tags.*' => 'exists:blog_tags,id',
        ]);

        $post = BlogPost::create([
            'title' => $request->title,
            'content' => $request->content,
        ]);

        if ($request->has('tags')) {
            $post->tags()->sync($request->tags);
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
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'tags' => 'nullable|array',
            'tags.*' => 'exists:blog_tags,id',
        ]);

        $post->update([
            'title' => $request->title,
            'content' => $request->content,
        ]);

        $post->tags()->sync($request->tags ?? []);

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
