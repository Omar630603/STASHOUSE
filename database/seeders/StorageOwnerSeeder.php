<?php

namespace Database\Seeders;

use App\Models\StorageOwner;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StorageOwnerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $storageOwners = [
            ['user_id' => 3, 'phone' => '082123533955', 'city' => 'Malang', 'address' => 'Jl. Soekarno Hatta', 'is_active' => true, 'is_approved' => true, "is_trusted" => true, 'created_at' => now(), 'updated_at' => now()],

            ['user_id' => 7, 'phone' => '082123533956', 'city' => 'Jakarta', 'address' => 'Jl. SJakarta ', 'is_active' => true, 'is_approved' => true, "is_trusted" => true, 'created_at' => now(), 'updated_at' => now()],

            ['user_id' => 11, 'phone' => '082123533957', 'city' => 'Surabaya', 'address' => 'Jl. Surabaya', 'is_active' => true, 'is_approved' => true, "is_trusted" => true, 'created_at' => now(), 'updated_at' => now()],
        ];

        StorageOwner::insert($storageOwners);
    }
}
