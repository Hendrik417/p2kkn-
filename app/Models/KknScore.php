<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\students;

class KknScore extends Model
{
    protected $fillable = [
        'student_id',
        'lecturer_id',
        'disiplin',
        'kerjasama',
        'inisiatif',
        'laporan',
        'total_score',
    ];

    public function students()
    {
        return $this->belongsTo(Students::class);
    }
    public function create()
    {
    $students = Students::all();

    return view('dosen.nilai-create', compact('students'));
    }
}
