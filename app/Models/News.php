<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    // nama tabel
    protected $table = 'tb_news';

    // primary key
    protected $primaryKey = 'id_news';

    // field yang boleh diisi
   //protected $fillable ='title', 'text','picture','published_date','place','status';
    // field yang tidak boleh diisi
    protected $guarded =
        'id_news';
}
