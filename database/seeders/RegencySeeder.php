<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class RegencySeeder extends Seeder
{
    public function run()
    {
        $now = Carbon::now();

        $regencies = [
            ['regency_name' => 'Mamuju',  'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['regency_name' => 'Majene',   'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['regency_name' => 'Polewali Mandar', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['regency_name' => 'Mamasa',  'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['regency_name' => 'Mamuju Tengah',  'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['regency_name' => 'Pasangkayu', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
        ];

        DB::table('tb_regency')->insert($regencies);
    }
}
