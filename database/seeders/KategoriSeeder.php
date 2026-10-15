<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Kategori;

class KategoriSeeder extends Seeder
{
    public function run(): void
    {
        Kategori::insert([
            ['nama_kategori' => 'Komputer & Laptop', 'deskripsi' => 'Perangkat komputer dan laptop lab', 'created_at' => now(), 'updated_at' => now()],
            ['nama_kategori' => 'Perangkat Jaringan', 'deskripsi' => 'Router, Switch, Access Point', 'created_at' => now(), 'updated_at' => now()],
            ['nama_kategori' => 'Alat Perkabelan', 'deskripsi' => 'Kabel LAN, Crimping tool, LAN Tester', 'created_at' => now(), 'updated_at' => now()],
            ['nama_kategori' => 'Multimedia', 'deskripsi' => 'Proyektor, Speaker, Kamera', 'created_at' => now(), 'updated_at' => now()],
        ]);
        $this->call(KategoriSeeder::class);
    }
}