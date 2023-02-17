<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $total = 10;
        if (!\App\Models\User::count()) {
            \App\Models\User::factory()->create([
                'email' => 'bhcosta90@gmail.com',
                'password' => '$2a$12$I/GxpjPeDRtkGVCQfxUn1eXvTLC9CVSz8CyLN2rQFZP7D5URQTbW2'
            ]);
            $total--;
        }
        \App\Models\User::factory($total)->create();

        $this->call(PlanSeeder::class);
        $this->call(DetailPlanSeeder::class);
    }
}
