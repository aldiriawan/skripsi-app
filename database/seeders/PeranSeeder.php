<?php

namespace Database\Seeders;

use App\Models\Peran;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PeranSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Peran::create([
            'nama' => 'Peserta'
        ]);

        Peran::create([
            'nama' => 'Penulis/Pencipta'
        ]);

        Peran::create([
            'nama' => 'Tim/Panitia'
        ]);

        Peran::create([
            'nama' => 'Narasumber/Pembicara'
        ]);

        Peran::create([
            'nama' => 'Pembimbing'
        ]);

        Peran::create([
            'nama' => 'Moderator'
        ]);

        Peran::create([
            'nama' => 'Reviewer'
        ]);
    }
}
