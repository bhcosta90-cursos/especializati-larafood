<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DetailPlanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if (DB::table('detail_plans')->count()) {
            return;
        }

        $data = [
            [
                "id" => "b6e78a4f-ee09-45c0-b5a1-cfd38bdfd21f",
                "details" => [
                    "Categorias",
                    "Produtos"
                ]
            ],
            [
                "id" => "471a4139-4c96-498d-b1b2-546169a8e3cd",
                "details" => [
                    "Categorias",
                    "Produtos",
                    "Mesas",
                    "Cardápio",
                ]
            ],
            [
                "id" => "5cc8c51b-9652-4c9f-a51f-c7892311502e",
                "details" => [
                    "Categorias",
                    "Produtos",
                    "Mesas",
                    "Cardápio",
                    "Suporte",
                ]
            ],
        ];

        $newData = [];

        foreach ($data as $k => $plan) {
            foreach ($plan['details'] as $j => $detail) {
                array_push($newData, [
                    'id' => str()->uuid(),
                    'plan_id' => $plan['id'],
                    'name' => $detail,
                    'created_at' => Carbon::now()->addSecond($k + $j)
                ]);
            }
        }

        DB::table('detail_plans')->insert($newData);
    }
}
