<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Post;
use App\Models\User;
use App\Models\Category;

class PostSeed extends Seeder
{
    public function run(): void
    {
        $user = User::first() ?? User::factory()->create();
        $category = Category::first() ?? Category::create(['name' => 'Umum']);

        // Buat beberapa post
        Post::create([
            'user_id' => $user->id,
            'category_id' => $category->id,
            'title' => 'AI Di Dalam Kehidupan Sehari-Hari',
            'description' => 'AI telah menjadi bagian penting dalam kehidupan sehari-hari kita.',
            'status' => 'approved',
        ]);

        Post::create([
            'user_id' => $user->id,
            'category_id' => $category->id,
            'title' => 'Pengaruh Teknologi Terhadap Pendidikan',
            'description' => 'Teknologi telah mengubah cara kita belajar dan mengajar.',
            'status' => 'pending',
        ]);
    }
}
