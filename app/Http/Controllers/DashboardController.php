<?php

namespace App\Http\Controllers;

use App\Models\BlogPost;
use App\Models\Formation;
use App\Models\Product;
use App\Models\Service;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        return view('admin.index', [
            'products' => Product::all(),
            'services' => Service::all(),
            'formations' => Formation::all(),
            'blogs'     => BlogPost::all(),
            'users'     => User::all()
        ]);
    }

    public function manage()
{
    return view('admin.manage', [
        'products' => Product::with('category')->get(),
        'services' => Service::with('category')->get(),
        'formations' => Formation::with('category')->get(),
        'posts' => BlogPost::latest()->take(3)->get(),
    ]);
}
}
