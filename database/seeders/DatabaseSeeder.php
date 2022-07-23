<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RoleSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(AdminSeeder::class);
        $this->call(CustomerSeeder::class);
        $this->call(StorageOwnerSeeder::class);
        $this->call(UnitCategorySeeder::class);
        $this->call(UnitSeeder::class);
        $this->call(DeliveryCompanySeeder::class);
        $this->call(DeliveryDriverSeeder::class);
        $this->call(StorageOwnerDeliveryDriverSeeder::class);
        $this->call(UnitAssetSeeder::class);
        $this->call(UnitReviewSeeder::class);
        $this->call(BankSeeder::class);
        $this->call(StorageOwnerBankSeeder::class);
    }
}
