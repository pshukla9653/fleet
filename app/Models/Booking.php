<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Scopes\CompanyScope;

class Booking extends Model
{
    use HasFactory;
     
    protected $fillable = [
		'company_id',
        'vehicle_id',
		'start_date',
        'end_date',
        'booking_reference',
        'purpose_of_lone',
        'loan_type',
        'booking_notes',
        'lag_time',
        'lag_notes',
        'lead_time',
        'lead_notes',
        'show_delivery_day',
        'show_collectioin_day',
        'contacts',
        'vehicle',
        'email_temeplete',

        'ob_pick_from',
        'ob_pick_from_notes',
        'ob_deliver_to',
        'ob_deliver_to_address_1',
        'ob_deliver_to_town_city',
        'ob_deliver_to_post_code',
        'ob_deliver_to_deliver_notes',
        'ob_deliver_to_address_2',
        'ob_deliver_to_county',
        'ob_deliver_to_country',

        'ib_pick_from',
        'ib_pick_from_address_1',
        'ib_pick_from_town_city',
        'ib_pick_from_post_code',
        'ib_pick_from_address_2',
        'ib_pick_from_county',
        'ib_pick_from_country',
        'ib_pick_from_notes',
        'ib_deliver_to',
        'ib_deliver_to_notes'
    ];

    protected static function booted()
    {
        static::addGlobalScope(new CompanyScope);
    }
}
