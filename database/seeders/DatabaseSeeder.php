<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Seed admin user
        $this->call(AdminUserSeeder::class);
        
        // Seed carousel slides
        $this->call(CarouselSlideSeeder::class);
        
        // Seed events
        $this->call(EventsSeeder::class);
        
        // Seed team members (leaders)
        $this->call(TeamMemberSeeder::class);
    }
}
