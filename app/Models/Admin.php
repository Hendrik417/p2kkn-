<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    // nama tabel
    protected $table = 'tb_admin';

    // primary key
    protected $primaryKey = 'id_admin';

    // field yang boleh diisi
   //protected $fillable ='email', 'password','username',;

    // field yang tidak boleh diisi
    protected $guarded =
        'id_admin';
}
