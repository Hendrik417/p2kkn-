<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $students = [
            [
                'name'     => 'Ahmad Fauzan',
                'email'    => 'ahmadfauzan@example.com',
                'username' => '2022001', // TAMBAHKAN INI (Gunakan NIM sebagai username)
                'password' => Hash::make('password'),
            ],
            [
                'name'     => 'Siti Rahma',
                'email'    => 'sitirahma@example.com',
                'username' => '2022002', // TAMBAHKAN INI
                'password' => Hash::make('password'),
            ],
        ];

        foreach ($students as $data) {
            $user = User::updateOrCreate(
                ['email' => $data['email']],
                $data
            );

            if (method_exists($user, 'assignRole')) {
                $user->assignRole('student');
            }
        }
    }
}
