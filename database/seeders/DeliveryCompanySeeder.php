<?php

namespace Database\Seeders;

use App\Models\DeliveryCompany;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DeliveryCompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $deliveryCompanies = [
            ['name' => 'JNE', 'description' => 'JNE', 'image' => 'images/deliveryCompany/jne.svg', 'created_at' => now(), 'updated_at' => now()],

            ['name' => 'SICEPAT', 'description' => 'SICEPAT', 'image' => 'images/deliveryCompany/sicepat.svg', 'created_at' => now(), 'updated_at' => now()],

            ['name' => 'J&T', 'description' => 'J&T', 'image' => 'images/deliveryCompany/j&t.svg', 'created_at' => now(), 'updated_at' => now()],
        ];

        DeliveryCompany::insert($deliveryCompanies);
    }
}
