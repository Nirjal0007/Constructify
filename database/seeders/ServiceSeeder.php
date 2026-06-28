<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    public function run(): void
    {
        $services = [
            ['title' => 'Residential Building', 'icon' => 'bi-house-door-fill', 'short_description' => 'Quality home construction tailored to your lifestyle and budget.'],
            ['title' => 'Commercial Projects', 'icon' => 'bi-building-fill', 'short_description' => 'Office buildings, retail spaces, and commercial complexes built to last.'],
            ['title' => 'Renovation & Remodeling', 'icon' => 'bi-hammer', 'short_description' => 'Transform existing spaces with expert renovation services.'],
            ['title' => 'Road & Infrastructure', 'icon' => 'bi-signpost-split-fill', 'short_description' => 'Roads, bridges, and public infrastructure built to code.'],
            ['title' => 'Project Management', 'icon' => 'bi-clipboard-check-fill', 'short_description' => 'End-to-end oversight from planning to handover.'],
            ['title' => 'Architecture & Design', 'icon' => 'bi-rulers', 'short_description' => 'Creative architectural design services for every project type.'],
        ];

        foreach ($services as $index => $service) {
            Service::create([
                'title' => $service['title'],
                'icon' => $service['icon'],
                'short_description' => $service['short_description'],
                'description' => '<p>' . $service['short_description'] . ' Our experienced team handles every detail with precision and care, ensuring your project is delivered on time and to the highest standards.</p>',
                'order' => $index,
                'is_featured' => true,
            ]);
        }
    }
}
