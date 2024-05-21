<?php

namespace Database\Seeders;

use App\Models\Tingkat;
use App\Models\Publikasi;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TingkatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Tingkat::create([
            'nama_tingkat' => 'Nasional',
        ]);

        Tingkat::create([
            'nama_tingkat' => 'Internasional',
        ]);
    }
}
