<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admins = [
            ['user_id' => 1, 'role' => 0, 'password' => Hash::make('12345'), 'created_at' => now(), 'updated_at' => now()],

            ['user_id' => 5, 'role' => 0, 'password' => Hash::make('12345'), 'created_at' => now(), 'updated_at' => now()],

            ['user_id' => 9, 'role' => 0, 'password' => Hash::make('12345'), 'created_at' => now(), 'updated_at' => now()],
        ];

        Admin::insert($admins);
    }
}
