<?php

namespace Database\Seeders;

use App\Models\Publikasi;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PublikasiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Publikasi::create([
            'jenis' => 'Jurnal Nasional',
        ]);

        Publikasi::create([
            'jenis' => 'Jurnal Internasional',
        ]);

        Publikasi::create([
            'jenis' => 'Prosiding Internasional',
        ]);

        Publikasi::create([
            'jenis' => 'HKI',
        ]);
    }
}
