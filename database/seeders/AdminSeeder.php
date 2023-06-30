<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'first_name' => 'John',
            'last_name' => 'Doe',
            'email' => 'admin@admin.com',
            'password' => Hash::make('Admin123#'),
            'role_id' => '1',
            'phone' => '123123',
            'user_address' => 'Street 123',
            'user_zip' => '1000',
            'user_place' => 'Skopje',
            'user_country' => 'Macedonia',

        ]);
    }
}
