<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    // Nama tabel di database
    protected $table = 'admin';

    // Primary key sesuai gambar (id berwarna ungu)
    protected $primaryKey = 'id';

    /**
     * Field yang boleh diisi (Mass Assignment)
     * userid, password, username, dan email
     */
    protected $fillable = [
        'user_id',
        'password',
        'username',
        'email'
    ];

    /**
     * Field yang tidak boleh diisi secara massal
     * Biasanya primary key 'id'
     */
    protected $guarded = [
        'id'
    ];

    // Jika kamu tidak menggunakan kolom 'created_at' dan 'updated_at',
    // tambahkan baris berikut agar tidak error:
    // public $timestamps = false;
}
