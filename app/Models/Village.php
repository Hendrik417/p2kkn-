<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Village extends Model
{
    use SoftDeletes;

    // nama tabel
    protected $table = 'villages';

    // primary key
    protected $primaryKey = 'id';

    // field yang boleh diisi
    protected $fillable = [
        'name',
        'slug',
        'district_id',
        'type',
        'geojson',
        'color',
        'is_active'
    ];

    // casting data
    protected $casts = [
        'geojson' => 'array',
        'is_active' => 'boolean'
    ];

    /*
    |--------------------------------------------------------------------------
    | RELATIONSHIP
    |--------------------------------------------------------------------------
    */

    public function district()
    {
        return $this->belongsTo(District::class);
    }
}
