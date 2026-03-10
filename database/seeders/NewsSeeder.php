<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\News;
use Carbon\Carbon;

class NewsSeeder extends Seeder
{
    public function run()
    {
        News::create([
            'title' => 'Pembukaan KKN Unsulbar 2025',
            'text' => 'Kegiatan pembukaan KKN Universitas Sulawesi Barat resmi dilaksanakan di Aula Rektorat.',
            'picture' => 'kkn2025.jpg',
            'published_date' => '2025-02-01',
            'place' => 'Majene',
            'status' => 1,
        ]);

        News::create([
            'title' => 'Monitoring Mahasiswa KKN',
            'text' => 'Tim P2KKN melakukan monitoring ke lokasi KKN di beberapa desa.',
            'picture' => 'monitoring.jpg',
            'published_date' => '2025-02-10',
            'place' => 'Polewali Mandar',
            'status' => 1,
        ]);

        News::create([
            'title' => 'Penarikan Mahasiswa KKN',
            'text' => 'Penarikan mahasiswa KKN dilakukan setelah program kerja selesai.',
            'picture' => 'penarikan.jpg',
            'published_date' => '2025-03-01',
            'place' => 'Mamasa',
            'status' => 0,
        ]);
    }
}
