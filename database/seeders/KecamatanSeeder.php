<?php

namespace Database\Seeders;

use App\Models\Kecamatan;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class KecamatanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $kecamatans = [
            ['kode' => 3374100, 'kecamatan' => 'Banyumanik'],
            ['kode' => 3374110, 'kecamatan' => 'Candisari'],
            ['kode' => 3374120, 'kecamatan' => 'Gajahmungkur'],
            ['kode' => 3374080, 'kecamatan' => 'Gayamsari'],
            ['kode' => 3374090, 'kecamatan' => 'Genuk'],
            ['kode' => 3374130, 'kecamatan' => 'Gunungpati'],
            ['kode' => 3374140, 'kecamatan' => 'Mijen'],
            ['kode' => 3374150, 'kecamatan' => 'Ngaliyan'],
            ['kode' => 3374070, 'kecamatan' => 'Pedurungan'],
            ['kode' => 3374060, 'kecamatan' => 'Semarang Barat'],
            ['kode' => 3374010, 'kecamatan' => 'Semarang Selatan'],
            ['kode' => 3374050, 'kecamatan' => 'Semarang Tengah'],
            ['kode' => 3374040, 'kecamatan' => 'Semarang Timur'],
            ['kode' => 3374030, 'kecamatan' => 'Semarang Utara'],
            ['kode' => 3374020, 'kecamatan' => 'Tembalang'],
            ['kode' => 3374160, 'kecamatan' => 'Tugu']
        ];

        foreach ($kecamatans as $kecamatan) {
            Kecamatan::create($kecamatan);
        }
    }
}
