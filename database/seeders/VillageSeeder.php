<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VillageSeeder extends Seeder
{
    public function run()
    {
        $villages = [
            // Majene
            // district_id = 1 (Banggae)
            ['village_name' => 'Banggae I', 'district_id' => 1],
            ['village_name' => 'Banggae II', 'district_id' => 1],
            ['village_name' => 'Bontomate', 'district_id' => 1],

            // district_id = 2 (Banggae Timur)
            ['village_name' => 'Pappaseng', 'district_id' => 2],
            ['village_name' => 'Kalukkang', 'district_id' => 2],

            // Mamasa
            // district_id = 8 (Aralle)
            ['village_name' => 'Aralle Tengah', 'district_id' => 8],
            ['village_name' => 'Aralle Utara', 'district_id' => 8],

            // Mamuju
            // district_id = 15 (Mamuju)
            ['village_name' => 'Mamuju Barat', 'district_id' => 15],
            ['village_name' => 'Mamuju Selatan', 'district_id' => 15],

            // Polewali Mandar
            // district_id = 22 (Polewali)
            ['village_name' => 'Polewali Tengah', 'district_id' => 22],
            ['village_name' => 'Polewali Selatan', 'district_id' => 22],

            // Pasangkayu
            // district_id = 28 (Pasangkayu)
            ['village_name' => 'Pasangkayu Tengah', 'district_id' => 28],
            ['village_name' => 'Pasangkayu Utara', 'district_id' => 28],
        ];

        DB::table('tb_village')->insert($villages);
    }
}
