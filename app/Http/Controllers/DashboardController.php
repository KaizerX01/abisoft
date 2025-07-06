<?php

namespace App\Http\Controllers;

use App\Models\BlogPost;
use App\Models\Formation;
use App\Models\Product;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
{

    
    return view('dashboard', [
        'productsCount' => Product::count(),
        'servicesCount' => Service::count(),
        'formationsCount' => Formation::count(),
        'blogPostsCount' => BlogPost::count(),

        'featuredProducts' => Product::latest()->take(2)->get(),
        'services' => Service::latest()->take(3)->get(),
        'formations' => Formation::latest()->take(3)->get(), 
        'blogs' => BlogPost::latest()->take(3)->get(),
        'user' => Auth::user(),
    ]);
}
}
