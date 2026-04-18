<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class VillageSeeder extends Seeder
{
    public function run()
    {
        $villages = [
            // Majene - Banggae (district_id = 1)
            ['name' => 'Banggae I', 'district_id' => 1, 'type' => 'Kelurahan'],
            ['name' => 'Banggae II', 'district_id' => 1, 'type' => 'Kelurahan'],
            ['name' => 'Bontomate', 'district_id' => 1, 'type' => 'Kelurahan'],

            // Majene - Banggae Timur (district_id = 2)
            ['name' => 'Pappaseng', 'district_id' => 2, 'type' => 'Kelurahan'],
            ['name' => 'Kalukkang', 'district_id' => 2, 'type' => 'Kelurahan'],

            // Mamasa - Aralle (district_id = 8)
            ['name' => 'Aralle Tengah', 'district_id' => 8, 'type' => 'Desa'],
            ['name' => 'Aralle Utara', 'district_id' => 8, 'type' => 'Desa'],

            // Mamuju - Mamuju (district_id = 15)
            ['name' => 'Mamuju Barat', 'district_id' => 15, 'type' => 'Kelurahan'],
            ['name' => 'Mamuju Selatan', 'district_id' => 15, 'type' => 'Kelurahan'],

            // Polewali Mandar - Polewali (district_id = 22)
            ['name' => 'Polewali Tengah', 'district_id' => 22, 'type' => 'Kelurahan'],
            ['name' => 'Polewali Selatan', 'district_id' => 22, 'type' => 'Kelurahan'],

            // Pasangkayu - Pasangkayu (district_id = 28)
            ['name' => 'Pasangkayu Tengah', 'district_id' => 28, 'type' => 'Kelurahan'],
            ['name' => 'Pasangkayu Utara', 'district_id' => 28, 'type' => 'Kelurahan'],
        ];

        foreach ($villages as $village) {
            DB::table('villages')->insert([
                'name'        => $village['name'],
                // Slug dibuat unik dengan menggabungkan nama desa dan id kecamatan
                'slug'        => Str::slug($village['name'] . '-' . $village['district_id']),
                'district_id' => $village['district_id'],
                'type'        => $village['type'],
                'is_active'   => true,
                'created_at'  => now(),
                'updated_at'  => now(),
            ]);
        }
    }
}
