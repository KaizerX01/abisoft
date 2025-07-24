<?php

namespace App\Http\Controllers;

use App\Models\Partner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PartnerController extends Controller
{
    public function index()
    {
        $partners = Partner::latest()->get();
        return view('admin.partners.index', compact('partners'));
    }

    public function create()
    {
        return view('admin.partners.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'required|image|max:2048',
        ]);

        $path = $request->file('image')->store('partner_images', 'public');

        Partner::create([
            'name' => $validated['name'],
            'image' => $path,
        ]);

        return redirect()->route('partners.index')->with('success', 'Partner added!');
    }

    public function edit(Partner $partner)
    {
        return view('admin.partners.edit', compact('partner'));
    }

    public function update(Request $request, Partner $partner)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('image')) {
            Storage::disk('public')->delete($partner->image);
            $partner->image = $request->file('image')->store('partner_images', 'public');
        }

        $partner->name = $validated['name'];
        $partner->save();

        return redirect()->route('partners.index')->with('success', 'Partner updated!');
    }

    public function destroy(Partner $partner)
    {
        Storage::disk('public')->delete($partner->image);
        $partner->delete();

        return redirect()->route('partners.index')->with('success', 'Partner deleted!');
    }
}
