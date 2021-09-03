<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Scopes\CompanyScope;

class Lists extends Model
{
    use HasFactory;

    protected $fillable = [
		'company_id',
        'list_name',
        'contacts',
        'count_contacts'
    ];

    protected static function booted()
    {
        static::addGlobalScope(new CompanyScope);
    }
}
