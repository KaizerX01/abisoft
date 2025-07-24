<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Setting::create([
            'facebook' => 'https://facebook.com/example',
            'linkedin' => 'https://linkedin.com/in/example',
            'instagram' => 'https://instagram.com/example',
            'position' => '123 Main Street, City, Country',
            'phone' => '+123 456 7890',
        ]);
    }
}
