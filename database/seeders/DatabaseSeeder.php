<?php

namespace Database\Seeders;

use App\Models\Obat;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Karyawan;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        User::create([
            'user' => 'admin',
            'password' => bcrypt('admin'),
            'role' => 'admin'
        ]);

    }
}
