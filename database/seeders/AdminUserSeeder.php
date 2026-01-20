<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\User::updateOrCreate(
            ['email' => 'admin@iccr.or.tz'],
            [
                'name' => 'Admin User',
                'password' => \Hash::make('admin123'), // Change this password!
                'is_admin' => true,
            ]
        );
    }
}
