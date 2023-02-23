<?php

namespace Database\Seeders;

use App\Models\Company;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if (Company::count()) {
            return;
        }

        Company::create([
            'id' => '95d7dd53-c9d7-4370-acf0-e36ffc157446',
            'plan_id' => '471a4139-4c96-498d-b1b2-546169a8e3cd',
            'cnpj' => '14099138000102',
            'name' => 'Company Name S.A.',
            'url' => 'company-name-s-a',
            'email' => 'company@test.com.br',
            'logo' => null,
            'active' => true,
            'subscription' => now(),
            'expires_at' => now()->addMonth(),
            'subscription_id' => null,
            'subscription_active' => true,
            'subscription_suspended' => false,
            'created_at' => now(),
        ]);
    }
}
