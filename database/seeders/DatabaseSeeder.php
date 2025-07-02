<?php

namespace Database\Seeders;

use App\Models\CategoryFormation;
use App\Models\CategoryProduct;
use App\Models\CategoryService;
use App\Models\Formation;
use App\Models\Product;
use App\Models\Service;
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
        // Seed CategoryProduct
        $catProd1 = CategoryProduct::create(['name' => 'Electronics']);
        $catProd2 = CategoryProduct::create(['name' => 'Books']);

        // Seed Products
        Product::create([
            'name' => 'Smartphone',
            'description' => 'A modern smartphone.',
            'price' => 499.99,
            'category_product_id' => $catProd1->id,
        ]);

        Product::create([
            'name' => 'Programming Book',
            'description' => 'Learn to code.',
            'price' => 29.99,
            'category_product_id' => $catProd2->id,
        ]);

        // Seed CategoryService
        $catServ1 = CategoryService::create(['name' => 'Consulting']);
        $catServ2 = CategoryService::create(['name' => 'Repair']);

        // Seed Services
        Service::create([
            'name' => 'Tech Consultation',
            'description' => 'Expert advice on tech.',
            'price' => 150.00,
            'category_service_id' => $catServ1->id,
        ]);

        Service::create([
            'name' => 'Device Repair',
            'description' => 'Fix phones and laptops.',
            'price' => 80.00,
            'category_service_id' => $catServ2->id,
        ]);

        // Seed CategoryFormation
        $catForm1 = CategoryFormation::create(['name' => 'IT']);
        $catForm2 = CategoryFormation::create(['name' => 'Business']);

        // Seed Formations
        Formation::create([
            'name' => 'Laravel Basics',
            'description' => 'Learn Laravel framework.',
            'price' => 99.00,
            'category_formation_id' => $catForm1->id,
        ]);

        Formation::create([
            'name' => 'Entrepreneurship 101',
            'description' => 'Starting your own business.',
            'price' => 120.00,
            'category_formation_id' => $catForm2->id,
        ]);

        // Seed Spatie Roles
        Role::firstOrCreate(['name' => 'admin']);
        Role::firstOrCreate(['name' => 'client']);
    }
}

