<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Pastikan 'username' diisi karena database kamu membutuhkannya
        $admin = User::updateOrCreate(
            ['email' => 'admin@gmail.com'],
            [
                'name'              => 'Admin Utama',
                'username'          => 'admin', // AKTIFKAN BARIS INI
                'password'          => Hash::make('password123'),
                'email_verified_at' => now(),
            ]
        );

        // Berikan role admin
        $admin->assignRole('admin');
    }
}
