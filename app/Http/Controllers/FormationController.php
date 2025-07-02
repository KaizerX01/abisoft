<?php

namespace App\Http\Controllers;

use App\Models\CategoryFormation;
use App\Models\Formation;
use Illuminate\Http\Request;

class FormationController extends Controller
{
    public function index(Request $request)
    {
        $categoryId = $request->query("category");
        $search = $request->query("search");
        $sort = $request->query("sort");
        
        // Get categories with product count
        $categories = CategoryFormation::withCount('formations')->get();
        
        // Build the query
        $query = Formation::with('category');
        
        // Apply category filter
        if ($categoryId) {
            $query->where('category_formation_id', $categoryId);
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
        $formations = $query->paginate(12)->withQueryString();
        
        return view('formations.index', compact('formations', 'categories', 'categoryId'));
    }
}
