<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'name' => 'Admin',
            'email' => 'wakceng@admin.com',
            'password' => Hash::make('wakceng123'),
            'role' => 'admin',
        ]);
    }
}

