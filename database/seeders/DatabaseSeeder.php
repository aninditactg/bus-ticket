<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Call seeders here
        $this->call([
            UserSeeder::class,
            BusSeeder::class,
        ]);

        // Optionally create additional factory users if needed
        // User::factory(10)->create();
    }
}
