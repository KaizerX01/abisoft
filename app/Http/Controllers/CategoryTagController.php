<?php

namespace App\Http\Controllers;

use App\Models\BlogTag;
use App\Models\CategoryFormation;
use App\Models\CategoryProduct;
use App\Models\CategoryService;
use Illuminate\Http\Request;

class CategoryTagController extends Controller
{
    public function index()
    {
        return view('admin.categories-tags', [
            'categoryProducts' => CategoryProduct::all(),
            'categoryServices' => CategoryService::all(),
            'categoryFormations' => CategoryFormation::all(),
            'blogTags' => BlogTag::all(),
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'type' => 'required|in:product,service,formation,blogtag',
            'name' => 'required|string|max:255',
        ]);

        switch ($request->type) {
            case 'product':
                CategoryProduct::create(['name' => $request->name]);
                break;

            case 'service':
                CategoryService::create(['name' => $request->name]);
                break;

            case 'formation':
                CategoryFormation::create(['name' => $request->name]);
                break;

            case 'blogtag':
                BlogTag::create(['name' => $request->name]);
                break;
        }

        return redirect()->back()->with('success', 'Created successfully.');
    }

    // Show the edit form for a category/tag
    public function edit($type, $id)
    {
        $item = $this->findItem($type, $id);

        if (!$item) {
            abort(404);
        }

        return view('admin.categories.edit', compact('item', 'type'));
    }

    // Update the category/tag
    public function update(Request $request, $type, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $item = $this->findItem($type, $id);

        if (!$item) {
            abort(404);
        }

        $item->name = $request->name;
        $item->save();

        return redirect()->route('admin.categories.index')->with('success', 'Updated successfully.');
    }

    // Delete the category/tag
    public function destroy($type, $id)
    {
        $item = $this->findItem($type, $id);

        if (!$item) {
            abort(404);
        }

        $item->delete();

        return redirect()->back()->with('success', 'Deleted successfully.');
    }

    // Helper to find the item by type and id
    protected function findItem($type, $id)
    {
        switch ($type) {
            case 'product':
                return CategoryProduct::find($id);
            case 'service':
                return CategoryService::find($id);
            case 'formation':
                return CategoryFormation::find($id);
            case 'blogtag':
                return BlogTag::find($id);
            default:
                return null;
        }
    }
    
}
