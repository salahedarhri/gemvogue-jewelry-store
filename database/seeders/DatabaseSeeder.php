<?php

namespace Database\Seeders;

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
        $this->call(BijouSeeder::class);

        \App\Models\User::factory(30)->create();

        \App\Models\User::factory()->create([
            'name' => 'client',
            'email' => 'client@mail.com',
            'password' => Hash::make('selesama'),
        ]);
        \App\Models\User::factory()->create([
            'name' => 'admin',
            'email' => 'admin@mail.com',
            'password' => Hash::make('selesama'),
            'is_admin' => true,
        ]);
    }
}
