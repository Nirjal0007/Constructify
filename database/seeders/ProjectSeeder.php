<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Seeder;

class ProjectSeeder extends Seeder
{
    public function run(): void
    {
        $projects = [
            ['title' => 'Sunset Ridge Villa', 'location' => 'Austin, TX', 'status' => 'completed'],
            ['title' => 'Metro Business Hub', 'location' => 'Chicago, IL', 'status' => 'completed'],
            ['title' => 'Riverside Highway Bridge', 'location' => 'Portland, OR', 'status' => 'ongoing'],
            ['title' => 'Lakeview Apartments', 'location' => 'Denver, CO', 'status' => 'completed'],
            ['title' => 'Central Shopping Plaza', 'location' => 'Miami, FL', 'status' => 'completed'],
            ['title' => 'Northern Rail Terminal', 'location' => 'Seattle, WA', 'status' => 'ongoing'],
        ];

        foreach ($projects as $project) {
            Project::create([
                'title' => $project['title'],
                'location' => $project['location'],
                'status' => $project['status'],
                'client' => 'Private Client',
                'short_description' => 'A landmark project delivered with precision craftsmanship and on-time completion.',
                'description' => '<p>This project showcases our commitment to quality construction, combining modern design with durable materials and skilled execution from groundbreaking to handover.</p>',
                'is_featured' => true,
            ]);
        }
    }
}
