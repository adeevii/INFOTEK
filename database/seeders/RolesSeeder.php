<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = [
            ['name' => 'admin', 'description' => 'Memiliki akses penuh ke sistem'],
            ['name' => 'editor', 'description' => 'Dapat mengedit dan mempublikasikan konten'],
            ['name' => 'user', 'description' => 'Pengguna biasa dengan akses terbatas'],
        ];
    
        foreach ($roles as $role) {
            DB::table('roles')->updateOrInsert(
                ['name' => $role['name']], // cek berdasarkan nama
                ['description' => $role['description']] // update jika ada
            );
    
    }
}
}