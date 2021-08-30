<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Scopes\CompanyScope;

class EmailTemplate extends Model
{
    use HasFactory;
    protected $fillable = [
		'company_id',
		'description',
        'subject',
        'from_name',
        'reply_to_email',
        'from_email',
        'to_email',
        'cc_email',
        'bcc_email',
        'status',
        'email_body'

    ];

    protected static function booted()
    {
        static::addGlobalScope(new CompanyScope);
    }
}
