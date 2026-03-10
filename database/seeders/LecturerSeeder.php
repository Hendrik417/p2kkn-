<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Lecturer;
use Illuminate\Support\Facades\Hash;

class LecturerSeeder extends Seeder
{
    public function run()
    {
        Lecturer::create([
            'username' => 'dosen1',
            'email' => 'dosen1@unsulbar.ac.id',
            'password' => Hash::make('password123'),
            'faculties' => 'Teknik',
            'study_programs' => 'Informatika',
            'number_of_groups' => 3,
            'locations' => 'Majene',
        ]);

        Lecturer::create([
            'username' => 'dosen2',
            'email' => 'dosen2@unsulbar.ac.id',
            'password' => Hash::make('password123'),
            'faculties' => 'Ekonomi',
            'study_programs' => 'Manajemen',
            'number_of_groups' => 2,
            'locations' => 'Polewali Mandar',
        ]);
    }
}
