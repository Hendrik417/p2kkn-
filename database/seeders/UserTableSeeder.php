<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
    // 1. Buat 10 user random (Sekarang aman karena Factory sudah diperbaiki)
    User::factory(10)->create()->each(function ($user) {
        $user->assignRole('student');
    });

    // 2. Buat admin secara manual
    $admin = User::firstOrCreate(
        ['email' => 'admin@admin.com'],
        [
            'name' => 'Admin',
            'username' => 'admin_pusat', // TAMBAHKAN INI
            'password' => Hash::make('password'),
            'email_verified_at' => now(),
        ]
    );

    $admin->assignRole('admin');
    }
}
