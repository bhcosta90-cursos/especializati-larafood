<?php

namespace Database\Seeders;

use App\Models\Plan;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PlanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if (Plan::count()) {
            return;
        }

        Plan::insert([
            'id' => '471a4139-4c96-498d-b1b2-546169a8e3cd',
            'name' => 'Business',
            'url' => 'business',
            'price' => 499.99,
            'created_at' => Carbon::now(),
        ]);

        Plan::insert([
            'id' => '5cc8c51b-9652-4c9f-a51f-c7892311502e',
            'name' => 'Premium',
            'url' => 'premium',
            'price' => 199.99,
            'created_at' => Carbon::now()->addSeconds(1),
        ]);

        Plan::insert([
            'id' => 'b6e78a4f-ee09-45c0-b5a1-cfd38bdfd21f',
            'name' => 'Free',
            'url' => 'free',
            'price' => 0.00,
            'created_at' => Carbon::now()->addSeconds(2),
        ]);
    }
}
