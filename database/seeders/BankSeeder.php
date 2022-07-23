<?php

namespace Database\Seeders;

use App\Models\Bank;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BankSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $banks = [
            ['name' => 'Bank Mandiri', 'image' => 'images/bank/mandiri.svg'],
            ['name' => 'Bank BRI', 'image' => 'images/bank/bri.svg'],
            ['name' => 'Bank BNI', 'image' => 'images/bank/bni.svg'],
            ['name' => 'Bank BCA', 'image' => 'images/bank/bca.svg'],
        ];
        Bank::insert($banks);
    }
}
