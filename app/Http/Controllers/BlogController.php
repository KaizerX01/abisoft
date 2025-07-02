<?php

namespace App\Http\Controllers;

use App\Models\BlogPost;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index(){
        $posts = BlogPost::latest()->paginate(6);
        return view("blog.index",compact("posts"));
    }
}
