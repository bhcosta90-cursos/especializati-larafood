<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if (Product::count()) {
            return;
        }

        Product::create([
            'id' => 'f8b44bff-a9a1-4a52-b0c0-49c705a14ea1',
            'company_id' => '95d7dd53-c9d7-4370-acf0-e36ffc157446',
            'price' => 50,
            'flag' => 'flag 1',
            'title' => 'Produto 1',
        ]);

        Product::create([
            'id' => '0d8bcfa3-e11f-4fca-a94d-c66d549cd4aa',
            'company_id' => '95d7dd53-c9d7-4370-acf0-e36ffc157446',
            'price' => 50,
            'flag' => 'flag 2',
            'title' => 'Produto 2',
        ]);

        Product::create([
            'id' => '4dbdce31-7062-41e7-a586-a862398fa542',
            'company_id' => '95d7dd53-c9d7-4370-acf0-e36ffc157446',
            'price' => 50,
            'flag' => 'flag 3',
            'title' => 'Produto 3',
        ]);
    }
}
