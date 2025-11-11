<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name' => 'Admin',
            'surname' => 'Admin',
            'email' => 'admin@library.ru',
            'password' => Hash::make('Admin123'),
            'role' => 'admin',
        ]);

        User::create([
            'name' => 'User',
            'surname' => 'User',
            'email' => 'user@library.ru',
            'password' => Hash::make('password'),
            'role' => 'reader',
        ]);
    }
}
