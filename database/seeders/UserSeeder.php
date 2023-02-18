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
                'company_id' => '95d7dd53-c9d7-4370-acf0-e36ffc157446',
                'email' => 'bhcosta90@gmail.com',
                'password' => '$2a$12$I/GxpjPeDRtkGVCQfxUn1eXvTLC9CVSz8CyLN2rQFZP7D5URQTbW2'
            ]);
            $total--;
        }

        User::factory($total)->create([
            'company_id' => '95d7dd53-c9d7-4370-acf0-e36ffc157446',
        ]);
    }
}
