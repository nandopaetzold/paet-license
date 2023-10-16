<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Sanctum\HasApiTokens;

class Company extends  Authenticatable
{
    use HasApiTokens;

    public function licenses()
    {
        return $this->hasMany(License::class);
    }
}
