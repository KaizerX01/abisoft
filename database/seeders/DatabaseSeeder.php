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
use DB;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
         DB::table('faq_entries')->insert([
            [
                'question' => 'Où êtes-vous situés ?',
                'answer'   => 'Nous sommes situés au 25 Rue des Fleurs, Centre-Ville, Casablanca.',
                'tags'     => 'localisation,adresse,magasin,store'
            ],
            [
                'question' => 'Quels sont vos horaires d\'ouverture ?',
                'answer'   => 'Nous sommes ouverts du lundi au samedi, de 09:00 à 19:00. Fermé le dimanche.',
                'tags'     => 'horaires,heures,ouverture,open'
            ],
            [
                'question' => 'Quels produits proposez-vous ?',
                'answer'   => 'Nous proposons des cafés, thés, pâtisseries artisanales et sandwichs frais.',
                'tags'     => 'produits,menu,catalogue'
            ],
            [
                'question' => 'Faites-vous la livraison ?',
                'answer'   => 'Oui, la livraison est disponible dans un rayon de 5 km via notre service interne.',
                'tags'     => 'livraison,delivery'
            ],
            [
                'question' => 'Acceptez-vous les paiements par carte ?',
                'answer'   => 'Oui, nous acceptons les cartes bancaires et le paiement mobile.',
                'tags'     => 'paiement,carte,cb'
            ],
        ]);

}

}