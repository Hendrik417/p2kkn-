<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use HasFactory;
    protected $table="laporans";

    protected $fillable = [
        'nama_file',
        'nim',
        'jenis_laporan',
        'tanggal_upload',
        'file_path',
        'status',
        'catatan'
    ];
}
