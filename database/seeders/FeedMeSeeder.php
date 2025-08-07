<?php

namespace Database\Seeders;

use App\Models\CategoryProduct;
use App\Models\CategoryService;
use App\Models\CategoryFormation;
use App\Models\Partner;
use App\Models\Product;
use App\Models\Service;
use App\Models\Formation;
use Illuminate\Database\Seeder;

class FeedMeSeeder extends Seeder
{
    public function run()
    {
        // Seed CategoryProduct
        $categoryProducts = [
            CategoryProduct::create(['name' => 'Électronique'])->id,
            CategoryProduct::create(['name' => 'Vêtements'])->id,
            CategoryProduct::create(['name' => 'Accessoires'])->id,
        ];

        // Seed CategoryService
        $categoryServices = [
            CategoryService::create(['name' => 'Consulting'])->id,
            CategoryService::create(['name' => 'Développement Web'])->id,
            CategoryService::create(['name' => 'Marketing Digital'])->id,
            CategoryService::create(['name' => 'Design Graphique'])->id,
        ];

        // Seed CategoryFormation
        $categoryFormations = [
            CategoryFormation::create(['name' => 'Développement'])->id,
            CategoryFormation::create(['name' => 'Design'])->id,
            CategoryFormation::create(['name' => 'Marketing'])->id,
            CategoryFormation::create(['name' => 'Gestion de Projet'])->id,
        ];

        // Seed Partners
        Partner::create([
            'name' => 'TechNova Solutions',
            'image' => 'partners/partner1.jpg',
        ]);

        Partner::create([
            'name' => 'GreenWave Enterprises',
            'image' => 'partners/partner2.jpg',
        ]);

        Partner::create([
            'name' => 'BlueHorizon Tech',
            'image' => 'partners/partner3.jpg',
        ]);

        Partner::create([
            'name' => 'Innovate Designs',
            'image' => 'partners/partner4.jpg',
        ]);

        Partner::create([
            'name' => 'FuturePath Consulting',
            'image' => 'partners/partner5.jpg',
        ]);

        // Seed Products
        Product::create([
            'name' => 'Smartphone XPro',
            'description' => 'Un smartphone haut de gamme avec caméra 48MP et écran AMOLED.',
            'price' => 599.99,
            'image' => 'products/product1.jpg',
            'category_product_id' => $categoryProducts[0], // Électronique
        ]);

        Product::create([
            'name' => 'Chemise Élégante',
            'description' => 'Chemise en coton bio, parfaite pour les occasions formelles.',
            'price' => 49.99,
            'image' => 'products/product2.jpg',
            'category_product_id' => $categoryProducts[1], // Vêtements
        ]);

        Product::create([
            'name' => 'Montre Connectée',
            'description' => 'Montre intelligente avec suivi de la santé et notifications.',
            'price' => 129.99,
            'image' => 'products/product3.jpg',
            'category_product_id' => $categoryProducts[2], // Accessoires
        ]);

        // Seed Services
        Service::create([
            'name' => 'Consultation Stratégique',
            'description' => 'Conseils personnalisés pour optimiser votre stratégie d’entreprise.',
            'price' => 200.00,
            'image' => 'services/service1.jpg',
            'category_service_id' => $categoryServices[0], // Consulting
        ]);

        Service::create([
            'name' => 'Développement de Site Web',
            'description' => 'Création de sites web modernes et responsive.',
            'price' => 1500.00,
            'image' => 'services/service2.jpg',
            'category_service_id' => $categoryServices[1], // Développement Web
        ]);

        Service::create([
            'name' => 'Campagne Publicitaire',
            'description' => 'Campagnes marketing ciblées pour booster votre visibilité.',
            'price' => 800.00,
            'image' => 'services/service3.jpg',
            'category_service_id' => $categoryServices[2], // Marketing Digital
        ]);

        Service::create([
            'name' => 'Création de Logo',
            'description' => 'Design de logo professionnel pour votre marque.',
            'price' => 300.00,
            'image' => 'services/service4.jpg',
            'category_service_id' => $categoryServices[3], // Design Graphique
        ]);

        // Seed Formations
        Formation::create([
            'name' => 'Formation Laravel Avancée',
            'description' => 'Maîtrisez le framework Laravel pour développer des applications robustes.',
            'price' => 499.99,
            'image' => 'formations/formation1.jpg',
            'category_formation_id' => $categoryFormations[0], // Développement
        ]);

        Formation::create([
            'name' => 'Design UX/UI',
            'description' => 'Apprenez à concevoir des interfaces utilisateur intuitives et attrayantes.',
            'price' => 399.99,
            'image' => 'formations/formation2.jpg',
            'category_formation_id' => $categoryFormations[1], // Design
        ]);

        Formation::create([
            'name' => 'Stratégies Marketing Digital',
            'description' => 'Découvrez les techniques pour optimiser votre présence en ligne.',
            'price' => 299.99,
            'image' => 'formations/formation3.jpg',
            'category_formation_id' => $categoryFormations[2], // Marketing
        ]);

        Formation::create([
            'name' => 'Gestion de Projet Agile',
            'description' => 'Apprenez les méthodologies agiles pour gérer des projets efficacement.',
            'price' => 349.99,
            'image' => 'formations/formation4.jpg',
            'category_formation_id' => $categoryFormations[3], // Gestion de Projet
        ]);
    }
}