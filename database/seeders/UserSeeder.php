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

            ['name' => 'Omar : Admin', 'email' => 'omar.admin@stashouse.com', 'username' => 'OmarAdmin', 'password' => Hash::make('123456789'), 'role_id' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Omar : Customer', 'email' => 'omar.customer@stashouse.com', 'username' => 'OmarCustomer', 'password' => Hash::make('123456789'), 'role_id' => 2, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Omar: Storage Owner', 'email' => 'omar.storage-owner@stashouse.com', 'username' => 'OmarStorageOwner', 'password' => Hash::make('123456789'), 'role_id' => 3, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Omar : Delivery Driver', 'email' => 'omar.delivery-driver@stashouse.com', 'username' => 'OmarDeliveryDriver', 'password' => Hash::make('123456789'), 'role_id' => 4, 'created_at' => now(), 'updated_at' => now()],

            ['name' => 'Rivaldo : Admin', 'email' => 'rivaldo.admin@stashouse.com', 'username' => 'RivaldoAdmin', 'password' => Hash::make('123456789'), 'role_id' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Rivaldo : Customer', 'email' => 'rivaldo.customer@stashouse.com', 'username' => 'RivaldoCustomer', 'password' => Hash::make('123456789'), 'role_id' => 2, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Rivaldo: Storage Owner', 'email' => 'rivaldo.storage-owner@stashouse.com', 'username' => 'RivaldoStorageOwner', 'password' => Hash::make('123456789'), 'role_id' => 3, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Rivaldo: Delivery Driver', 'email' => 'rivaldo.delivery-driver@stashouse.com', 'username' => 'RivaldoDeliveryDriver', 'password' => Hash::make('123456789'), 'role_id' => 4, 'created_at' => now(), 'updated_at' => now()],

            ['name' => 'Reta : Admin', 'email' => 'reta.admin@stashouse.com', 'username' => 'RetaAdmin', 'password' => Hash::make('123456789'), 'role_id' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Reta : Customer', 'email' => 'reta.customer@stashouse.com', 'username' => 'RetaCustomer', 'password' => Hash::make('123456789'), 'role_id' => 2, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Reta : Storage Owner', 'email' => 'reta.storage-owner@stashouse.com', 'username' => 'RetaStorageOwner', 'password' => Hash::make('123456789'), 'role_id' => 3, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Reta : Delivery Driver', 'email' => 'reta.delivery-driver@stashouse.com', 'username' => 'RetaDeliveryDriver', 'password' => Hash::make('123456789'), 'role_id' => 4, 'created_at' => now(), 'updated_at' => now()],

        ];
        User::insert($users);
    }
}
