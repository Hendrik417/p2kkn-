<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Periods extends Model
{
    // nama tabel
    protected $table = 'tb_periods';

    // primary key
    protected $primaryKey = 'id_periods';

    // field yang boleh diisi
   //protected $fillable ='active_dates','status','periods';

    // field yang tidak boleh diisi
    protected $guarded =
        'id_periods';
}
