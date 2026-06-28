<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            ['name' => 'Residential', 'type' => 'project'],
            ['name' => 'Commercial', 'type' => 'project'],
            ['name' => 'Infrastructure', 'type' => 'project'],
            ['name' => 'Construction Tips', 'type' => 'blog'],
            ['name' => 'Industry News', 'type' => 'blog'],
            ['name' => 'Building', 'type' => 'service'],
        ];

        foreach ($categories as $category) {
            Category::create([
                'name' => $category['name'],
                'slug' => Str::slug($category['name']) . '-' . Str::random(4),
                'type' => $category['type'],
            ]);
        }
    }
}
