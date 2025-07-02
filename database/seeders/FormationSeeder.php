<?php

namespace Database\Seeders;

use App\Models\CategoryFormation;
use App\Models\Formation;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FormationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            'Développement Web',
            'Science des données',
            'Design UI/UX',
            'Marketing digital',
            'Cybersécurité'
        ];

        foreach ($categories as $name) {
            CategoryFormation::create(['name' => $name]);
        }
   

    $formations = [
            [
                'title' => 'Laravel Avancé',
                'description' => 'Formation approfondie sur le framework Laravel.',
                'price' => 499.00,
                'image' => null,
                'category' => 'Développement Web'
            ],
            [
                'title' => 'Introduction au Machine Learning',
                'description' => 'Apprenez les bases du machine learning avec Python.',
                'price' => 599.00,
                'image' => null,
                'category' => 'Science des données'
            ],
            [
                'title' => 'Figma pour débutants',
                'description' => 'Découvrez les bases du design UI avec Figma.',
                'price' => 199.00,
                'image' => null,
                'category' => 'Design UI/UX'
            ],
            [
                'title' => 'Campagne Facebook Ads',
                'description' => 'Maîtrisez la publicité sur Facebook.',
                'price' => 149.00,
                'image' => null,
                'category' => 'Marketing digital'
            ],
            [
                'title' => 'Sécurité réseau avancée',
                'description' => 'Techniques avancées pour sécuriser vos réseaux.',
                'price' => 799.00,
                'image' => null,
                'category' => 'Cybersécurité'
            ],
        ];

        foreach ($formations as $data) {
            $category = CategoryFormation::where('name', $data['category'])->first();

            if ($category) {
                Formation::create([
                    'title' => $data['title'],
                    'description' => $data['description'],
                    'price' => $data['price'],
                    'image' => $data['image'], // put images in `storage/app/public`
                    'category_formation_id' => $category->id,
                ]);
            }
        }
}
 }