<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Scopes\CompanyScope;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
		'company_id',
        'vehicle_id',
		'start_date',
        'end_date',
        'booking_reference',
        'purpose_of_loan',
        'loan_type',
        'booking_notes',
        'lag_time',
        'lag_notes',
        'lead_time',
        'lead_notes',
        'show_delivery_day',
        'show_collection_day',
        'contacts',
        'primary_contact',
        'vehicle',
        'email_template',
        'email_service',
        'ob_pick_from',
        'ob_pick_from_address_1',
        'ob_pick_from_town_city',
        'ob_pick_from_post_code',
        'ob_pick_from_deliver_notes',
        'ob_pick_from_address_2',
        'ob_pick_from_county',
        'ob_pick_from_country',
        'ob_pick_from_notes',
        'ob_deliver_to',
        'ob_deliver_to_address_1',
        'ob_deliver_to_town_city',
        'ob_deliver_to_post_code',
       
        'ob_deliver_to_address_2',
        'ob_deliver_to_county',
        'ob_deliver_to_country',
        'ob_deliver_to_notes',
        

        'ib_pick_from',
        'ib_pick_from_address_1',
        'ib_pick_from_town_city',
        'ib_pick_from_post_code',
        'ib_pick_from_address_2',
        'ib_pick_from_county',
        'ib_pick_from_country',
        'ib_pick_from_notes',
        'ib_deliver_to',
        'ib_deliver_to_address_1',
        'ib_deliver_to_town_city',
        'ib_deliver_to_post_code',
        'ib_deliver_to_address_2',
        'ib_deliver_to_county',
        'ib_deliver_to_country',
        'ib_deliver_to_notes',
        'booking_start_date',
        'booking_end_date',
    ];

    public function vehicle(): BelongsTo
    {
        return $this->belongsTo(Vehicle::class);
    }

    public function emailTemplate(): BelongsTo
    {
        return $this->belongsTo(EmailTemplate::class, 'email_temeplete');
    }

    protected static function booted()
    {
        static::addGlobalScope(new CompanyScope);
    }
}
