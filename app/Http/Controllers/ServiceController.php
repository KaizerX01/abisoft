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

        $categories = CategoryService::withCount('services')->get();

        $query = Service::with('category');

        if ($categoryId) {
            $query->where('category_service_id', $categoryId);
        }

        if ($search) {
            $query->where(function($q) use ($search) {
                $q->where('name', 'like', '%' . $search . '%')
                  ->orWhere('description', 'like', '%' . $search . '%');
            });
        }

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
        }

        $services = $query->paginate(12)->withQueryString();

        return view('services.index', compact('services', 'categories', 'categoryId'));
    }

    public function create()
    {
        $categories = CategoryService::all();
        return view('services.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'image' => 'nullable|image',
            'category_service_id' => 'required|exists:category_services,id',
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('service_images', 'public');
        }

        Service::create($validated);

        return redirect()->route('services.index')->with('success', 'Service créé avec succès.');
    }

    public function edit(Service $service)
    {
        $categories = CategoryService::all();
        return view('services.edit', compact('service', 'categories'));
    }

    public function update(Request $request, Service $service)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'image' => 'nullable|image',
            'category_service_id' => 'required|exists:category_services,id',
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('service_images', 'public');
        }

        $service->update($validated);

        return redirect()->route('services.index')->with('success', 'Service mis à jour.');
    }

    public function destroy(Service $service)
    {
        $service->delete();
        return redirect()->route('services.index')->with('success', 'Service supprimé.');
    }
}
