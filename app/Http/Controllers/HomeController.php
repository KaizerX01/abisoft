<?php

namespace App\Http\Controllers;

use App\Models\Formation;
use App\Models\Partner;
use App\Models\Product;
use App\Models\Service;
use App\Models\Setting;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $products = Product::latest()->take(6)->get();
        $services = Service::latest()->take(6)->get();
        $formations = Formation::latest()->take(6)->get();
        $partners = Partner::all();
        $settings = Setting::first();

        return view('home', compact('products', 'services', 'formations', 'partners', 'settings'));
    }

    public function about()
    {
        return view('pages.about');
    }
}
