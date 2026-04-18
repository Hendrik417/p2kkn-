<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Permission\Models\Permission as SpatiePermission;

class Permission extends SpatiePermission
{
    use HasFactory;


    protected $guard_name = 'web';

    
    public function isViewOnly(): bool
    {
        return str_contains($this->name, 'view');
    }
}
