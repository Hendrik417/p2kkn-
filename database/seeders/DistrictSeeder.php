<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class DistrictSeeder extends Seeder
{
    public function run()
    {
        $districts = [
            // Majene
            ['name' => 'Banggae', 'regency_id' => 1],
            ['name' => 'Banggae Timur', 'regency_id' => 1],
            ['name' => 'Malunda', 'regency_id' => 1],
            ['name' => 'Pamboang', 'regency_id' => 1],
            ['name' => 'Sendana', 'regency_id' => 1],
            ['name' => 'Tapalang', 'regency_id' => 1],
            ['name' => 'Tapalang Barat', 'regency_id' => 1],

            // Mamasa
            ['name' => 'Aralle', 'regency_id' => 2],
            ['name' => 'Mambi', 'regency_id' => 2],
            ['name' => 'Messawa', 'regency_id' => 2],
            ['name' => 'Nosu', 'regency_id' => 2],
            ['name' => 'Pana', 'regency_id' => 2],
            ['name' => 'Rantebulahan', 'regency_id' => 2],
            ['name' => 'Sampaga', 'regency_id' => 2],

            // Mamuju
            ['name' => 'Bonehau', 'regency_id' => 3],
            ['name' => 'Kalukku', 'regency_id' => 3],
            ['name' => 'Mamuju', 'regency_id' => 3],
            ['name' => 'Simboro', 'regency_id' => 3],
            ['name' => 'Tapalang Mamuju', 'regency_id' => 3], // Dibedakan agar unique slug tidak bentrok

            // Polewali Mandar
            ['name' => 'Balanipa', 'regency_id' => 4],
            ['name' => 'Binuang', 'regency_id' => 4],
            ['name' => 'Campalagian', 'regency_id' => 4],
            ['name' => 'Luyo', 'regency_id' => 4],
            ['name' => 'Mapilli', 'regency_id' => 4],
            ['name' => 'Matakali', 'regency_id' => 4],
            ['name' => 'Polewali', 'regency_id' => 4],

            // Pasangkayu
            ['name' => 'Bambalamotu', 'regency_id' => 5],
            ['name' => 'Bungku', 'regency_id' => 5],
            ['name' => 'Pasangkayu', 'regency_id' => 5],
            ['name' => 'Tikke Raya', 'regency_id' => 5],
        ];

        foreach ($districts as $district) {
            DB::table('districts')->insert([
                'name'       => $district['name'],
                'slug'       => Str::slug($district['name'] . '-' . $district['regency_id']), // Slug unik berdasarkan nama & ID kabupaten
                'regency_id' => $district['regency_id'],
                'type'       => 'Kecamatan',
                'is_active'  => true,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
