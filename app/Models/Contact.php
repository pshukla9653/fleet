<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;
use App\Scopes\CompanyScope;


class Contact extends Model
{
    use HasFactory, Notifiable, HasRoles;

	//protected $table = 'Contact';
	protected $fillable = [
		'company_id',
		'first_name',
        'last_name',
		'job_title',
        'email',
		'phone_number',
		'address1',
		'address2',
		'address3',
		'city',
		'country',
        'post_code',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
	public function company(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
	    return $this->belongsTo(Company::class, 'company_id', 'id');
    }

	protected static function booted()
    {
        static::addGlobalScope(new CompanyScope);
    }
}
