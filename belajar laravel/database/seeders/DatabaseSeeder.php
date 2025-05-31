<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Create admin user
        \App\Models\User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@ayamgorengjoss.com',
            'password' => bcrypt('password'),
        ]);

        // Call other seeders
        $this->call([
            CategorySeeder::class,
            ProductSeeder::class,
            CustomerSeeder::class,
            PromoSeeder::class,
        ]);
    }
}
