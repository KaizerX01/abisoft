<?php

namespace App\Http\Controllers;

use App\Models\CategoryService;
use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index(Request $request)
    {
        $categoryId = $request->query("category");
        $search = $request->query("search");
        $sort = $request->query("sort");
        
        // Get categories with product count
        $categories = CategoryService::withCount('services')->get();
        
        // Build the query
        $query = Service::with('category');
        
        // Apply category filter
        if ($categoryId) {
            $query->where('category_service_id', $categoryId);
        }
        
        // Apply search filter
        if ($search) {
            $query->where(function($q) use ($search) {
                $q->where('name', 'like', '%' . $search . '%')
                  ->orWhere('description', 'like', '%' . $search . '%');
            });
        }
        
        // Apply sorting
        switch ($sort) {
            case 'name_asc':
                $query->orderBy('name', 'asc');
                break;
            case 'name_desc':
                $query->orderBy('name', 'desc');
                break;
            case 'price_asc':
                $query->orderBy('price', 'asc');
                break;
            case 'price_desc':
                $query->orderBy('price', 'desc');
                break;
            case 'newest':
                $query->orderBy('created_at', 'desc');
                break;
            default:
                $query->orderBy('created_at', 'desc');
                break;
        }
        
        // Paginate results (12 products per page)
        $services = $query->paginate(12)->withQueryString();
        
        return view('services.index', compact('services', 'categories', 'categoryId'));
    }
    
}
