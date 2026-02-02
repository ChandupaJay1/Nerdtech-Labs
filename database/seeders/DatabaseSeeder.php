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
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Admin User',
            'email' => 'admin@nerdtech.com',
            'password' => bcrypt('password123'),
            'is_admin' => true,
        ]);

        $this->call([
            ServiceSeeder::class,
            ProjectSeeder::class,
        ]);
    }
}
