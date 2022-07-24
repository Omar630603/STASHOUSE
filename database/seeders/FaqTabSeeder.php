<?php

namespace Database\Seeders;

use App\Models\FaqTab;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FaqTabSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tabs = [
            ['title' => 'General', 'created_at' => now(), 'updated_at' => now()],
            ['title' => 'Privacy', 'created_at' => now(), 'updated_at' => now()],
            ['title' => 'Policy', 'created_at' => now(), 'updated_at' => now()],
        ];
        FaqTab::insert($tabs);
    }
}
