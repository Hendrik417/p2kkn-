<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class PeriodsSeeder extends Seeder
{
    public function run()
    {
        DB::table('tb_periods')->insert([
            [
                'periods' => '2023/2024',
                'active_dates' => '2023-07-01',
                'status' => 0,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'periods' => '2024/2025',
                'active_dates' => '2024-07-01',
                'status' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'periods' => '2025/2026',
                'active_dates' => '2025-07-01',
                'status' => 0,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
}
