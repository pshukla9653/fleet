<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Scopes\CompanyScope;
use App\Models\Brand;
use App\Models\Region;
use App\Models\Department;

class Vehicle extends Model
{
    use HasFactory;

    protected $fillable = [
		'company_id',
        'brand_id',
        'region_id',
        'department_id',
        'model',
        'derivative',
        'registration_number',
        'loan_cost',
        'registration_plate_colour',
        'vin',
        'adoption_date',
        'projected_defleet_date',
        'lead_time',
        'lag_time',
        'engine',
        'colour',
        'mileage',
        'value',
        'order_number',
        'other_details',
        'notes',
        'image',
    ];

    protected static function booted()
    {
        static::addGlobalScope(new CompanyScope);
    }

    public function brand()
    {
        return $this->hasOne(Brand::class, 'id', 'brand_id');
    }

    public function region()
    {
        return $this->hasOne(Region::class, 'id', 'region_id');
    }

    public function department()
    {
        return $this->hasOne(Department::class, 'id', 'department_id');
    }

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }
}
