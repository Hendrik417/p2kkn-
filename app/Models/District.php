<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class District extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'is_active',
        'regency_id'
    ];

    public function regency()
    {
        return $this->belongsTo(Regency::class);
    }

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($district) {
            $district->slug = Str::slug($district->name);
        });

        static::updating(function ($district) {
            $district->slug = Str::slug($district->name);
        });
    }
}
