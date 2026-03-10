<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\FrequentlyAskedQuestions;

class FaqSeeder extends Seeder
{
    public function run()
    {
        FrequentlyAskedQuestions::create([
            'questions' => 'Apa itu KKN?',
            'answers' => 'KKN adalah Kuliah Kerja Nyata yang merupakan bentuk pengabdian mahasiswa kepada masyarakat.',
            'is_published' => 1,
            'view_count' => 120,
        ]);

        FrequentlyAskedQuestions::create([
            'questions' => 'Berapa lama durasi KKN?',
            'answers' => 'Durasi KKN biasanya berlangsung selama 45 hari sesuai ketentuan kampus.',
            'is_published' => 1,
            'view_count' => 85,
        ]);

        FrequentlyAskedQuestions::create([
            'questions' => 'Bagaimana cara mendaftar KKN?',
            'answers' => 'Mahasiswa dapat mendaftar melalui sistem P2KKN dengan menggunakan akun masing-masing.',
            'is_published' => 0,
            'view_count' => 30,
        ]);
    }
}
