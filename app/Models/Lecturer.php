<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lecturer extends Model
{
    // Nama tabel disesuaikan dengan header gambar
    protected $table = 'lecturer';

    // Primary key (blok ungu di gambar tertulis 'id')
    protected $primaryKey = 'id';

    /**
     * Field yang boleh diisi (Mass Assignment)
     * Disesuaikan dengan urutan dan nama di gambar
     */
    protected $fillable = [
        'user_id',
        'email',
        'password',
        'username',
        'name',
        'faculties',
        'study_program', // Sesuai gambar: tanpa 's'
        'number_of_groups',
        'location' // Berdasarkan "1 more" atau field tambahan umum
    ];

    /**
     * Field yang diproteksi
     */
    protected $guarded = [
        'id'
    ];

    // Aktifkan ini jika tabel tidak memiliki kolom created_at & updated_at
    // public $timestamps = false;
}
