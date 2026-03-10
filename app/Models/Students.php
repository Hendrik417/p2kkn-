<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Students extends Model
{
    // nama tabel
    protected $table = 'tb_students';

    // primary key
    protected $primaryKey = 'id_students';

    // field yang boleh diisi
   //protected $fillable ='email', 'password','username','groups','faculties','bacth','status','locations';

    // field yang tidak boleh diisi
    protected $guarded =
        'id_student';
}
