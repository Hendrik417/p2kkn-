<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lecturer extends Model
{
    // nama tabel
    protected $table = 'tb_lecturer';

    // primary key
    protected $primaryKey = 'id_lecturer';

    // field yang boleh diisi
   //protected $fillable ='email', 'password','username','groups','faculties','study_programs','number_of_groups','locations';

    // field yang tidak boleh diisi
    protected $guarded =
        'id_lecturer';
}
