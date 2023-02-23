<?php

namespace Database\Seeders;

use App\Models\Table;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if (Table::count()) {
            return;
        }

        Table::create([
            'id' => 'f9b88921-7ab8-42c2-847f-78a47183467d',
            'company_id' => '95d7dd53-c9d7-4370-acf0-e36ffc157446',
            'identify' => 'Mesa 1',
        ]);

        Table::create([
            'id' => 'add3e832-d886-4302-b9c1-9de798f0ad6d',
            'company_id' => '95d7dd53-c9d7-4370-acf0-e36ffc157446',
            'identify' => 'Mesa 2',
        ]);

        Table::create([
            'id' => 'b99c15b9-72b1-49fd-8e73-f223824fc8a4',
            'company_id' => '95d7dd53-c9d7-4370-acf0-e36ffc157446',
            'identify' => 'Mesa 3',
        ]);
    }
}
