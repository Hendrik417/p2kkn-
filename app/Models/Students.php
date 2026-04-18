<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Students extends Model
{
    // Nama tabel disesuaikan dengan header gambar
    protected $table = 'students';

    // Primary key adalah 'id' (kotak berwarna ungu)
    protected $primaryKey = 'id';

    /**
     * Field yang boleh diisi (Mass Assignment)
     * Ditambahkan 'userid', 'name', dan diperbaiki penulisan 'batch'
     */
    protected $fillable = [
        'user_id',
        'email',
        'password',
        'username',
        'name',
        'groups',
        'faculties',
        'batch',
        'status'
    ];

    /**
     * Field yang tidak boleh diisi secara massal
     * Biasanya primary key 'id'
     */
    protected $guarded = [
        'id'
    ];

    // Jika di tabel database tidak ada kolom created_at dan updated_at,
    // aktifkan baris di bawah ini:
    // public $timestamps = false;
}
