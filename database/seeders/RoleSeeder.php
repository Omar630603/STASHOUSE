<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [
            ['name' => 'ADMIN', 'value' => 1],
            ['name' => 'CUSTOMER', 'value' => 2],
            ['name' => 'STORAGE_OWNER', 'value' => 3],
            ['name' => 'DELIVERY_DRIVER', 'value' => 4],
        ];
        Role::insert($roles);
    }
}
