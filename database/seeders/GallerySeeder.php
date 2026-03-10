<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Gallery;

class GallerySeeder extends Seeder
{
    public function run()
    {
        Gallery::create([
            'title' => 'Kegiatan Pembukaan KKN 2025',
            'text' => 'Dokumentasi kegiatan pembukaan KKN Universitas Sulawesi Barat.',
            'picture' => 'gallery1.jpg',
            'published_date' => '2025-02-01',
            'place' => 'Majene',
            'status' => 1,
        ]);

        Gallery::create([
            'title' => 'Monitoring Lokasi KKN',
            'text' => 'Kunjungan monitoring oleh Dosen Pembimbing Lapangan.',
            'picture' => 'gallery2.jpg',
            'published_date' => '2025-02-10',
            'place' => 'Polewali Mandar',
            'status' => 1,
        ]);

        Gallery::create([
            'title' => 'Penutupan Program KKN',
            'text' => 'Acara penutupan dan penarikan mahasiswa KKN.',
            'picture' => 'gallery3.jpg',
            'published_date' => '2025-03-05',
            'place' => 'Mamasa',
            'status' => 0,
        ]);
    }
}
