<?php

namespace Database\Seeders;

use App\Models\DeliveryDriver;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DeliveryDriverSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $deliveryDriveries = [
            [
                'user_id' => 4, 'delivery_company_id' => 1, 'driver_name' => 'Driver Omar', 'phone' => '082123533954', 'city' => 'Malang', 'address' => 'Jl. Soekarno Hatta 3', 'vehicle_name' => 'Honda', 'vehicle_color' => 'white', "vehicle_number" => '85213A',
                'price_per_km' => 20000, 'deliveried' => 0, 'status' => false, 'created_at' => now(), 'updated_at' => now()
            ],

            [
                'user_id' => 8, 'delivery_company_id' => 2, 'driver_name' => 'Driver Rivaldo', 'phone' => '082123533953', 'city' => 'Jakarta', 'address' => 'Jl. Soekarno Hatta 2', 'vehicle_name' => 'Yamaha', 'vehicle_color' => 'black', "vehicle_number" => '95342B',
                'price_per_km' => 22000, 'deliveried' => 0, 'status' => false, 'created_at' => now(), 'updated_at' => now()
            ],

            [
                'user_id' => 12, 'delivery_company_id' => 3, 'driver_name' => 'Driver Reta', 'phone' => '082123533952', 'city' => 'Surabaya', 'address' => 'Jl. Soekarno Hatta 1', 'vehicle_name' => 'Suzuki', 'vehicle_color' => 'red', "vehicle_number" => '65723C',
                'price_per_km' => 18000, 'deliveried' => 0, 'status' => false, 'created_at' => now(), 'updated_at' => now()
            ],
        ];

        DeliveryDriver::insert($deliveryDriveries);
    }
}
