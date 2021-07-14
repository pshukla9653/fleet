<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;
	
	protected $table = 'Company';
    public $timestamps = true;
	
	protected $fillable = [
		'company_name',
        'jab_title',
		'address',
		'city',
		'country',
		'post_code'
		
    ];
	
}
