<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;


class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Mendefinisikan daftar permission yang akan dibuat
        $permissions = [
            'view regencies',
            'create regencies',
            'edit regencies',
            'view district',
            'create district',
            'edit district',
            'view villages',
            'create villages',
            'edit villages',
        ];

        // Membuat permission satu per satu
        foreach ($permissions as $permission) {
        Permission::firstOrCreate([
        'name' => $permission,
        'guard_name' => 'web']);}

        // Membuat role 'admin'
        $adminRole = Role::create(['name' => 'admin']);

        // Memberikan permission kepada role 'teacher'
        // $teacherRole->givePermissionTo($permissions); #1
        $adminRole->syncPermissions($permissions);

        // Membuat role 'student'
        $studentRole = Role::create(['name' => 'student']);

        // Memberikan permission kepada role 'student'
        // $studentRole->givePermissionTo([
        //     'view courses',
        // ]);

        // Membuat data user superadmin
        $user = User::create([
            'name' => 'Super Admin',
            'email' => 'superadmin@gmail.com',
            'password' => bcrypt('password'),
        ]);

        // Menetapkan role 'admin' kepada user superadmin
        $user->assignRole($adminRole);
    }
}
