<?php

namespace Database\Seeders;

use App\Models\Customer;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $customers = [
            ['user_id' => 2, 'created_at' => now(), 'updated_at' => now()],

            ['user_id' => 6, 'created_at' => now(), 'updated_at' => now()],

            ['user_id' => 10, 'created_at' => now(), 'updated_at' => now()],
        ];

        Customer::insert($customers);
    }
}
