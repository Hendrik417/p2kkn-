<?php

namespace Database\Seeders;


use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // PENTING: Bersihkan cache permission di awal
        app()[PermissionRegistrar::class]->forgetCachedPermissions();
        // Mendefinisikan daftar permission yang akan dibuat

        $permissions = [
            'view users',
            'create users',
            'edit users',
            'delete users',
            'view my-devices',
            'create my-devices',
            'edit my-devices',
            'delete my-devices',
        ];

        // Ganti bagian ini:
        foreach ($permissions as $permission) {
            // Permission::create(['name' => $permission]); <-- Hapus/Komentar ini

            // Gunakan ini:
            Permission::firstOrCreate(['name' => $permission]);
        }

        // Lakukan hal yang sama untuk Role agar tidak error di kemudian hari:
        $adminRole = Role::firstOrCreate(['name' => 'admin']);
        // $userRole = Role::firstOrCreate(['name' => 'user']);
        $lecturerRole = Role::firstOrCreate(['name' => 'lecturer']);
        $studentRole = Role::firstOrCreate(['name' => 'student']);

        $studentRole->givePermissionTo([
            'view my-devices',
            'create my-devices',
            'edit my-devices',
            'delete my-devices',
        ]); #2

        ;
    }
}

