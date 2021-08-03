<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Scopes\CompanyScope;


class Department extends Model
{
    use HasFactory;
	
	protected $fillable = [
		'company_id',
        'department_name',
    ];

    protected static function booted()
    {
        static::addGlobalScope(new CompanyScope);
    }
}
