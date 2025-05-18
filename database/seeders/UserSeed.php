<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;


class UserSeed extends Seeder
{
    public function run(): void
    {
        User::create([
            'name' => 'Ade',
            'email' => 'ade4@example.com',
            'password' => Hash::make('123456'),
            'role' => 'Admin',
        ]);

        User::create([
            'name' => 'Hary',
            'email' => 'hary@example.com',
            'password' => Hash::make('142536'),
            'role' => 'editor',
        ]);

        User::create([
            'name' => 'Jaemin',
            'email' => 'jaemin@example.com',
            'password' => Hash::make('132435'),
            'role' => 'Penulis',
        ]);
    }
}
