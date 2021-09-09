<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Scopes\CompanyScope;

class History extends Model
{
    use HasFactory;

    protected $fillable = [
		'company_id',
        'user_id',
        'booking_id',
		'user_email',
        'event',
        
    ];

    protected static function booted()
    {
        static::addGlobalScope(new CompanyScope);
    }
}
