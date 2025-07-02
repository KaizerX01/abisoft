<?php

namespace App\Http\Controllers;

use App\Models\CategoryProduct;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $categoryId = $request->query("category");
        $search = $request->query("search");
        $sort = $request->query("sort");
        
        // Get categories with product count
        $categories = CategoryProduct::withCount('products')->get();
        
        // Build the query
        $query = Product::with('category');
        
        // Apply category filter
        if ($categoryId) {
            $query->where('category_product_id', $categoryId);
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
        $products = $query->paginate(12)->withQueryString();
        
        return view('products.index', compact('products', 'categories', 'categoryId'));
    }
    
    
}