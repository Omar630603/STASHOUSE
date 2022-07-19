<?php

namespace Database\Seeders;

use App\Models\StorageOwnerDeliveryDriver;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StorageOwnerDeliveryDriverSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $storageOwnersDeliveryDrivers = [
            ['storage_owner_id' => 1, 'delivery_driver_id' => 1, 'status' => true, 'created_at' => now(), 'updated_at' => now()],

            ['storage_owner_id' => 2, 'delivery_driver_id' => 2, 'status' => false, 'created_at' => now(), 'updated_at' => now()],

            ['storage_owner_id' => 3, 'delivery_driver_id' => 3, 'status' => true, 'created_at' => now(), 'updated_at' => now()],
        ];

        StorageOwnerDeliveryDriver::insert($storageOwnersDeliveryDrivers);
    }
}
