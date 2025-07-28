<?php


namespace App\Http\Controllers;

use App\Models\CategoryFormation;
use App\Models\Formation;
use Illuminate\Http\Request;

class FormationController extends Controller
{

    public function show(Formation $formation)
{

    $formation->load('category');
    
    return view('formations.show', compact('formation'));
}


public function index(Request $request)
    {
        $categoryId = $request->query("category");
        $search = $request->query("search");
        $sort = $request->query("sort");

        $categories = CategoryFormation::withCount('formations')->get();
        $query = Formation::with('category');

        if ($categoryId) {
            $query->where('category_formation_id', $categoryId);
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

        $formations = $query->paginate(12)->withQueryString();

        return view('formations.index', compact('formations', 'categories', 'categoryId'));
    }

    public function create()
    {
        $categories = CategoryFormation::all();
        return view('formations.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'image' => 'nullable|image',
            'category_formation_id' => 'required|exists:category_formations,id',
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('formation_images', 'public');
        }

        Formation::create($validated);

        return redirect()->route('formations.index')->with('success', 'Formation créée avec succès.');
    }

    public function edit(Formation $formation)
    {
        $categories = CategoryFormation::all();
        return view('formations.edit', compact('formation', 'categories'));
    }

    public function update(Request $request, Formation $formation)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'image' => 'nullable|image',
            'category_formation_id' => 'required|exists:category_formations,id',
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('formation_images', 'public');
        }

        $formation->update($validated);

        return redirect()->route('formations.index')->with('success', 'Formation mise à jour.');
    }

    public function destroy(Formation $formation)
    {
        $formation->delete();
        return redirect()->route('formations.index')->with('success', 'Formation supprimée.');
    }
}
