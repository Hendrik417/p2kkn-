<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Regency extends Model
{
    // nama tabel
    protected $table = 'tb_regency';


    // field yang boleh diisi
   //protected $fillable ='regency', 'provinces','status';

    // field yang tidak boleh diisi
    protected $guarded =
        ['id'];
}
