<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Infographis;

class InfographisSeeder extends Seeder
{
    public function run()
    {
        Infographis::create([
            'title' => 'Statistik Peserta KKN 2025',
            'text' => 'Infografis jumlah peserta KKN berdasarkan fakultas.',
            'picture' => 'infografis1.jpg',
            'published_date' => '2025-02-01',
            'place' => 'Majene',
            'status' => 1,
        ]);

        Infographis::create([
            'title' => 'Sebaran Lokasi KKN',
            'text' => 'Infografis sebaran mahasiswa KKN di Sulawesi Barat.',
            'picture' => 'infografis2.jpg',
            'published_date' => '2025-02-10',
            'place' => 'Polewali Mandar',
            'status' => 1,
        ]);

        Infographis::create([
            'title' => 'Capaian Program Kerja',
            'text' => 'Infografis capaian program kerja mahasiswa.',
            'picture' => 'infografis3.jpg',
            'published_date' => '2025-03-05',
            'place' => 'Mamasa',
            'status' => 0,
        ]);
    }
}
