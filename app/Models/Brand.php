<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;
class Brand extends Model
{
    use HasFactory;
//protected $table = 'Brand';
	protected $fillable = [
		'company_id',
		'brand_name',
        'file_name',
    ];
/**
     * Set the user's first name.
     *
     * @param  string  $value
     * @return void
     */
    public function setFilenamesAttribute($value)
    {
        $this->attributes['brands'] = json_encode($value);
    }
}
