<?php

namespace Database\Seeders;

use App\Models\TeamMember;
use Illuminate\Database\Seeder;

class TeamMemberSeeder extends Seeder
{
    public function run(): void
    {
        $members = [
            ['name' => 'Robert Anderson', 'designation' => 'Chief Executive Officer'],
            ['name' => 'Sarah Mitchell', 'designation' => 'Lead Architect'],
            ['name' => 'David Thompson', 'designation' => 'Project Manager'],
            ['name' => 'Emily Carter', 'designation' => 'Site Supervisor'],
        ];

        foreach ($members as $index => $member) {
            TeamMember::create([
                'name' => $member['name'],
                'designation' => $member['designation'],
                'bio' => 'An experienced professional dedicated to delivering quality construction projects.',
                'order' => $index,
                'is_active' => true,
            ]);
        }
    }
}
