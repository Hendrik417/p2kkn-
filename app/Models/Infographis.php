<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Infographis extends Model
{
    // nama tabel
    protected $table = 'tb_infographis';

    // primary key
    protected $primaryKey = 'id_infographis';

    // field yang boleh diisi
    //protected $fillable ='title', 'text','picture','published_date','place','status';
    // field yang tidak boleh diisi
    protected $guarded =
        'id_infographis';
}
