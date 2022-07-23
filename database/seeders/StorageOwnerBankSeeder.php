<?php

namespace Database\Seeders;

use App\Models\StorageOwnerBank;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StorageOwnerBankSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $storageOwnerBanks = [
            ['storage_owner_id' => 1, 'bank_id' => 1, 'account_number' => '12345678901', 'is_primary' => true, 'is_verified' => true],
            ['storage_owner_id' => 1, 'bank_id' => 2, 'account_number' => '12345678902', 'is_primary' => false, 'is_verified' => true],
            ['storage_owner_id' => 1, 'bank_id' => 3, 'account_number' => '12345678903', 'is_primary' => false, 'is_verified' => true],
            ['storage_owner_id' => 1, 'bank_id' => 4, 'account_number' => '12345678904', 'is_primary' => false, 'is_verified' => true],

            ['storage_owner_id' => 2, 'bank_id' => 1, 'account_number' => '12345678905', 'is_primary' => true, 'is_verified' => true],
            ['storage_owner_id' => 2, 'bank_id' => 2, 'account_number' => '12345678906', 'is_primary' => false, 'is_verified' => true],
            ['storage_owner_id' => 2, 'bank_id' => 3, 'account_number' => '12345678907', 'is_primary' => false, 'is_verified' => true],
            ['storage_owner_id' => 2, 'bank_id' => 4, 'account_number' => '12345678908', 'is_primary' => false, 'is_verified' => true],

            ['storage_owner_id' => 3, 'bank_id' => 1, 'account_number' => '12345678909', 'is_primary' => true, 'is_verified' => true],
            ['storage_owner_id' => 3, 'bank_id' => 2, 'account_number' => '12345678910', 'is_primary' => false, 'is_verified' => true],
            ['storage_owner_id' => 3, 'bank_id' => 3, 'account_number' => '12345678911', 'is_primary' => false, 'is_verified' => true],
            ['storage_owner_id' => 3, 'bank_id' => 4, 'account_number' => '12345678912', 'is_primary' => false, 'is_verified' => true],
        ];
        StorageOwnerBank::insert($storageOwnerBanks);
    }
}
