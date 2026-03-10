<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    // nama tabel
    protected $table = 'tb_gallery';

    // primary key
    protected $primaryKey = 'id_gallery';

    // field yang boleh diisi
    //protected $fillable ='title', 'text','picture','published_date','place','status';

    // field yang tidak boleh diisi
    protected $guarded =
        'id_gallery';
}
