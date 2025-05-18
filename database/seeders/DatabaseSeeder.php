<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Post;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
       $this->call([
            UserSeed::class,
            CategorySeed::class,
            PostSeed::class,
            RolesSeeder::class,
        ]);
    }
}
