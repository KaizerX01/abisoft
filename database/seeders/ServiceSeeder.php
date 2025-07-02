<?php

namespace Database\Seeders;

use App\Models\CategoryService;
use App\Models\Service;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = ['Consultation', 'Maintenance', 'Développement Web', 'Formation', 'Design'];

        foreach ($categories as $name) {
            CategoryService::create(['name' => $name]);
        }
        
         $services = [
            [
                'name' => 'Consultation en stratégie digitale',
                'description' => 'Un accompagnement personnalisé pour votre transformation numérique.',
                'price' => 150.00,
                'category' => 'Consultation',
            ],
            [
                'name' => 'Maintenance de site web',
                'description' => 'Assurez la sécurité et la performance de votre site en continu.',
                'price' => 99.99,
                'category' => 'Maintenance',
            ],
            [
                'name' => 'Développement d\'application Laravel',
                'description' => 'Création d\'applications web performantes avec Laravel.',
                'price' => 299.99,
                'category' => 'Développement Web',
            ],
            [
                'name' => 'Formation Tailwind CSS',
                'description' => 'Maîtrisez Tailwind CSS en quelques heures.',
                'price' => 49.99,
                'category' => 'Formation',
            ],
            [
                'name' => 'Conception de logo professionnel',
                'description' => 'Un logo unique et professionnel pour votre marque.',
                'price' => 120.00,
                'category' => 'Design',
            ],
        ];

        foreach ($services as $data) {
            $category = CategoryService::where('name', $data['category'])->first();
            if ($category) {
                Service::create([
                    'name' => $data['name'],
                    'description' => $data['description'],
                    'price' => $data['price'],
                    'category_service_id' => $category->id,
                    'image' => null, // Add images later
                ]);
            }
        }
    
    }
}
