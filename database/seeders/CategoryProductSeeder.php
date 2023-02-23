<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoryProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('category_product')->insert([[
                'category_id' => '083dde4d-dcd7-4b16-b820-ddbaeb91bd0e',
                'product_id' => 'f8b44bff-a9a1-4a52-b0c0-49c705a14ea1',
            ],
            [
                'category_id' => '083dde4d-dcd7-4b16-b820-ddbaeb91bd0e',
                'product_id' => '4dbdce31-7062-41e7-a586-a862398fa542',
            ],
            [
                'category_id' => '8ac66e80-3022-41a9-bf54-843d29c6a391',
                'product_id' => '95d7dd53-c9d7-4370-acf0-e36ffc157446',
            ],
            [
                'category_id' => '4916665e-5bfa-4d59-9296-1f0fe50182a4',
                'product_id' => '0d8bcfa3-e11f-4fca-a94d-c66d549cd4aa',
            ],
            [
                'category_id' => '4916665e-5bfa-4d59-9296-1f0fe50182a4',
                'product_id' => '4dbdce31-7062-41e7-a586-a862398fa542',
            ],
        ]);
    }
}
