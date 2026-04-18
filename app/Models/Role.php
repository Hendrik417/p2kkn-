<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Permission\Models\Role as SpatieRole;

class Role extends SpatieRole
{
    use HasFactory;

    protected $guard_name = 'web';

    
    public function isAdmin(): bool
    {
        return $this->name === 'admin';
    }
}
