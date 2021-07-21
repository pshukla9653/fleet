<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class Contact extends Model
{
    use HasFactory, Notifiable, HasRoles;
	
	//protected $table = 'Contact';
	protected $fillable = [
		'first_name',
        'last_name',
		'company_name',
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
}
