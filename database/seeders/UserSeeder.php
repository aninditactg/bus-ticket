<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'name' => 'Anindita',
                'email' => 'anindita46@gmail.com', // Changed email to avoid duplicate
                'phone' => '01712345678',
                'password' => Hash::make('password123'),
            ],
            [
                'name' => 'Nima',
                'email' => 'nima123@gmail.com', // Fixed missing @ symbol
                'phone' => '01711112222',
                'password' => Hash::make('password123'),
            ],
            [
                'name' => 'Nasrin',
                'email' => 'nasrin673@gmail.com',
                'phone' => '01733334444',
                'password' => Hash::make('password123'),
            ],
            [
                'name' => 'Eva',
                'email' => 'eva525@gmail.com',
                'phone' => '01755556666',
                'password' => Hash::make('password123'),
            ],
            [
                'name' => 'Rahi',
                'email' => 'rahi90@gmail.com',
                'phone' => '01777778888',
                'password' => Hash::make('password123'),
            ],
        ];

        foreach ($users as $userData) {
            User::firstOrCreate(
                ['email' => $userData['email']], // Check if email exists
                $userData // Create with all data if email doesn't exist
            );
        }
    }
}

