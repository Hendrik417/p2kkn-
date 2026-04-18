<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ViewReport extends Model
{
    protected $table = 'view_reports';

    protected $fillable = [
        'students_id',
        'groups_id',
        'reports_id',
    ];

    /*
    |--------------------------------------------------------------------------
    | RELATION
    |--------------------------------------------------------------------------
    */

    // ke mahasiswa
    public function student()
    {
        return $this->belongsTo(User::class, 'students_id');
    }

    // ke kelompok
    public function groups()
    {
        return $this->belongsTo(Groups::class, 'id_groups');
    }

    // ke laporan
    public function reports()
    {
        return $this->belongsTo(Report::class, 'report_id');
    }
}
