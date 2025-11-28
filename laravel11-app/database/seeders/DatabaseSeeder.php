<?php

namespace Database\Seeders;

use App\Models\About;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::create([
            'name' => 'admin',
            'email' => 'admin@admin.com',
            'password' => Hash::make('Admin123!;'),
            'role' => true,
        ]);

        $file = ['bi bi-instagram','bi bi-telegram','bi bi-whatsapp','bi bi-facebook'];

        foreach ($file as $icon) {
            About::create([
                'icon' =>  $icon,
            ]);
        }

    }
}
