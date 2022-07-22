<?php

namespace Database\Seeders;

use App\Models\Unit;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UnitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $units = [
            ['unit_category_id' => 1, 'storage_owner_id' => 1, 'name' => 'small-1-1', 'city' => 'Malang', 'address' =>  'Jl. Malang', 'private_key' => 'small-1-1', 'price_per_day' => 20000, 'is_active' => true,  'is_rented' => false, 'capacity' => 0, 'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Velit volutpat posuere amet phasellus. Imperdiet non fringilla facilisis turpis volutpat facilisis adipiscing. Urna, fames eget et consequat, facilisis suspendisse. Tincidunt eget odio cursus orci mi.', 'detail' => 'Ukuran 30 m x 30 m
            Lokasi strategis, dekat perkotaan
            Lantai keramik
            Memiliki Sistem Pengelolaan Barang yang Baik.
            Ventilasi Memadai', 'rented' => 3, 'created_at' => now(), 'updated_at' => now()],
            ['unit_category_id' => 2, 'storage_owner_id' => 1, 'name' => 'medium-2-1', 'city' => 'Malang', 'address' =>  'Jl. Malang Satu', 'private_key' => 'medium-2-1', 'price_per_day' => 30000, 'is_active' => true,  'is_rented' => false, 'capacity' => 0, 'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Velit volutpat posuere amet phasellus. Imperdiet non fringilla facilisis turpis volutpat facilisis adipiscing. Urna, fames eget et consequat, facilisis suspendisse. Tincidunt eget odio cursus orci mi.', 'detail' => 'Ukuran 30 m x 30 m
            Lokasi strategis, dekat perkotaan
            Lantai keramik
            Memiliki Sistem Pengelolaan Barang yang Baik.
            Ventilasi Memadai', 'rented' => 0, 'created_at' => now(), 'updated_at' => now()],
            ['unit_category_id' => 3, 'storage_owner_id' => 1, 'name' => 'large-3-1', 'city' => 'Surabaya', 'address' =>  'Jl. Surabaya', 'private_key' => 'large-3-1', 'price_per_day' => 40000, 'is_active' => true,  'is_rented' => true, 'capacity' => 50, 'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Velit volutpat posuere amet phasellus. Imperdiet non fringilla facilisis turpis volutpat facilisis adipiscing. Urna, fames eget et consequat, facilisis suspendisse. Tincidunt eget odio cursus orci mi.', 'detail' => 'Ukuran 30 m x 30 m
            Lokasi strategis, dekat perkotaan
            Lantai keramik
            Memiliki Sistem Pengelolaan Barang yang Baik.
            Ventilasi Memadai', 'rented' => 0, 'created_at' => now(), 'updated_at' => now()],

            ['unit_category_id' => 1, 'storage_owner_id' => 2, 'name' => 'small-1-2', 'city' => 'Jakarta', 'address' =>  'Jl. Jakarta', 'private_key' => 'small-1-2', 'price_per_day' => 25000, 'is_active' => true,  'is_rented' => true, 'capacity' => 40, 'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Velit volutpat posuere amet phasellus. Imperdiet non fringilla facilisis turpis volutpat facilisis adipiscing. Urna, fames eget et consequat, facilisis suspendisse. Tincidunt eget odio cursus orci mi.', 'detail' => 'Ukuran 30 m x 30 m
            Lokasi strategis, dekat perkotaan
            Lantai keramik
            Memiliki Sistem Pengelolaan Barang yang Baik.
            Ventilasi Memadai', 'rented' => 0, 'created_at' => now(), 'updated_at' => now()],
            ['unit_category_id' => 2, 'storage_owner_id' => 2, 'name' => 'medium-2-2', 'city' => 'Malang', 'address' =>  'Jl. Malang dua', 'private_key' => 'medium-2-2', 'price_per_day' => 33000, 'is_active' => true,  'is_rented' => false, 'capacity' => 0, 'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Velit volutpat posuere amet phasellus. Imperdiet non fringilla facilisis turpis volutpat facilisis adipiscing. Urna, fames eget et consequat, facilisis suspendisse. Tincidunt eget odio cursus orci mi.', 'detail' => 'Ukuran 30 m x 30 m
            Lokasi strategis, dekat perkotaan
            Lantai keramik
            Memiliki Sistem Pengelolaan Barang yang Baik.
            Ventilasi Memadai', 'rented' => 0, 'created_at' => now(), 'updated_at' => now()],
            ['unit_category_id' => 3, 'storage_owner_id' => 2, 'name' => 'large-3-2', 'city' => 'Jakarta', 'address' =>  'Jl. Jakarta Satu', 'private_key' => 'large-3-2', 'price_per_day' => 39000, 'is_active' => true,  'is_rented' => true, 'capacity' => 60, 'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Velit volutpat posuere amet phasellus. Imperdiet non fringilla facilisis turpis volutpat facilisis adipiscing. Urna, fames eget et consequat, facilisis suspendisse. Tincidunt eget odio cursus orci mi.', 'detail' => 'Ukuran 30 m x 30 m
            Lokasi strategis, dekat perkotaan
            Lantai keramik
            Memiliki Sistem Pengelolaan Barang yang Baik.
            Ventilasi Memadai', 'rented' => 0, 'created_at' => now(), 'updated_at' => now()],

            ['unit_category_id' => 1, 'storage_owner_id' => 3, 'name' => 'small-1-3', 'city' => 'Malang', 'address' =>  'Jl. Malang tiga', 'private_key' => 'small-1-3', 'price_per_day' => 22000, 'is_active' => true,  'is_rented' => false, 'capacity' => 0, 'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Velit volutpat posuere amet phasellus. Imperdiet non fringilla facilisis turpis volutpat facilisis adipiscing. Urna, fames eget et consequat, facilisis suspendisse. Tincidunt eget odio cursus orci mi.', 'detail' => 'Ukuran 30 m x 30 m
            Lokasi strategis, dekat perkotaan
            Lantai keramik
            Memiliki Sistem Pengelolaan Barang yang Baik.
            Ventilasi Memadai', 'rented' => 0, 'created_at' => now(), 'updated_at' => now()],
            ['unit_category_id' => 2, 'storage_owner_id' => 3, 'name' => 'medium-2-3', 'city' => 'Malang', 'address' =>  'Jl. Malang empat', 'private_key' => 'medium-2-3', 'price_per_day' => 25000, 'is_active' => true,  'is_rented' => false, 'capacity' => 0, 'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Velit volutpat posuere amet phasellus. Imperdiet non fringilla facilisis turpis volutpat facilisis adipiscing. Urna, fames eget et consequat, facilisis suspendisse. Tincidunt eget odio cursus orci mi.', 'detail' => 'Ukuran 30 m x 30 m
            Lokasi strategis, dekat perkotaan
            Lantai keramik
            Memiliki Sistem Pengelolaan Barang yang Baik.
            Ventilasi Memadai', 'rented' => 0, 'created_at' => now(), 'updated_at' => now()],
            ['unit_category_id' => 3, 'storage_owner_id' => 3, 'name' => 'large-3-3', 'city' => 'Surabaya', 'address' =>  'Jl. Surabaya Satu', 'private_key' => 'large-3-3', 'price_per_day' => 41000, 'is_active' => true,  'is_rented' => false, 'capacity' => 0, 'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Velit volutpat posuere amet phasellus. Imperdiet non fringilla facilisis turpis volutpat facilisis adipiscing. Urna, fames eget et consequat, facilisis suspendisse. Tincidunt eget odio cursus orci mi.', 'detail' => 'Ukuran 30 m x 30 m
            Lokasi strategis, dekat perkotaan
            Lantai keramik
            Memiliki Sistem Pengelolaan Barang yang Baik.
            Ventilasi Memadai', 'rented' => 0, 'created_at' => now(), 'updated_at' => now()],
        ];
        Unit::insert($units);
    }
}
