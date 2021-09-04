<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;
use DB;

class BookingController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:booking-list|booking-create|booking-edit|booking-delete', ['only' => ['index','store']]);
         $this->middleware('permission:booking-create', ['only' => ['create','store']]);
         $this->middleware('permission:booking-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:booking-delete', ['only' => ['destroy']]);
    }
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //print_r(implode(",", $request->email_temeplete));die;
        if($request->id){
            $validation = [
                    'start_date' => 'required|unique:bookings,start_date,'.$request->id,
                    'end_date' => 'required|unique:bookings,end_date,'.$request->id
                ];
        }else{
            $validation = [
                    'start_date' => 'required|unique:bookings,start_date',
                    'end_date' => 'required|unique:bookings,end_date'
                ];
        }
        $this->validate($request, $validation);
        //print_r($request->contacts);die;
        if($request->id){
            //$input = $request->all();
            $booking = Booking::find($request->id);
            $booking->update(['list_name' => $request->list_name]);
           
        } else{
            
            $booking   =   Booking::Create( [
                        'company_id' => Auth()->user()->company_id,
                        'vehicle_id'=> $request->vehicle_id,
                        'start_date'=> $request->start_date,
                        'end_date'=> $request->end_date,
                        'booking_reference'=> $request->booking_reference,
                        'purpose_of_lone'=> $request->purpose_of_lone,
                        'loan_type'=> $request->loan_type,
                        'booking_notes'=> $request->booking_notes,
                        'lag_time'=> $request->lag_time,
                        'lag_notes'=> $request->lag_notes,
                        'lead_time'=> $request->lead_time,
                        'lead_notes'=> $request->lead_notes,
                        'show_delivery_day'=> $request->show_delivery_day,
                        'show_collectioin_day'=> $request->show_collectioin_day,
                        'contacts'=> !empty($request->contacts)? implode(",", $request->contacts):'',
                        'primary_contact'=> $request->primary_contact,
                        'vehicle'=> $request->vehicle,
                        'email_temeplete'=> !empty($request->email_temeplete)? implode(",", $request->email_temeplete):'',

                        'ob_pick_from'=> $request->ob_pick_from,
                        'ob_pick_from_notes'=> $request->ob_pick_from_notes,
                        'ob_deliver_to'=> $request->ob_deliver_to,
                        'ob_deliver_to_address_1'=> $request->ob_deliver_to_address_1,
                        'ob_deliver_to_town_city'=> $request->ob_deliver_to_town_city,
                        'ob_deliver_to_post_code'=> $request->ob_deliver_to_post_code,
                        'ob_deliver_to_deliver_notes'=> $request->ob_deliver_to_deliver_notes,
                        'ob_deliver_to_address_2'=> $request->ob_deliver_to_address_2,
                        'ob_deliver_to_county'=> $request->ob_deliver_to_county,
                        'ob_deliver_to_country'=> $request->ob_deliver_to_country,

                        'ib_pick_from'=> $request->ib_pick_from,
                        'ib_pick_from_address_1'=> $request->ib_pick_from_address_1,
                        'ib_pick_from_town_city'=> $request->ib_pick_from_town_city,
                        'ib_pick_from_post_code'=> $request->ib_pick_from_post_code,
                        'ib_pick_from_address_2'=> $request->ib_pick_from_address_2,
                        'ib_pick_from_county'=> $request->ib_pick_from_county,
                        'ib_pick_from_country'=> $request->ib_pick_from_country,
                        'ib_pick_from_notes'=> $request->ib_pick_from_notes,
                        'ib_deliver_to'=> $request->ib_deliver_to,
                        'ib_deliver_to_notes'=> $request->ib_deliver_to_notes
                    ]);
            
            //print_r($lists->id);die;

        }
        return response()->json(['success' => true]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function show(Booking $booking)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function edit(Booking $booking)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Booking $booking)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function destroy(Booking $booking)
    {
        //
    }
}
