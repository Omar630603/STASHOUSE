<?php

namespace Database\Seeders;

use App\Models\UnitAsset;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UnitAssetSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $assets = [
            ['unit_id' => 1, 'image' => 'images/unit/1/unit-1-image-1.png', 'created_at' => now(), 'updated_at' => now()],
            ['unit_id' => 1, 'image' => 'images/unit/1/unit-1-image-2.png', 'created_at' => now(), 'updated_at' => now()],
            ['unit_id' => 1, 'image' => 'images/unit/1/unit-1-image-3.png', 'created_at' => now(), 'updated_at' => now()],
        ];
        UnitAsset::insert($assets);
    }
}
