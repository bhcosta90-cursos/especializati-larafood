<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Permission::create(['id' => '651b1ba3-504f-49d4-b13c-422c4bd1e8c7', 'name' => 'products']);
        Permission::create(['id' => '1b8e1d2c-fc8a-4292-aeee-7ff65c524848', 'name' => 'categories']);
        Permission::create(['id' => 'e163cd97-36e2-4a33-b503-1426cd4ff206', 'name' => 'users']);
        Permission::create(['id' => 'e46b7059-feda-40bb-a04d-3232b3ec9789', 'name' => 'tables']);
    }
}
