<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Groups extends Model
{
    // nama tabel
    protected $table = 'tb_groups';

    // primary key
    protected $primaryKey = 'id_groups';

    protected $fillable = [
        'periods',
        'groups_names',
        'villages',
        'districts',
        'regency',
        'survising_lectures'
    ];
}
