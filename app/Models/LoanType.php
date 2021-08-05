<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Scopes\CompanyScope;

class LoanType extends Model
{
    use HasFactory;

    protected $fillable = [
		'company_id',
        'loan_type',
    ];

    // Add Company Globle Scope
    protected static function booted()
    {
        static::addGlobalScope(new CompanyScope);
    }


}
