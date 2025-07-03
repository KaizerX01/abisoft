<?php

namespace Database\Seeders;

use App\Models\BlogTag;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tags = ['web', 'design', 'laravel', 'php', 'backend', 'frontend', 'ux', 'seo'];

        foreach ($tags as $tag) {
            BlogTag::create(['name' => $tag]);
        }
    }
}
