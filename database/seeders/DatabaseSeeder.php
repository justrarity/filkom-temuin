<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\StorageLocation;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name'     => 'Security FILKOM',
            'email'    => 'security@filkom.test',
            'password' => Hash::make('password'),
            'role'     => 'security',
        ]);

        User::create([
            'name'     => 'Petugas Kebersihan',
            'email'    => 'ob@filkom.test',
            'password' => Hash::make('password'),
            'role'     => 'pelapor',
        ]);

        foreach (['Elektronik', 'Aksesori', 'Alat Tulis', 'Dokumen', 'Pakaian', 'Barang Pribadi', 'Lainnya'] as $c) {
            Category::create(['name' => $c]);
        }

        StorageLocation::create([
            'name'        => 'Lobby Gedung F (Pos Security)',
            'description' => 'Dijaga Security. Barang dari OB dipindahkan ke sini jika belum diambil sampai OB pulang.',
        ]);

        StorageLocation::create([
            'name'        => 'Ruang OB (per lantai)',
            'description' => 'Penyimpanan sementara untuk barang yang ditemukan OB pada hari yang sama.',
        ]);
    }
}