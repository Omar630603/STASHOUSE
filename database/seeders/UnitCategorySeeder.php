<?php

namespace Database\Seeders;

use App\Models\UnitCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UnitCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $categories = [
            ['name' => 'Ukuran Kecil', 'dimensions' => '4m X 4m X 4m', 'description' => 'Unit berukuran Kecil', 'image' => 'images/unitCategory/defaultSmall.svg', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Ukuran Sedang', 'dimensions' => '6m X 6m X 6m', 'description' => 'Unit berukuran Sedang', 'image' => 'images/unitCategory/defaultMedium.svg', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Ukuran Besar', 'dimensions' => '8m X 8m X 8m', 'description' => 'Unit berukuran Besar', 'image' => 'images/unitCategory/defaultLarge.svg', 'created_at' => now(), 'updated_at' => now()],
        ];
        UnitCategory::insert($categories);
    }
}
