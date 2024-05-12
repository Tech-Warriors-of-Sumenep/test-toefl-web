<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $this->call(CategorySeeder::class);

        User::create([
            'name' => 'Wong tulus',
            'email' => 'admin@pens.ac.id',
            'password' => Hash::make('12345678'),
            'role' => 'admin',
            'foto_profile' => 'foto_profile-1709949205153.jpg'
        ]);
    }
}
