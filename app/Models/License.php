<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class License extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'ip_address',
        'token',
        'expires_at',
        'company_id',
        'is_active',
        'webhook_url',
        'request_count',
        

    ];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }
}
