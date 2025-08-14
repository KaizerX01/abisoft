<?php

namespace Database\Seeders;

use App\Models\CategoryFormation;
use App\Models\CategoryProduct;
use App\Models\CategoryService;
use App\Models\Formation;
use App\Models\Product;
use App\Models\Service;
use App\Models\Setting;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
            Setting::create([
            'facebook' => 'https://facebook.com/example',
            'position' => 'Manager',
            'linkedin' => 'https://linkedin.com/in/example',
            'instagram' => 'https://instagram.com/example',
            'phone' => '+1234567890'
        ]);

}

}