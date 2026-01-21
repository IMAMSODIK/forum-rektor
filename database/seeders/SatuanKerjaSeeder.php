<?php

namespace Database\Seeders;

use App\Models\SatuanKerja;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SatuanKerjaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        SatuanKerja::create([
            'nama' => 'UNIVERSITAS ISLAM NEGERI SUMATERA UTARA'
        ]);

        SatuanKerja::create([
            'nama' => 'UNIVERSITAS ISLAM NEGERI MALANG'
        ]);

        SatuanKerja::create([
            'nama' => 'UNIVERSITAS ISLAM NEGERI PADANG'
        ]);
    }
}
