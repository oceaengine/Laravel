<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Prodi;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        Prodi::create([
            'nama_prodi' => 'Manajemen Informatika'
        ]);

        Prodi::create([
            'nama_prodi' => 'Manajemen'
        ]);
        Prodi::factory(10)->create();
    }
}
