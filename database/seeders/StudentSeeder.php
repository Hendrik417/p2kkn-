<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class StudentSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('tb_students')->insert([
            [
                'name' => 'Ahmad Fauzan',
                'nim' => '2022001',
                'email' => 'ahmadfauzan@example.com',
                'groups' => 'A',
                'faculties' => 'Teknik',
                'batch' => '2022',
                'status' => 'Aktif',
                'locations' => 'Majene',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Siti Rahma',
                'nim' => '2022002',
                'email' => 'sitirahma@example.com',
                'groups' => 'B',
                'faculties' => 'Ekonomi',
                'batch' => '2022',
                'status' => 'Aktif',
                'locations' => 'Polewali',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Muhammad Ilham',
                'nim' => '2021003',
                'email' => 'ilham@example.com',
                'groups' => 'A',
                'faculties' => 'Pertanian',
                'batch' => '2021',
                'status' => 'Nonaktif',
                'locations' => 'Mamuju',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
