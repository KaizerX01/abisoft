<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\CategoryProduct;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        // Create categories
        $webCategory = CategoryProduct::create(['name' => 'Produit Web']);
        $softwareCategory = CategoryProduct::create(['name' => 'Logiciel']);
        $designCategory = CategoryProduct::create(['name' => 'Design']);

        // Create products
        Product::create([
            'name' => 'Site E-commerce',
            'description' => 'Une plateforme complète de vente en ligne.',
            'price' => 299.99,
            'category_product_id' => $webCategory->id,
            'image' => 'ecommerce.jpg'
        ]);

        Product::create([
            'name' => 'Bibliothèque Juridique',
            'description' => 'Outil complet de gestion juridique.',
            'price' => 199.00,
            'category_product_id' => $softwareCategory->id,
            'image' => 'juridique.jpg'
        ]);

        Product::create([
            'name' => 'Logo Professionnel',
            'description' => 'Conception de logo unique pour votre marque.',
            'price' => 49.99,
            'category_product_id' => $designCategory->id,
            'image' => 'logo.jpg'
        ]);
    }
}
