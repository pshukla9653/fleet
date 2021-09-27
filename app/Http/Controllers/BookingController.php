<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\History;
use App\Models\EmailTemplate;
use App\Models\Contact;
use App\Models\Vehicle;
use App\Models\Company;
use App\Services\BookingService;
use Illuminate\Http\Request;
use DB;
use App\Services\EmailService;

class BookingController extends Controller
{
    function __construct(protected BookingService $bookingService)
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

            $this->bookingService->sendBookingEmails($booking);

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

    public function send_booking_email(Request $request){

        $booking = Booking::find($request->id);
        $primary_contact = Contact::find($booking->primary_contact);
        $vehicle = Vehicle::find($booking->vehicle_id);
        $company = Company::find(Auth()->user()->company_id);
        $contact_list = Contact::whereIn('id', explode(',', $booking->contacts))->get();

        foreach($contact_list as $key=>$value){
            $contacts[] = $value->first_name.' '.$value->last_name;
        }

        $email_templates_ids = explode(',', $booking->email_template);

        for($i=0; $i < count($email_templates_ids); $i++){

            $email_template = EmailTemplate::find($email_templates_ids[$i]);
            //Change To email if variable specified
            if (str_contains($email_template->to_email, '%%PrimaryEmail%%')) {
                $email_template->to_email = $primary_contact->email;
            }
            if (str_contains($email_template->email_body, '%%PrimaryContact%%')) {
                $email_template->email_body = str_replace("%%PrimaryContact%%", $primary_contact->first_name.' '.$primary_contact->last_name, $email_template->email_body);
            }
            if (str_contains($email_template->email_body, '%%PrimaryFirstname%%')) {
                $email_template->email_body = str_replace("%%PrimaryFirstname%%", $primary_contact->first_name, $email_template->email_body);
            }
            if (str_contains($email_template->email_body, '%%PrimaryLastname%%')) {
                $email_template->email_body = str_replace("%%PrimaryLastname%%", $primary_contact->last_name, $email_template->email_body);
            }
            if (str_contains($email_template->email_body, '%%PrimaryEmail%%')) {
                $email_template->email_body = str_replace("%%PrimaryEmail%%", $primary_contact->email, $email_template->email_body);
            }
            if (str_contains($email_template->email_body, '%%PrimaryPhone%%')) {
                $email_template->email_body = str_replace("%%PrimaryPhone%%", $primary_contact->phone_number, $email_template->email_body);
            }
            if (str_contains($email_template->email_body, '%%PrimaryAddress%%')) {
                $primary_add  = $primary_contact->address1.' '.$primary_contact->address2.' '.$primary_contact->address3.' '.$primary_contact->city.' '.$primary_contact->country;
                $email_template->email_body = str_replace("%%PrimaryAddress%%", $primary_add, $email_template->email_body);
            }
            if (str_contains($email_template->email_body, '%%PrimaryPostcode%%')) {
                $email_template->email_body = str_replace("%%PrimaryPostcode%%", $primary_contact->post_code, $email_template->email_body);
            }
            if (str_contains($email_template->email_body, '%%BookingNotes%%')) {
                $email_template->email_body = str_replace("%%BookingNotes%%", $booking->booking_notes, $email_template->email_body);
            }
            if (str_contains($email_template->email_body, '%%PrimaryCompanyName%%')) {
                $email_template->email_body = str_replace("%%PrimaryCompanyName%%", $company->company_name, $email_template->email_body);
            }
            if (str_contains($email_template->email_body, '%%PrimaryCountry%%')) {
                $email_template->email_body = str_replace("%%PrimaryCountry%%", $primary_contact->country, $email_template->email_body);
            }
            if (str_contains($email_template->email_body, '%%ContactsComma%%')) {

                $email_template->email_body = str_replace("%%ContactsComma%%", implode(', ', $contacts), $email_template->email_body);
            }
            if (str_contains($email_template->email_body, '%%ContactsList*%%')) {

                $email_template->email_body = str_replace("%%ContactsList*%%", implode('</br>', $contacts), $email_template->email_body);
            }
            if (str_contains($email_template->email_body, '%%VehiclesComma%%')) {

                $email_template->email_body = str_replace("%%VehiclesComma%%", $vehicle->model.'('.$vehicle->registration_number.')', $email_template->email_body);
            }
            if (str_contains($email_template->email_body, '%%VehiclesList*%%')) {

                $email_template->email_body = str_replace("%%VehiclesList*%%", $vehicle->model.'('.$vehicle->registration_number.')', $email_template->email_body);
            }
            if (str_contains($email_template->email_body, '%%VehiclesModelDerivative*%%')) {

                $email_template->email_body = str_replace("%%VehiclesModelDerivative*%%", $vehicle->derivative, $email_template->email_body);
            }
            if (str_contains($email_template->email_body, '%%VehiclesRegistration*%%')) {

                $email_template->email_body = str_replace("%%VehiclesRegistration*%%", $vehicle->registration_number, $email_template->email_body);
            }
            if (str_contains($email_template->email_body, '%%VehiclesVinNumber*%%')) {

                $email_template->email_body = str_replace("%%VehiclesVinNumber*%%", $vehicle->vin, $email_template->email_body);
            }
            if (str_contains($email_template->email_body, '%%CurrentDate%%')) {

                $email_template->email_body = str_replace("%%CurrentDate%%", date('Y/m/d H:i:s'), $email_template->email_body);
            }
            if (str_contains($email_template->email_body, '%%CurrentDateDDMMYYYY%%')) {

                $email_template->email_body = str_replace("%%CurrentDateDDMMYYYY%%", date('d/m/Y'), $email_template->email_body);
            }
            if (str_contains($email_template->email_body, '%%CurrentDateMMDDYYYY%%')) {

                $email_template->email_body = str_replace("%%CurrentDateMMDDYYYY%%", date('m/d/Y'), $email_template->email_body);
            }
            if (str_contains($email_template->email_body, '%%PurposeOfLoan%%')) {

                $email_template->email_body = str_replace("%%PurposeOfLoan%%", $booking->purpose_of_loan, $email_template->email_body);
            }
            if (str_contains($email_template->email_body, '%%AddressOutboundCollection*%%')) {
                $ob_pickup= $booking->ob_pick_from_address_1.' '.$booking->ob_pick_from_address_2.' '.$booking->ob_pick_from_town_city.' '.$booking->ob_pick_from_county.' '.$booking->ob_pick_from_country;
                $email_template->email_body = str_replace("%%AddressOutboundCollection*%%", $ob_pickup, $email_template->email_body);
            }
            if (str_contains($email_template->email_body, '%%AddressOutboundDelivery*%%')) {
                $ob_deliver= $booking->ob_deliver_to_address_1.' '.$booking->ob_deliver_to_address_2.' '.$booking->ob_deliver_to_town_city.' '.$booking->ob_deliver_to_county.' '.$booking->ob_deliver_to_country;
                $email_template->email_body = str_replace("%%AddressOutboundDelivery*%%", $ob_deliver, $email_template->email_body);
            }
            if (str_contains($email_template->email_body, '%%AddressInboundCollection*%%')) {
                $ib_pickup= $booking->ib_pick_from_address_1.' '.$booking->ib_pick_from_address_2.' '.$booking->ib_pick_from_town_city.' '.$booking->ib_pick_from_county.' '.$booking->ib_pick_from_country;
                $email_template->email_body = str_replace("%%AddressInboundCollection*%%", $ib_pickup, $email_template->email_body);
            }
            if (str_contains($email_template->email_body, '%%AddressInboundDelivery*%%')) {
                $ib_deliver= $booking->ib_deliver_to_address_1.' '.$booking->ib_deliver_to_address_2.' '.$booking->ib_deliver_to_town_city.' '.$booking->ib_deliver_to_county.' '.$booking->ib_deliver_to_country;
                $email_template->email_body = str_replace("%%AddressInboundDelivery*%%", $ib_deliver, $email_template->email_body);
            }
            if (str_contains($email_template->email_body, '%%AddressOutboundDeliveryPostcode*%%')) {

                $email_template->email_body = str_replace("%%AddressOutboundDeliveryPostcode*%%", $booking->ob_deliver_to_post_code, $email_template->email_body);
            }
            if (str_contains($email_template->email_body, '%%AddressInboundCollectionPostcode*%%')) {

                $email_template->email_body = str_replace("%%AddressInboundCollectionPostcode*%%", $booking->ob_pick_from_post_code, $email_template->email_body);
            }
            if (str_contains($email_template->email_body, '%%NotesOutboundCollection%%')) {

                $email_template->email_body = str_replace("%%NotesOutboundCollection%%", $booking->ob_pick_from_notes, $email_template->email_body);
            }
            if (str_contains($email_template->email_body, '%%NotesOutboundDelivery%%')) {

                $email_template->email_body = str_replace("%%NotesOutboundDelivery%%", $booking->ob_deliver_to_notes, $email_template->email_body);
            }
            if (str_contains($email_template->email_body, '%%NotesInboundCollection%%')) {

                $email_template->email_body = str_replace("%%NotesInboundCollection%%", $booking->ib_pick_from_notes, $email_template->email_body);
            }
            if (str_contains($email_template->email_body, '%%NotesInboundDelivery%%')) {

                $email_template->email_body = str_replace("%%NotesInboundDelivery%%", $booking->ib_deliver_to_notes, $email_template->email_body);
            }
            if (str_contains($email_template->email_body, '%%StartDate%%')) {

                $email_template->email_body = str_replace("%%StartDate%%", $booking->booking_start_date, $email_template->email_body);
            }
            if (str_contains($email_template->email_body, '%%EndDate%%')) {

                $email_template->email_body = str_replace("%%EndDate%%", $booking->booking_end_date, $email_template->email_body);
            }

            if($email_template?->is_spec =='1'){
               $vehicle_spec =  DB::table('vehicle_specs')->where('vehicle_id','=', $booking->vehicle_id)->get();

               foreach($vehicle_spec as $key=>$item){
                    $file_name[] = asset('storage/'.$item->file_name);
               }

            }

            if(!empty($email_template)){
                $get_doc_files = DB::table('email_file')->where('template_id','=',$email_template->id)->where('file_name','LIKE','%.doc%')->get();
                $context = stream_context_create(array(
                    'http'=>array(
                        'method' => "GET",
                        'header' => "Accept-Encoding: gzip;q=0, compress;q=0\r\n",
                    )
                ));
                foreach($get_doc_files as $key=>$file){
                    $file_path = asset('storage/'.$file->file_name);
                    $get_data_from_file = file_get_contents($file_path, false, $context);
                    //dd($get_data_from_file);
                }
            }

            $TO_EMAIL = $email_template->to_email;
            $TO_NAME = $primary_contact->first_name.' '.$primary_contact->last_name;
            $SUBJECT = $email_template->subject;
            $FROM_NAME = $email_template->from_name;
            $EMAIL_BODY = $email_template->email_body;
            $ATTACHMENT_ARRAY = $file_name;
            $CC_MAIL = $email_template->cc_email;

            dd($EMAIL_BODY);
            dd($ATTACHMENT_ARRAY);



        }
    }
}
