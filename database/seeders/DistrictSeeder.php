<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DistrictSeeder extends Seeder
{
    public function run()
    {
        $districts = [
            // Majene
            ['district_name' => 'Banggae', 'regency_id' => 1],
            ['district_name' => 'Banggae Timur', 'regency_id' => 1],
            ['district_name' => 'Malunda', 'regency_id' => 1],
            ['district_name' => 'Pamboang', 'regency_id' => 1],
            ['district_name' => 'Sendana', 'regency_id' => 1],
            ['district_name' => 'Tapalang', 'regency_id' => 1],
            ['district_name' => 'Tapalang Barat', 'regency_id' => 1],

            // Mamasa
            ['district_name' => 'Aralle', 'regency_id' => 2],
            ['district_name' => 'Mambi', 'regency_id' => 2],
            ['district_name' => 'Messawa', 'regency_id' => 2],
            ['district_name' => 'Nosu', 'regency_id' => 2],
            ['district_name' => 'Pana', 'regency_id' => 2],
            ['district_name' => 'Rantebulahan', 'regency_id' => 2],
            ['district_name' => 'Sampaga', 'regency_id' => 2],

            // Mamuju
            ['district_name' => 'Bonehau', 'regency_id' => 3],
            ['district_name' => 'Kalukku', 'regency_id' => 3],
            ['district_name' => 'Mamuju', 'regency_id' => 3],
            ['district_name' => 'Simboro', 'regency_id' => 3],
            ['district_name' => 'Tapalang', 'regency_id' => 3],

            // Polewali Mandar
            ['district_name' => 'Balanipa', 'regency_id' => 4],
            ['district_name' => 'Binuang', 'regency_id' => 4],
            ['district_name' => 'Campalagian', 'regency_id' => 4],
            ['district_name' => 'Luyo', 'regency_id' => 4],
            ['district_name' => 'Mapilli', 'regency_id' => 4],
            ['district_name' => 'Matakali', 'regency_id' => 4],
            ['district_name' => 'Polewali', 'regency_id' => 4],

            // Pasangkayu
            ['district_name' => 'Bambalamotu', 'regency_id' => 5],
            ['district_name' => 'Bungku', 'regency_id' => 5],
            ['district_name' => 'Pasangkayu', 'regency_id' => 5],
            ['district_name' => 'Tikke Raya', 'regency_id' => 5],
        ];

        DB::table('tb_districts')->insert($districts);
    }
}
