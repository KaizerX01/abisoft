<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index()
    {
        // Assuming only one row for settings
        $setting = Setting::first();
        return view('admin.settings.index', compact('setting'));
    }

    public function edit(Setting $setting)
    {
        return view('admin.settings.edit', compact('setting'));
    }

    public function update(Request $request, Setting $setting)
    {
        $validated = $request->validate([
            'facebook' => 'nullable|url',
            'linkedin' => 'nullable|url',
            'instagram' => 'nullable|url',
            'position' => 'nullable|string|max:255',
            'phone' => 'nullable|string|max:50',
        ]);

        $setting->update($validated);

        return redirect()->route('settings.index')->with('success', 'Settings updated!');
    }
}
