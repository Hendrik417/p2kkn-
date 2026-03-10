<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Groups;

class GroupsSeeder extends Seeder
{
    public function run()
    {
        Groups::create([
            'periods' => 1,
            'groups_names' => 'Kelompok 1',
            'villages' => 1,
            'districts' => 1,
            'regency' => 1,
            'survising_lectures' => 1,
        ]);

        Groups::create([
            'periods' => 1,
            'groups_names' => 'Kelompok 2',
            'villages' => 2,
            'districts' => 1,
            'regency' => 1,
            'survising_lectures' => 2,
        ]);

        Groups::create([
            'periods' => 2,
            'groups_names' => 'Kelompok 3',
            'villages' => 3,
            'districts' => 2,
            'regency' => 2,
            'survising_lectures' => 1,
        ]);
    }
}
