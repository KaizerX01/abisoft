<?php

namespace Database\Seeders;

use App\Models\BlogPost;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BlogPostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1; $i <= 5; $i++) {
        $title = "Sample Blog Post $i";
            BlogPost::create([
            'title' => $title,
            'description' => "This is a short description of blog post $i.",
            'content' => "Full content for blog post $i...",
            'image' => null,
        ]);
    }
    }
}
