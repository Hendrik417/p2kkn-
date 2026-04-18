<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Students;

class Groups extends Model
{
    protected $table = 'tb_groups';
    protected $primaryKey = 'id_groups';

    protected $fillable = [
        'periods',
        'groups_names',
        'villages',
        'districts',
        'regency',
        'survising_lectures'
    ];

    // ✅ RELASI FIX
    public function students()
    {
        return $this->hasMany(Students::class, 'group_id', 'id_groups');
    }
}
