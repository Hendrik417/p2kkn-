<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FrequentlyAskedQuestions extends Model
{
    protected $table = 'tb_faqs';

    protected $primaryKey = 'id_faqs';

    protected $fillable = [
    'question',
    'answer',
    'is_published',
    'view_count'
    ];
}
