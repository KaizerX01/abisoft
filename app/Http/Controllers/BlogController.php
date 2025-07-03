<?php

namespace App\Http\Controllers;

use App\Models\BlogPost;
use App\Models\BlogTag;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index(Request $request)
{
    $tagIds = $request->query('tag', []); // default to empty array

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

}
