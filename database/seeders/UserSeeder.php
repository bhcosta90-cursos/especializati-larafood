<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $total = 10;
        if (!User::count()) {
            User::factory()->create([
                'email' => 'bhcosta90@gmail.com',
                'password' => '$2a$12$I/GxpjPeDRtkGVCQfxUn1eXvTLC9CVSz8CyLN2rQFZP7D5URQTbW2'
            ]);
            $total--;
        }
        User::factory($total)->create();
    }
}
