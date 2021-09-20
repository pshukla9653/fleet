<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\History;
use Illuminate\Http\Request;
use DB;

class BookingController extends Controller
{
    function __construct()
    {
        //  $this->middleware('permission:booking-list|booking-create|booking-edit|booking-delete', ['only' => ['index','store']]);
        //  $this->middleware('permission:booking-create', ['only' => ['create','store']]);
        //  $this->middleware('permission:booking-edit', ['only' => ['edit','update']]);
        //  $this->middleware('permission:booking-delete', ['only' => ['destroy']]);
    }
    public function index()
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
        //print_r($request->primary_contact);die;
        //dd($request->all());
        if($request->id){
            $validation = [
                    'start_date' => 'required',
                    'end_date' => 'required'
                ];
        }else{
            $validation = [
                    'start_date' => 'required',
                    'end_date' => 'required'
                ];
        }
        $this->validate($request, $validation);
        //print_r($request->contacts);die;
        if($request->id){
            $data   =   array(
                'vehicle_id'=> $request->vehicle_id,
                'start_date'=> $request->start_date,
                'end_date'=> $request->end_date,
                'booking_reference'=> $request->booking_reference,
                'purpose_of_loan'=> $request->purpose_of_loan,
                'loan_type'=> $request->loan_type,
                'booking_notes'=> $request->booking_notes,
                'lag_time'=> $request->lag_time,
                'lag_notes'=> $request->lag_notes,
                'lead_time'=> $request->lead_time,
                'lead_notes'=> $request->lead_notes,
                'show_delivery_day'=> $request->show_delivery_day,
                'show_collection_day'=> $request->show_collection_day,
                'contacts'=> $request->contacts,
                'primary_contact'=> $request->primary_contact,
                'email_template'=> !empty($request->email_template)? implode(",", $request->email_template):'',
                'email_service' => $request->email_service,
                'ob_pick_from'=> $request->ob_pick_from !=''?$request->ob_pick_from:null,
                'ob_pick_from_address_1'=> $request->ob_pick_from_address_1,
                'ob_pick_from_town_city'=> $request->ob_pick_from_town_city,
                'ob_pick_from_post_code'=> $request->ob_pick_from_post_code,
                'ob_pick_from_deliver_notes'=> $request->ob_pick_from_deliver_notes,
                'ob_pick_from_address_2'=> $request->ob_pick_from_address_2,
                'ob_pick_from_county'=> $request->ob_pick_from_county,
                'ob_pick_from_country'=> $request->ob_pick_from_country,
                'ob_pick_from_notes'=> $request->ob_pick_from_notes,
                'ob_deliver_to'=> $request->ob_deliver_to !=''?$request->ob_deliver_to:null,
                'ob_deliver_to_address_1'=> $request->ob_deliver_to_address_1,
                'ob_deliver_to_town_city'=> $request->ob_deliver_to_town_city,
                'ob_deliver_to_post_code'=> $request->ob_deliver_to_post_code,
                'ob_deliver_to_address_2'=> $request->ob_deliver_to_address_2,
                'ob_deliver_to_county'=> $request->ob_deliver_to_county,
                'ob_deliver_to_country'=> $request->ob_deliver_to_country,
                'ob_deliver_to_notes'=> $request->ob_deliver_to_notes,

                'ib_pick_from'=> $request->ib_pick_from !=''?$request->ib_pick_from:null,
                'ib_pick_from_address_1'=> $request->ib_pick_from_address_1,
                'ib_pick_from_town_city'=> $request->ib_pick_from_town_city,
                'ib_pick_from_post_code'=> $request->ib_pick_from_post_code,
                'ib_pick_from_address_2'=> $request->ib_pick_from_address_2,
                'ib_pick_from_county'=> $request->ib_pick_from_county,
                'ib_pick_from_country'=> $request->ib_pick_from_country,
                'ib_pick_from_notes'=> $request->ib_pick_from_notes,
                'ib_deliver_to'=> $request->ib_deliver_to !=''?$request->ib_deliver_to:null,
                'ib_deliver_to_address_1'=> $request->ib_deliver_to_address_1,
                'ib_deliver_to_town_city'=> $request->ib_deliver_to_town_city,
                'ib_deliver_to_post_code'=> $request->ib_deliver_to_post_code,
                'ib_deliver_to_address_2'=> $request->ib_deliver_to_address_2,
                'ib_deliver_to_county'=> $request->ib_deliver_to_county,
                'ib_deliver_to_country'=> $request->ib_deliver_to_country,
                'ib_deliver_to_notes'=> $request->ib_deliver_to_notes,
                'booking_start_date'=> $request->booking_start_date,
                'booking_end_date'=> $request->booking_end_date
            );
            $check_lag = Booking::select('*')->where('company_id', Auth()->user()->company_id)
            ->where('id', '<>', $request->id)
              ->where('vehicle_id', $request->vehicle_id)
              ->whereDate('start_date', '<=', $request->start_date)
              ->whereDate('end_date', '>=', $request->start_date)
              ->first();
            $check_lead = Booking::select('*')->where('company_id', Auth()->user()->company_id)
            ->where('id', '<>', $request->id)
            ->where('vehicle_id', $request->vehicle_id)
            ->whereDate('start_date', '<=', $request->end_date)
            ->whereDate('end_date', '>=', $request->end_date)
            ->first();
            $check_lag = json_decode(json_encode($check_lag), true);
            $check_lead = json_decode(json_encode($check_lead), true);
            //dd($check_lag);
            //dd($check_lead);
            
            
            
            if($check_lag ==null && $check_lead ==null){
            $booking = Booking::find($request->id);
            $booking->update($data);
            History::Create( [
                'company_id' => Auth()->user()->company_id,
                'user_id' => Auth()->user()->id,
                'booking_id'=> $request->id,
                'user_email'=> Auth()->user()->email,
                'event'=> 'Modified',
            ]);
            }
            else{
                return response()->json(['success' => false]);
            }
           
        } else{
            $check_lag = Booking::select('*')->where('company_id', Auth()->user()->company_id)
              ->where('vehicle_id', $request->vehicle_id)
              ->whereDate('start_date', '<=', $request->start_date)
              ->whereDate('end_date', '>=', $request->start_date)
              ->first();
            $check_lead = Booking::select('*')->where('company_id', Auth()->user()->company_id)
            ->where('vehicle_id', $request->vehicle_id)
            ->whereDate('start_date', '<=', $request->end_date)
            ->whereDate('end_date', '>=', $request->end_date)
            ->first();
            $check_lag = json_decode(json_encode($check_lag), true);
            $check_lead = json_decode(json_encode($check_lead), true);
            //dd($check_lag);
            //dd($check_lead);
            if($check_lag ==null && $check_lead ==null){
            $booking   =   Booking::Create( [
                        'company_id' => Auth()->user()->company_id,
                        'vehicle_id'=> $request->vehicle_id,
                'start_date'=> $request->start_date,
                'end_date'=> $request->end_date,
                'booking_reference'=> $request->booking_reference,
                'purpose_of_loan'=> $request->purpose_of_loan,
                'loan_type'=> $request->loan_type,
                'booking_notes'=> $request->booking_notes,
                'lag_time'=> $request->lag_time,
                'lag_notes'=> $request->lag_notes,
                'lead_time'=> $request->lead_time,
                'lead_notes'=> $request->lead_notes,
                'show_delivery_day'=> $request->show_delivery_day,
                'show_collection_day'=> $request->show_collection_day,
                'contacts'=> $request->contacts,
                'primary_contact'=> $request->primary_contact,
                'email_template'=> !empty($request->email_template)? implode(",", $request->email_template):'',
                'email_service' => $request->email_service,
                'ob_pick_from'=> $request->ob_pick_from !=''?$request->ob_pick_from:null,
                'ob_pick_from_address_1'=> $request->ob_pick_from_address_1,
                'ob_pick_from_town_city'=> $request->ob_pick_from_town_city,
                'ob_pick_from_post_code'=> $request->ob_pick_from_post_code,
                'ob_pick_from_deliver_notes'=> $request->ob_pick_from_deliver_notes,
                'ob_pick_from_address_2'=> $request->ob_pick_from_address_2,
                'ob_pick_from_county'=> $request->ob_pick_from_county,
                'ob_pick_from_country'=> $request->ob_pick_from_country,
                'ob_pick_from_notes'=> $request->ob_pick_from_notes,
                'ob_deliver_to'=> $request->ob_deliver_to !=''?$request->ob_deliver_to:null,
                'ob_deliver_to_address_1'=> $request->ob_deliver_to_address_1,
                'ob_deliver_to_town_city'=> $request->ob_deliver_to_town_city,
                'ob_deliver_to_post_code'=> $request->ob_deliver_to_post_code,
                'ob_deliver_to_address_2'=> $request->ob_deliver_to_address_2,
                'ob_deliver_to_county'=> $request->ob_deliver_to_county,
                'ob_deliver_to_country'=> $request->ob_deliver_to_country,
                'ob_deliver_to_notes'=> $request->ob_deliver_to_notes,

                'ib_pick_from'=> $request->ib_pick_from !=''?$request->ib_pick_from:null,
                'ib_pick_from_address_1'=> $request->ib_pick_from_address_1,
                'ib_pick_from_town_city'=> $request->ib_pick_from_town_city,
                'ib_pick_from_post_code'=> $request->ib_pick_from_post_code,
                'ib_pick_from_address_2'=> $request->ib_pick_from_address_2,
                'ib_pick_from_county'=> $request->ib_pick_from_county,
                'ib_pick_from_country'=> $request->ib_pick_from_country,
                'ib_pick_from_notes'=> $request->ib_pick_from_notes,
                'ib_deliver_to'=> $request->ib_deliver_to !=''?$request->ib_deliver_to:null,
                'ib_deliver_to_address_1'=> $request->ib_deliver_to_address_1,
                'ib_deliver_to_town_city'=> $request->ib_deliver_to_town_city,
                'ib_deliver_to_post_code'=> $request->ib_deliver_to_post_code,
                'ib_deliver_to_address_2'=> $request->ib_deliver_to_address_2,
                'ib_deliver_to_county'=> $request->ib_deliver_to_county,
                'ib_deliver_to_country'=> $request->ib_deliver_to_country,
                'ib_deliver_to_notes'=> $request->ib_deliver_to_notes,
                'booking_start_date'=> $request->booking_start_date,
                'booking_end_date'=> $request->booking_end_date
                    ]);
                    History::Create( [
                        'company_id' => Auth()->user()->company_id,
                        'user_id' => Auth()->user()->id,
                        'booking_id'=> $booking->id,
                        'user_email'=> Auth()->user()->email,
                        'event'=> 'Created',
                    ]);
            }
            else{
                return response()->json(['success' => false]);
            }      
            //print_r($lists->id);die;

        }
        return response()->json(['success' => true]);
    }

    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        //
        $data['status']  = false;
        $booking = DB::table('bookings')->where('company_id', Auth()->user()->company_id)
              ->where('vehicle_id', $request->vehicle_id)
              ->whereDate('start_date', '<=', $request->date)
              ->whereDate('end_date', '>=', $request->date)
              ->first();
        if(!empty($booking)){ 
        $data['status']  = true;    
        $data['booking_list']  = $booking; 
        $contact = explode(',', $booking->contacts);
        for($i=0; $i < count($contact); $i++){
            $get_contact = DB::table('contacts')->where('id', $contact[$i])->first();
            $contact_list[$i]['id'] = $get_contact->id;
            $contact_list[$i]['name'] = $get_contact->first_name.' '.$get_contact->last_name;
        } 
        $data['contact_list']  = $contact_list;
        $booking_created = DB::table('histories')->where('booking_id', $booking->id)
                                ->where('event', 'Created')->first();
        $booking_modified = DB::table('histories')->where('booking_id', $booking->id)
        ->where('event', 'Modified')->orderBy('id','DESC')->first();
        
        if($booking_created){ 
        $booking_created->created_at = date('d M Y H:i:s', strtotime($booking_created->created_at));
        $data['booking_created'] = $booking_created;
        }
        
        if($booking_modified){
        $booking_modified->created_at = date('d M Y H:i:s', strtotime($booking_modified->created_at));
        $data['booking_modified'] = $booking_modified;
        }
        
        
           
        return response()->json($data);
        }
        else{
            return response()->json($data);
        }


    }

    /**
     * Get booking from between two dates.
     *
     * @param  \App\Models\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function get_booking(Request $request){
        
        
        $data['status'] = false;
        $booking = DB::table('bookings')->where('company_id', Auth()->user()->company_id)
              ->where('vehicle_id', $request->vehicle_id)
              ->whereDate('start_date', '<=', $request->start)
              ->whereDate('end_date', '>=', $request->start)
              ->get();
        $booking1 = DB::table('bookings')->where('company_id', Auth()->user()->company_id)
        ->where('vehicle_id', $request->vehicle_id)
        ->whereDate('start_date', '<=', $request->end)
        ->whereDate('end_date', '>=', $request->end)
        ->get();      
        //dd($booking->id);
        if(!empty($booking)){
            foreach($booking as $key=>$value){
            if($value->id != $request->id){
                $data['status'] = true;
            
            }
        else{
            $data['status'] = false;
            }
        }
            }
        
        elseif(!empty($booking1)){
            foreach($booking1 as $key=>$value){
            if($value->id != $request->id){
            $data['status'] = true;
            
                }
            else{
                $data['status'] = false;
                }
            }
        }
        
        return response()->json($data);

        

    }
    
    public function destroy(Request $request)
    {
        //
       
		Booking::find($request->id)->delete();
        return response()->json(['success' => true]);
    }
}
