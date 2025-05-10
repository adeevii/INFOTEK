<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;


class CategorySeed extends Seeder
{
    
    public function run(): void
    {
        Category::create([
            'name' => 'Umum',
        ]);
        Category::create([
            'name' => 'Teknologi',
        ]);
    }
}
