<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Scopes\CompanyScope;

class ListContact extends Model
{
    use HasFactory;

    protected $fillable = [
		'company_id',
        'list_id',
        'contact_id'
    ];

    protected static function booted()
    {
        static::addGlobalScope(new CompanyScope);
    }
}
