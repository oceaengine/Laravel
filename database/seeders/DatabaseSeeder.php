<?php

namespace Database\Seeders;

use App\Models\Mahasiswa;
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

        Mahasiswa::create([
            'nim' => 'E020322092',
            'nama'=> 'Dinda Rizky',
            'no_hp'=> '0831312906666',
            'alamat'=> 'Banjarmasin',
            'foto'=> 'Dinda.jpg',
            'prodi_id' => '1',
        ]);

        Mahasiswa::create([
            'nim' => 'E020322115',
            'nama'=> 'Askara Wijaya',
            'no_hp'=> '081234567890',
            'alamat'=> 'Banjarbaru',
            'foto'=> 'Askara.jpg',
            'prodi_id' => '2',
        ]);  
        Mahasiswa::factory(10)->create();

        User::create([
            'user' => 'E020322092',
            'password' => bcrypt('E020322092'),
            'role' => 'mahasiswa'
        ]);

        User::create([
            'user' => 'E020322115',
            'password' => bcrypt('E020322115'),
            'role' => 'mahasiswa'
        ]);

        User::create([
            'user' => 'admin',
            'password' => bcrypt('admin'),
            'role' => 'admin'
        ]);

    }
}
