<?php

namespace App\Http\Controllers;

use App\Models\BlogPost;
use App\Models\Formation;
use App\Models\Partner;
use App\Models\Product;
use App\Models\Service;
use App\Models\Setting;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        return view('admin.index', [
            'products' => Product::latest()->get(),
            'services' => Service::latest()->get(),
            'formations' => Formation::latest()->get(),
            'blogs' => BlogPost::latest()->get(),
            'users' => User::latest()->get(),
            'partners' => Partner::latest()->get(),
            'settings' => Setting::first() // Assuming you want a single settings record
        ]);
    }

    public function getStats()
    {
        return response()->json([
            'products_count' => Product::count(),
            'services_count' => Service::count(),
            'formations_count' => Formation::count(),
            'blogs_count' => BlogPost::count(),
            'users_count' => User::count(),
            'partners_count' => Partner::count(),
            'recent_activities' => $this->getRecentActivities()
        ]);
    }

    private function getRecentActivities()
    {
        $activities = collect();

        // Get recent products
        Product::latest()->take(3)->get()->each(function($item) use ($activities) {
            $activities->push([
                'type' => 'product',
                'title' => "Nouveau produit: {$item->name}",
                'date' => $item->created_at,
                'icon' => 'fa-box',
                'color' => 'text-cyan-500'
            ]);
        });

        // Get recent services
        Service::latest()->take(3)->get()->each(function($item) use ($activities) {
            $activities->push([
                'type' => 'service',
                'title' => "Nouveau service: {$item->name}",
                'date' => $item->created_at,
                'icon' => 'fa-screwdriver-wrench',
                'color' => 'text-blue-500'
            ]);
        });

        // Get recent formations
        Formation::latest()->take(3)->get()->each(function($item) use ($activities) {
            $activities->push([
                'type' => 'formation',
                'title' => "Nouvelle formation: {$item->name}",
                'date' => $item->created_at,
                'icon' => 'fa-chalkboard-user',
                'color' => 'text-indigo-500'
            ]);
        });

        // Get recent blog posts
        BlogPost::latest()->take(3)->get()->each(function($item) use ($activities) {
            $activities->push([
                'type' => 'blog',
                'title' => "Nouvel article: {$item->title}",
                'date' => $item->created_at,
                'icon' => 'fa-newspaper',
                'color' => 'text-purple-500'
            ]);
        });

        // Get recent partners
        Partner::latest()->take(3)->get()->each(function($item) use ($activities) {
            $activities->push([
                'type' => 'partner',
                'title' => "Nouveau partenaire: {$item->name}",
                'date' => $item->created_at,
                'icon' => 'fa-handshake',
                'color' => 'text-green-500'
            ]);
        });

        // Get recent users
        User::latest()->take(3)->get()->each(function($item) use ($activities) {
            $activities->push([
                'type' => 'user',
                'title' => "Nouvel utilisateur: {$item->name}",
                'date' => $item->created_at,
                'icon' => 'fa-user',
                'color' => 'text-red-500'
            ]);
        });

        return $activities->sortByDesc('date')->take(10)->values();
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
