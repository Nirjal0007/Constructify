<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        User::factory()->create([
            'name' => 'Admin User',
            'email' => 'admin@constructify.test',
            'password' => bcrypt('password'),
            'role' => 'admin',
        ]);

        $this->call([
            CategorySeeder::class,
            ServiceSeeder::class,
            ProjectSeeder::class,
            TeamMemberSeeder::class,
            TestimonialSeeder::class,
            FaqSeeder::class,
        ]);
    }
}
