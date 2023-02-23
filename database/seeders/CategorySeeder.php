<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if (Category::count()) {
            return;
        }

        Category::create([
            'id' => '083dde4d-dcd7-4b16-b820-ddbaeb91bd0e',
            'name' => 'Categoria 1',
            'company_id' => '95d7dd53-c9d7-4370-acf0-e36ffc157446',
        ]);

        Category::create([
            'id' => '8ac66e80-3022-41a9-bf54-843d29c6a391',
            'name' => 'Categoria 2',
            'company_id' => '95d7dd53-c9d7-4370-acf0-e36ffc157446',
        ]);

        Category::create([
            'id' => '4916665e-5bfa-4d59-9296-1f0fe50182a4',
            'name' => 'Categoria 3',
            'company_id' => '95d7dd53-c9d7-4370-acf0-e36ffc157446',
        ]);
    }
}
