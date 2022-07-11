<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            ['name' => 'Omar Al-Maktary: Admin', 'email' => 'omar.admin@stashouse.com', 'username' => 'OmarAdmin', 'password' => Hash::make('123456789'), 'role_id' => 1],
            ['name' => 'Omar Al-Maktary: Customer', 'email' => 'omar.customer@stashouse.com', 'username' => 'OmarCustomer', 'password' => Hash::make('123456789'), 'role_id' => 2],
            ['name' => 'Omar Al-Maktary: Storage Owner', 'email' => 'omar.storage-owner@stashouse.com', 'username' => 'OmarStorageOwner', 'password' => Hash::make('123456789'), 'role_id' => 3],
            ['name' => 'Omar Al-Maktary: Delivery Driver', 'email' => 'omar.delivery-driver@stashouse.com', 'username' => 'OmarDeliveryDriver', 'password' => Hash::make('123456789'), 'role_id' => 4],
        ];
        User::insert($users);
    }
}
