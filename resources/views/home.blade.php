@extends('layouts.theme')

@section('heading', 'Booking Overview')
<style>
    .tooltip-inner {

        background-color: #fff !important;
        padding: 0px !important;

    }

    input[type="date"]::-webkit-calendar-picker-indicator {
        background: transparent;
        bottom: 0;
        color: transparent;
        height: auto;
        left: 0;
        position: absolute;
        right: 0;
        top: 0;
        width: auto;
    }

</style>
<style type="text/css">
    .upload-btn-wrapper {
        position: relative;
        overflow: hidden;
        display: inline-block;
    }

    .btnsss {
        border: 2px solid #0f91fb;
        background-color: white;
        padding: 2px 10px;
        font-size: 10px;
        background: #0f91fb;
        color: white;
        font-weight: 500;
    }

    .btnssss {
        border: 2px solid #f90909;
        background-color: white;
        padding: 2px 10px;
        font-size: 10px;
        background: #f90909;
        color: white;
        margin-top: 10px;
    }

    .imgbtn {
        position: absolute;
        top: 76%;
        left: 18%;
        transform: translate(-50%, -50%);
        -ms-transform: translate(-50%, -50%);
        background-color: #555;
        color: white;
        font-size: 11px;
        padding: 3px 16px;
        border: none;
        cursor: pointer;
        border-radius: 0px;
        text-align: center;
    }

    .upload-btn-wrapper input[type=file] {
        font-size: 100px;
        position: absolute;
        left: 0;
        top: 0;
        opacity: 0;
    }

    /*css*/
    input#feRouteDate {
        margin-left: -27px;
        width: 109px;
    }

    button.rt-number {
        background-color: #eecc00;
    }

    span.datepickers {
        margin-left: 55px;
    }

    strong.enddate {
        margin-left: 62px;
    }

    .booking-set {
        display: flex;
    }

    /**/
    .book-loan {
        display: flex;
    }

    input.ref-name {
        width: 135px;
        margin-left: -27px;
    }

    input.loan-name {
        width: 135px;
        margin-left: 24px;
    }

    .booking-set {
        display: flex;
    }

    span.booknow {
        font-size: 14px;
        margin-left: -28px;
    }

    span.booknowa {
        font-size: 14px;
        margin-left: 27px;
    }

    select#cars {
        height: 27px;
        width: 289px;
        margin-left: -25px;
    }

    textarea#w3review {
        margin-left: -27px;
    }

    .form-check-input-reverse {
        margin-left: 10px;
    }

    .checking-box {
        display: flex;
    }

    .button1 {

        display: flex;
        justify-content: flex-end;
    }

    button.edit {
        padding: 0 10px;
    }

    .button2 {
        display: flex;
    }

    .modal-content {
        width: 1000px;
    }

    button.existing {
        font-size: 12px;
        padding: 0px;
    }

    .button3 {
        display: flex;
        justify-content: flex-end;
    }

    .text-edit {
        display: flex;
        justify-content: flex-end;
    }

    .col-md-12.main {
        margin-top: 10px;
    }

    span.booknowa1 {
        margin-left: 57px;
    }

    span.loan1 {
        margin-left: -19px;
    }

    span.enddate {
        margin-left: 88px;
    }

    span.stratdate {
        margin-left: -25px;
    }

    span.booknowaa {
        margin-left: 30px;
    }

    img.image-1 {
        width: 100%;
        height: 100%;
    }

    .car-img {
        width: 150px;
        height: 100px;
    }

    .createby {
        margin-left: 10px;
        margin-top: 10px;
        border-top: 1px solid #ddd;
    }

    .delete-booking {
        margin-top: -24px;
        display: flex;
        justify-content: flex-end;
    }

    .checkings {
        border: 2px solid #ccc;
        width: 361px;
        height: 100px;
        overflow-y: scroll;
    }

    /*second-form css*/
    .switch {
        display: inline-block;
        height: 34px;
        position: relative;
        width: 60px;
    }

    .switch input {
        display: none;
    }

    .slider {
        background-color: #ccc;
        bottom: 0;
        cursor: pointer;
        left: 0;
        position: absolute;
        right: 0;
        top: 0;
        transition: .4s;
    }

    .slider:before {
        background-color: #fff;
        bottom: 4px;
        content: "";
        height: 26px;
        left: 4px;
        position: absolute;
        transition: .4s;
        width: 26px;
    }

    input:checked+.slider {
        background-color: #66bb6a;
    }

    input:checked+.slider:before {
        transform: translateX(26px);
    }

    .slider.round {
        border-radius: 34px;
    }

    .slider.round:before {
        border-radius: 50%;
    }

    .main-address {
        display: flex;
    }

    .address {
        margin-left: 10px;
    }

    .main-for-checking {
        margin-left: 10px;
        margin-right: 10px;
    }

    .main-for-checking1 {
        margin-left: 10px;
        margin-right: 10px;
    }

    .for-checking {
        margin-left: -26px;
    }

    input.address2 {
        width: 215px;
    }

    .notes-all {
        margin-left: 11px;
    }

    .createby1 {
        margin-left: 50px;
    }

    /*second checkbox*/
    .switch1 {
        display: inline-block;
        height: 34px;
        position: relative;
        width: 60px;
    }

    .switch1 input {
        display: none;
    }

    .slider1 {
        background-color: #ccc;
        bottom: 0;
        cursor: pointer;
        left: 0;
        position: absolute;
        right: 0;
        top: 0;
        transition: .4s;
    }

    .slider1:before {
        background-color: #fff;
        bottom: 4px;
        content: "";
        height: 26px;
        left: 4px;
        position: absolute;
        transition: .4s;
        width: 26px;
    }

    input:checked+.slider1 {
        background-color: #66bb6a;
    }

    input:checked+.slider1:before {
        transform: translateX(26px);
    }

    .slider1.round1 {
        border-radius: 34px;
    }

    .slider1.round1:before {
        border-radius: 50%;
    }

    /*header*/
    div#form_heading {
        display: flex;
        align-items: center;
        justify-content: space-between;
    }

    .side-header {
        display: flex;
        flex-wrap: nowrap;
    }

    .side-header span {
        padding: 0 8px;
    }

    i.fa.fa-angle-down {
        font-size: 20px;
    }

    img.check-mark {
        width: 16px;
    }

    /*end*/
    .switcha {
        position: relative;
        display: inline-block;
        width: 60px;
        height: 34px;
    }

    .switcha input {
        opacity: 0;
        width: 0;
        height: 0;
    }

    .slidera {
        position: absolute;
        cursor: pointer;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-color: #ccc;
        -webkit-transition: .4s;
        transition: .4s;
    }

    .slidera:before {
        position: absolute;
        content: "";
        height: 26px;
        width: 26px;
        left: 4px;
        bottom: 4px;
        background-color: white;
        -webkit-transition: .4s;
        transition: .4s;
    }

    input:checked+.slidera {
        background-color: #66bb6a;
    }

    input:focus+.slidera {
        box-shadow: 0 0 1px #66bb6a;
    }

    input:checked+.slidera:before {
        -webkit-transform: translateX(26px);
        -ms-transform: translateX(26px);
        transform: translateX(26px);
    }

    /* Rounded sliders */
    .slidera.rounda {
        border-radius: 34px;
    }

    .slidera.rounda:before {
        border-radius: 50%;
    }

    .for-checking11 {
        margin-left: 10px;
    }

    /*button.editss {
  font-size: 12px;
      margin-top: 10px;
    background: #2b80ff;
    color: #fff;
}*/
    button.editss {
        font-size: 12px;
        margin-top: 10px;
        background: #2b80ff;
        color: #fff;
        border-radius: 3px;
        border-color: #2b80ff;
    }

    div#form_heading {
        margin: 20px;
    }

    /*third*/
    select#colorselecter {
        color: #fff;
        width: 81px;
        height: 32px;
    }

    button#imagecolor {
        display: flex;
        margin-left: 18px;
        height: 33px;
        width: 80px;
        margin-top: -73px;
    }

    .custom-modal-textbox {
        width: 100% !important;
    }

    .col-pa {
        padding: 10px 5px !important;
        text-align: center;
    }

</style>

@section('content')
    <div class="page-header">
        <div class="page-header-content">
            <div class="page-title">
                <h6><i class="icon-home2 position-left"></i> <i class="fa fa-angle-double-right"></i> Overview</h6>
            </div>
            <hr>

        </div>
    </div>

    <div class="row">
        <div class="col-md-8" style="padding: 0px 30px 0px 30px;display: inline-flex;">

        </div>
        <!-- <div class="col-md-4" style="padding: 30px;">
                        <select class="form-control border-0" style="background: transparent;width:6%;">
                          <option>Filter</option>
                       </select>

                      </div>
                      <div class="col-md-4" style="">
                        <a id="additem" class="btn btn-primary" style="margin-left: 20px;"><img src="{{ asset('assets/images/icon/add.png') }}" alt="add" style="width: 21px;margin-left: -8px;"/>&nbsp;  Add New Item</a>

                      </div> -->
        <div class="col-md-4" style="padding: 0px 30px 0px 30px;">
            <form class="example" action="#">
                <input type="text" placeholder="Search.." name="search" style="height:33px;">
                <button type="submit"><i class="fa fa-search"></i></button>
            </form>
        </div>

    </div>
    <div class="content">

        <!-- Main charts -->
        <!-- Quick stats boxes -->
        <div class="panel panel-flat">
            <div class="panel-body" style="padding:10px 10px 0px 10px;">

                <div class="row">
                    <form action="#" id="search_form">
                        <div class="col-md-2" style="width: 14.28%">

                            <div class="form-group date" style="width: 81%;">
                                <strong>Start Date</strong>
                                <input type="text" placeholder="yyyy-mm-dd" onchange="submit();" value="{{ $start_date }}"
                                    id="start_date" class="form-control custom-modal-textbox"
                                    style="padding:10px!important;width:90px;" name="start_date" readonly />
                                <span class="input-group-addon" style="float: right;">
                                    <img src="{{ asset('assets/images/icon/calendar.png') }}" alt="icon"
                                        style="width: 17px;margin-left: 10px;margin-top: -45px;" />
                                </span>
                            </div>
                        </div>

                        <div class="col-md-2" style="width: 14.28%">
                            <div class="form-group">
                                <div id="custom_input"></div>
                                <button class="btn btn-outline-success"
                                    style="width: 150px;left: -10px;bottom: -29px;height: 35px;padding:2px;">
                                    <i class="fa fa-fast-backward" onclick="step_fast_backward_date();"></i>
                                    <i class="fa fa-step-backward" onclick="step_backward_date();"></i>
                                    <span
                                        class="day-filter">{{ date('Y-m-d') == $start_date ? 'Today' : $start_date }}</span>
                                    <i class="fa fa-step-forward" onclick="step_forward_date();"></i>
                                    <i class="fa fa-fast-forward" onclick="step_fast_forward_date();"></i>
                                </button>
                            </div>
                        </div>



                        <div class="col-md-2" style="width: 14.28%">
                            <div class="form-group">
                                <strong>Date Range</strong>

                                <select name="date_range" id="date_range" onchange="custom_search();" style="padding:5px;"
                                    class="form-control custom-modal-textbox">

                                    <option value="1" {{ $date_range == '1' ? 'selected' : '' }}>1 weeks</option>
                                    <option value="2" {{ $date_range == '2' ? 'selected' : '' }}>2 weeks</option>
                                    <option value="3" {{ $date_range == '3' ? 'selected' : '' }}>3 weeks</option>
                                    <option value="4" {{ $date_range == '4' ? 'selected' : '' }}>4 weeks</option>
                                </select>


                            </div>
                        </div>

                        <div class="col-md-2" style="width: 14.28%">
                            <div class="form-group">
                                <strong>Brand</strong>

                                <select name="brand_id" id="brand_id" onchange="custom_search();" style="padding:5px;"
                                    class="form-control custom-modal-textbox">
                                    <option value="">All Brands</option>
                                    @foreach ($brands as $key => $brand)
                                        <option value="{{ $brand->id }}"
                                            {{ $brand_id == $brand->id ? 'selected' : '' }}>
                                            {{ $brand->brand_name }}</option>
                                    @endforeach
                                </select>

                            </div>
                        </div>
                        <div class="col-md-2" style="width: 14.28%">
                            <div class="form-group">
                                <strong>Department</strong>

                                <select name="department_id" style="padding:5px;" onchange="custom_search();"
                                    id="department_id" class="form-control custom-modal-textbox">
                                    <option value="">All Departments</option>
                                    @foreach ($departments as $key => $department)
                                        <option value="{{ $department->id }}"
                                            {{ $department_id == $department->id ? 'selected' : '' }}>
                                            {{ $department->department_name }}</option>
                                    @endforeach
                                </select>

                            </div>
                        </div>
                        <div class="col-md-2" style="width: 14.28%">
                            <div class="form-group">
                                <strong>Region</strong>

                                <select name="region_id" style="padding:5px;" onchange="custom_search();" id="region_id"
                                    class="form-control custom-modal-textbox">
                                    <option value="">All Regions</option>
                                    @foreach ($regions as $key => $region)
                                        <option value="{{ $region->id }}"
                                            {{ $region_id == $region->id ? 'selected' : '' }}>
                                            {{ $region->region_name }}</option>
                                    @endforeach
                                </select>

                            </div>
                        </div>
                        <div class="col-md-2" style="width: 14.28%">
                            <div class="form-group">
                                <strong>Vehicles</strong>
                                <br>
                                <input type="checkbox" name="" id="" /> Show off fleet vehicles?<br>
                                <input type="checkbox" name="" id="" /> On fleet within 2 weeks
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- /quick stats boxes -->
        <!-- /main charts -->
        <div class="panel panel-flat">

            <div class="panel-body">
                @if ($message = Session::get('success'))
                    <div class="alert alert-success">
                        <p>{{ $message }}</p>
                    </div>
                @endif
                <div class="row" style="/* overflow: auto; */">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th style="width: 7%; font-weight: 600;">VEHICLES</th>
                                @for ($i = 0; $i < $days; $i++)
                                    <th class='col-pa' style=" font-size:8px;font-weight: 600;">
                                        {{ date('d', strtotime($start_date . '+' . $i . ' day')) }}
                                        <br>{{ date('M', strtotime($start_date . '+' . $i . ' day')) }}
                                        <br>{{ date('y', strtotime($start_date . '+' . $i . ' day')) }}
                                    </th>
                                @endfor
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($vehicles as $key => $vehicle)
                                <tr>
                                    <td style="width:7%;"><span data-popup="tooltip" title="
                                    <div style='background-color:#fff;width:800px;height:auto;padding:10px;border: 1px solid #bbb8b8;'>
                                      <table cellpadding = '10' cellspacing = '10'>
                                        <tr></tr>
                                        <tr>
                                          <td style='width:33.33%;padding:10px;'>
                                            <table style='width:100%'>
                                              <tr><td colspan='2'><img src='{{ asset('storage/' . $vehicle->image) }}' alt='{{ $vehicle->registration_number }}' style='width: 100%; height:auto;padding:10px;'/></td></tr>
                                              <tr><td colspan='2'>&nbsp;</td></tr>
                                              <tr><td colspan='2' style='text-align:center;'><span style='font-size:18px;color:black;padding:5px;border-radius: 5px;background-color:{{ $vehicle->registration_plate_colour }}'>{{ $vehicle->registration_number }}</span></td></tr>
                                              <tr><td colspan='2'>&nbsp;</td></tr>
                                              <tr style='font-size:12px;'><td style='padding:2px 2px 2px 78px;'><b>Brand:</b></td><td> {{ $vehicle->brand->brand_name }}</td></tr>
                                              <tr style='font-size:12px;'><td style='padding:2px 2px 2px 78px;'><b>Model:</b></td><td> {{ $vehicle->model }}</td></tr>
                                              <tr style='font-size:12px;'><td style='padding:2px 2px 2px 78px;'><b>Derivative:</b></td><td> {{ $vehicle->derivative }}</td></tr>
                                              
                                              
                                            </table>
                                          </td>
                                          <td style='width:33.33%;padding:10px;'>
                                            <table style='width:100%;margin-top:-80px;'>
                                              <tr><td style='color:#376473;font-weight:600;'>Vehicle Information<br>&nbsp;<br></td><td></td></tr>
                                              <tr style='font-size:12px; background-color:{{ $vehicle->registration_plate_colour }}'><td style='padding:2px;'><b>Brand:</b></td><td> {{ $vehicle->brand->brand_name }}</td></tr>
                                              <tr style='font-size:12px; background-color:{{ $vehicle->registration_plate_colour }}'><td style='padding:2px;'><b>Model:</b></td><td> {{ $vehicle->model }}</td></tr>
                                              <tr style='font-size:12px; background-color:{{ $vehicle->registration_plate_colour }}'><td style='padding:2px;'><b>Derivative:</b></td><td> {{ $vehicle->derivative }}</td></tr>
                                              <tr style='font-size:12px;'><td style='padding:2px;'><b>Department:</b></td><td>{{ $vehicle->department->department_name }}</td></tr>
                                              <tr style='font-size:12px;background-color:#eeeeee;'><td style='padding:2px;'><b>Registration NO:</b></td><td>{{ $vehicle->registration_number }}</td></tr>
                                              <tr style='font-size:12px;'><td style='padding:2px;'><b>VIN:</b></td><td>{{ $vehicle->vin }}</td></tr>
                                              <tr style='font-size:12px;background-color:#eeeeee;'><td style='padding:2px;'><b>Adoption Date:</b></td><td>{{ $vehicle->adoption_date }}</td></tr>
                                              <tr style='font-size:12px;'><td style='padding:2px;'><b>Projected Defleet Date:</b></td><td>{{ $vehicle->projected_defleet_date }}</td></tr>
                                            </table>
                                          </td>
                                          <td style='width:33.33%;padding:10px;'>
                                            <table style='width:100%;margin-top:-35px;'>
                                              
                                              <tr style='font-size:12px;background-color:#eeeeee;'><td style='padding:2px;'><b>Regions:</b></td><td>{{ $vehicle->region->region_name }}</td></tr>
                                              <tr style='font-size:12px;'><td style='padding:2px;'><b>Other Details:</b></td><td>{{ $vehicle->other_details }}</td></tr>
                                              <tr style='font-size:12px;background-color:#eeeeee;'><td style='padding:2px;'><b>Lead Time:</b></td><td>{{ $vehicle->lead_time }}</td></tr>
                                              <tr style='font-size:12px;'><td style='padding:2px;'><b>Lag Time:</b></td><td>{{ $vehicle->lag_time }}</td></tr>
                                              <tr style='font-size:12px;background-color:#eeeeee;'><td style='padding:2px;'><b>Engine:</b></td><td>{{ $vehicle->engine }}</td></tr>
                                              <tr style='font-size:12px;'><td style='padding:2px;'><b>Colour:</b></td><td>{{ $vehicle->colour }}</td></tr>
                                              <tr style='font-size:12px;background-color:#eeeeee;'><td style='padding:2px;'><b>Mileage:</b></td><td>{{ $vehicle->mileage }}</td></tr>
                                              <tr style='font-size:12px;'><td style='padding:2px;'><b>Value:</b></td><td>{{ $vehicle->value }}</td></tr>
                                              <tr style='font-size:12px;background-color:#eeeeee;'><td style='padding:2px;'><b>Notes:</b></td><td>{{ $vehicle->notes }}</td></tr>
                                            </table>
                                          </td>
                                        </tr>

                                      </table>
                                    </div>
                                    " data-html="true" data-placement="right"
                                            style="font-weight: 600; font-size:12px; padding: 5px;border-radius: 5px;background-color:{{ $vehicle->registration_plate_colour }}">{{ $vehicle->registration_number }}</span>
                                        <br><span
                                            style="font-size:9px;position: absolute;margin-top: 7px;">{{ $vehicle->vin }}</span>
                                        <br><span style="font-size:9px;position: absolute;margin-top: -4px;">Newspress
                                            {{ $vehicle->model }}</span>
                                    </td>
                                    @for ($i = 0; $i < $days; $i++)
                                        @php
                                            $thisdate = date('Y-m-d', strtotime($start_date . '+' . $i . ' day'));
                                            $img_path = asset('storage/' . $vehicle->image);
                                            
                                        @endphp

                                        <td class='col-pa'
                                            onclick="makebooking('{{ $vehicle->id }}','{{ $thisdate }}','{{ $img_path }}','{{ $vehicle->registration_number }}','{{ $vehicle->registration_plate_colour }}','{{ $vehicle->brand->brand_name }}','{{ $vehicle->model }}','{{ $vehicle->derivative }}','{{ $vehicle->lead_time }}','{{ $vehicle->lag_time }}');"
                                            @php
                                                $booking = DB::table('bookings')
                                                    ->where('company_id', Auth()->user()->company_id)
                                                    ->where('vehicle_id', $vehicle->id)
                                                    ->whereDate('start_date', '<=', $thisdate)
                                                    ->whereDate('end_date', '>=', $thisdate)
                                                    ->get();
                                                foreach ($booking as $key => $value) {
                                                    $contact_detail = DB::table('contacts')
                                                        ->where('id', $value->primary_contact)
                                                        ->first();
                                                    $loan_detail = DB::table('loan_types')
                                                        ->where('id', $value->loan_type)
                                                        ->first();
                                                    $lag_date = date('Y-m-d', strtotime($value->start_date . '-' . $value->lag_time . ' day'));
                                                    $lead_date = date('Y-m-d', strtotime($value->end_date . '+' . $value->lead_time . ' day'));
                                                    if ($value->booking_start_date <= $thisdate && $value->booking_end_date >= $thisdate) {
                                                        echo 'style="background-color:#0f91fb;"';
                                                    }
                                                    if ($value->start_date >= $thisdate && $value->booking_start_date > $value->start_date) {
                                                        echo 'style="background-color:#abfb0f;"';
                                                    }
                                                    if ($value->end_date >= $thisdate && $value->booking_end_date < $value->end_date) {
                                                        echo 'style="background-color:#abfb0f;"';
                                                        //#abfb0f
                                                    }
                                                }
                                            @endphp>
                                            @foreach ($booking as $key => $value)


                                                @if ($value->id)
                                                    <span data-popup="tooltip" title="
                                    <div style='background-color:#fff;width:700px;height:auto;padding:10px;border: 1px solid #bbb8b8;'>
                                      <table cellpadding = '10' cellspacing = '10'>
                                        <tr></tr>
                                        <tr>
                                          <td style='width:33.33%;padding:10px;'>
                                            <table style='width:100%'>
                                              <tr><td colspan='2'><img src='{{ asset('storage/' . $vehicle->image) }}' alt='{{ $vehicle->registration_number }}' style='width: 100%; height:auto;padding:10px;'/></td></tr>
                                              <tr><td colspan='2'>&nbsp;</td></tr>
                                              <tr><td colspan='2' style='text-align:center;'><span style='font-size:18px;color:black;padding:5px;border-radius: 5px;background-color:{{ $vehicle->registration_plate_colour }}'>{{ $vehicle->registration_number }}</span></td></tr>
                                              <tr><td colspan='2'>&nbsp;</td></tr>
                                              <tr style='font-size:12px;'><td style='padding:2px 2px 2px 70px;'><b>Brand:</b></td><td> {{ $vehicle->brand->brand_name }}</td></tr>
                                              <tr style='font-size:12px;'><td style='padding:2px 2px 2px 70px;'><b>Model:</b></td><td> {{ $vehicle->model }}</td></tr>
                                              <tr style='font-size:12px;'><td style='padding:2px 2px 2px 70px;'><b>Derivative:</b></td><td> {{ $vehicle->derivative }}</td></tr>
                                              <tr style='font-size:12px;'><td style='padding:2px 2px 2px 70px;'><b>Start Date:</b></td><td> {{ date_format(date_create($value->booking_start_date), 'd-M-Y') }}</td></tr>
                                              <tr style='font-size:12px;'><td style='padding:2px 2px 2px 70px;'><b>End Date:</b></td><td> {{ date_format(date_create($value->booking_end_date), 'd-M-Y') }}</td></tr>
                                              <tr style='font-size:12px;'><td style='padding:2px 2px 2px 70px;'><b>Primary Contact:</b></td><td>@if ($contact_detail){{ $contact_detail->first_name . ' ' . $contact_detail->last_name }}@endif</td></tr>
                                              
                                              
                                            </table>
                                          </td>
                                          <td style='width:33.33%;padding:10px;'>
                                            <table style='width:100%;margin-top:-80px;'>
                                              <tr><td style='color:#376473;font-weight:600;' colspan='2'>Booking Information<br>&nbsp;<br></td></tr>
                                              <tr style='font-size:12px; background-color:{{ $vehicle->registration_plate_colour }}'><td style='padding:2px;'><b>Start Date:</b></td><td> {{ date_format(date_create($value->booking_start_date), 'd-M-Y') }}</td></tr>
                                              <tr style='font-size:12px; background-color:{{ $vehicle->registration_plate_colour }}'><td style='padding:2px;'><b>End Date:</b></td><td> {{ date_format(date_create($value->booking_end_date), 'd-M-Y') }}</td></tr>
                                              <tr style='font-size:12px; background-color:{{ $vehicle->registration_plate_colour }}'><td style='padding:2px;'><b>Primary Contact:</b></td><td>@if ($contact_detail){{ $contact_detail->first_name . ' ' . $contact_detail->last_name }}@endif</td></tr>
                                              
                                              <tr style='font-size:12px;background-color:#eeeeee;'><td style='padding:2px;'><b>Loan Type:</b></td><td>@if ($loan_detail){{ $loan_detail->loan_type }}@endif</td></tr>
                                              <tr style='font-size:12px;'><td style='padding:2px;'><b>Purpose of Loan:</b></td><td>{{ $value->purpose_of_loan }}</td></tr>
                                              <tr style='font-size:12px;background-color:#eeeeee;'><td style='padding:2px;'><b>Booking Reference:</b></td><td>{{ $value->booking_reference }}</td></tr>
                                              <tr style='font-size:12px;'><td style='padding:2px;'><b>Booking Notes:</b></td><td>{{ $value->booking_notes }}</td></tr>
                                            </table>
                                          </td>
                                          <td style='width:33.33%;padding:10px;'>
                                            <table style='width:100%;margin-top:-35px;'>
                                              
                                              <tr style='font-size:12px;background-color:#eeeeee;'><td style='padding:2px;'><b>Outbound Collection Notes:</b></td><td>{{ $value->ob_pick_from_notes }}</td></tr>
                                              <tr style='font-size:12px;'><td style='padding:2px;'><b>Inbound Collection Notes:</b></td><td>{{ $value->ib_pick_from_notes }}</td></tr>
                                              <tr style='font-size:12px;background-color:#eeeeee;'><td style='padding:2px;'><b>Lead Time Notes:</b></td><td>{{ $value->lead_notes }}</td></tr>
                                              <tr style='font-size:12px;'><td style='padding:2px;'><b>Lag Time Notes:</b></td><td>{{ $value->lag_notes }}</td></tr>
                                              <tr style='font-size:12px;background-color:#eeeeee;'><td style='padding:2px;'><b>Outbound Delivery Notes:</b></td><td>{{ $value->ob_pick_from_notes }}</td></tr>
                                              <tr style='font-size:12px;'><td style='padding:2px;'><b>Inbound Delivery Notes:</b></td><td>{{ $value->ib_pick_from_notes }}</td></tr>
                                              <tr style='font-size:12px;background-color:#eeeeee;'><td style='padding:2px;'><b>Outbound Details Address:</b></td><td>{{ $value->ob_deliver_to_address_1 }}</td></tr>
                                              <tr style='font-size:12px;'><td style='padding:2px;'><b>Inbound Details Address:</b></td><td>{{ $value->ib_pick_from_address_1 }}</td></tr>
                                              
                                            </table>
                                          </td>
                                        </tr>

                                      </table>
                                    </div>
                                    " data-html="true" data-placement="auto"
                                                        style="font-size:9px; color:#fff; padding: 20px;margin: -30px 0px 0px -30px;border-radius: 5px;white-space: nowrap;position: absolute;">
                                                        @if ($contact_detail && $value->booking_start_date == $thisdate)
                                                            {{ $contact_detail->first_name . ' ' . $contact_detail->last_name }}
                                                        @else
                                                            &nbsp;&nbsp;&nbsp;
                                                        @endforelse
                                                    </span>
                                                @endif
                                            @endforeach
                                        </td>
                                    @endfor
                                </tr>
                            @endforeach
                        </tbody>

                    </table>


                </div>
            </div>
        </div>
    </div>

    <style type="text/css">
        .custom-modal-textbox1 {
            color: #000 !important;
            border: 1px solid #bbb8b8;
            background-color: #f2f2f2;
            padding-left: 15px !important;
            width: 70%;
            height: 26px;
            border-radius: 2px;
        }

        .custom-modal-textbox2 {
            color: #000 !important;
            border: 1px solid #bbb8b8;
            background-color: #f2f2f2;
            padding-left: 15px !important;
            width: 298px;
            height: 26px;
            border-radius: 2px;
        }

        .custom-modal-textbox3 {
            color: #000 !important;
            border: 1px solid #bbb8b8;
            background-color: #f2f2f2;
            padding-left: 15px !important;
            width: 363px;
            height: 26px;
            border-radius: 2px;
        }

        .custom-modal-textbox4 {
            color: #000 !important;
            border: 1px solid #bbb8b8;
            background-color: #f2f2f2;
            padding-left: 15px !important;
            width: 180px;
            height: 26px;
            border-radius: 2px;
        }

        .anchor-btn {
            background-color: #2b80ff;
            padding: 3px;
            height: 23px;
            margin-top: 9px;
            color: white;
            font-size: 12px;
            font-weight: 300;
        }

        .anchor-btn:hover {
            color: white;
        }

        table#final-contact {
            width: 1000px;
            margin-left: -21px;
            font-size: 12px;
        }

        table#list-mytable {
            width: 1000px;
            font-size: 12px;
        }

        .input-hidden {
            height: 0;
            width: 0;
            visibility: hidden;
            padding: 0;
            margin: 0;
            float: right;
        }

    </style>
    <div id="popup_model1" data-backdrop="false" class="modal fade" style="overflow-y: auto;">
        <div class="modal-dialog modal-lg">
            <div class="modal-content" style="background-color: #f2f2f2;">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><i
                            class="icon-cancel-circle2"></i></button>

                </div>

                <div class="modal-title md-heading-custom" style="background-color:#30a02c;" id="form_heading">
                    <h5>
                        Booking Overview
                    </h5>
                    <div class="side-header">
                        <span class="checkboxs">
                            <img class="check-mark" src="">
                        </span>


                        <span id="chekckk1"><i class="fa fa-angle-down"></i></span>
                    </div>
                </div>

                <div id="demo-container">
                    <div class="textclick">
                        <div id="tick-mark"></div>

                    </div>
                </div>

                <!--  -->
                <!-- end of container -->
                <!-- accordian -->
                <form action="" id="itemform" class="" method=" POST" enctype="multipart/form-data">
                    <div id="aaa">
                        <div class="modal-body md-body-custom allset">
                            @csrf
                            <div class="row">
                                <div id="aaa">
                                    <div class="col-md-12 main">
                                        <div class="col-md-3">
                                            <div class="car-img">
                                                <img class="image-1" id="vahicle_img" src="">
                                            </div>
                                            <div class="sides-1">
                                                <span id="rt-number" style="border-radius: 7px;border-color: #eecc00;margin: 5px;width: 110px;padding: 3px; 
                                                                font-weight: 600;"></span>
                                                <br>
                                                <span id="brand_name" style="font-weight: 600"></span><br>
                                                <span id="model_number" style="font-weight: 600"></span><br>
                                                <span id="derivative" style="font-weight: 600"></span>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <input type="hidden" name="id" id="id" />
                                            <input type="hidden" name="vehicle_id" id="vehicle_id" />
                                            <div class="booking-set">
                                                <span class="booknow">Start Date</span>
                                                <span class="booknowaa" style="margin-left: 90px;">End Date</span>
                                            </div>
                                            <div class="book-loan">
                                                <div id="start_date_picker" class="input-group date">
                                                    <input type="text" name="booking_start_date" placeholder="yyyy-mm-dd"
                                                        value="" class="ref-name form-control custom-modal-textbox1"
                                                        onchange="get_start_date()" style="width: 112px;" required>
                                                    <span class="input-group-addon" style="float: right;">
                                                        <img src="{{ asset('assets/images/icon/calendar.png') }}"
                                                            alt="icon"
                                                            style="width: 17px;margin-left: -14px;margin-top: -5px;" />
                                                    </span>
                                                </div>
                                                <div id="end_date_picker" class="date">
                                                    <input type="text" name="booking_end_date" placeholder="yyyy-mm-dd"
                                                        value="" class="loan-name form-control custom-modal-textbox1"
                                                        onchange="get_end_date()" style="width: 115px;margin-left: 30px;"
                                                        required>
                                                    <span class="input-group-addon" style="float: right;">
                                                        <img src="{{ asset('assets/images/icon/calendar.png') }}"
                                                            id="end_date_icon" alt="icon"
                                                            style="width: 17px;margin-left: 10px;margin-top: -31px;" />
                                                    </span>
                                                </div>
                                            </div>
                                            <input type="hidden" name="start_date" value="" />
                                            <input type="hidden" name="end_date" value="" />
                                            <br>
                                            <div class="booking-set">
                                                <span class="booknow">Booking Reference</span>
                                                <span class="booknowaa">Purpose of Loan</span>
                                            </div>
                                            <div class="book-loan">
                                                <input type="text" name="booking_reference"
                                                    class="ref-name form-control custom-modal-textbox1"
                                                    style="width: 140px;" required>&nbsp&nbsp
                                                <input type="text" name="purpose_of_loan"
                                                    class="loan-name form-control custom-modal-textbox1"
                                                    style="width: 140px;margin-left: 14px;" required>
                                            </div>
                                            <br>
                                            <div class="">
                                                <span class="
                                                loan1">Loan Type:</span><br>
                                                <select id="cars" name="loan_type"
                                                    class="form-control custom-modal-textbox2"
                                                    style="height: 26px;padding: 0px;width: 298px" required>
                                                    @foreach ($loan_type as $key => $value)
                                                        <option value="{{ $value->id }}">{{ $value->loan_type }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <br>
                                            <span class="loan1">Booking Notes:</span>
                                            <textarea id="w3review" name="booking_notes" rows="4" cols="38"
                                                class="form-control custom-modal-textbox2"></textarea>
                                            <div class="booking-set">
                                                <span class="booknow">Lag time (days)</span>
                                                <span class="booknowa1">Lead time (days)</span>
                                            </div>
                                            <div class="book-loan">
                                                <input type="text" name="lag_time" onchange="get_start_date()"
                                                    class="ref-name form-control custom-modal-textbox1" required>&nbsp&nbsp
                                                <input type="text" name="lead_time" onchange="get_end_date()"
                                                    class="loan-name form-control custom-modal-textbox1" required>
                                            </div>
                                            <br>
                                            <span class="loan1">Lead time Notes:</span>
                                            <textarea id="w3review" name="lead_notes" rows="4" cols="38"
                                                class="form-control custom-modal-textbox2"></textarea>
                                            <span class="loan1">Lag time Notes:</span>
                                            <textarea id="w3review" name="lag_notes" rows="4" cols="38"
                                                class="form-control custom-modal-textbox2"></textarea>
                                        </div>
                                        <div class="col-md-5">
                                            <div class="checking-box">
                                                <div class="form-check">
                                                    <label class="form-check-label" for="show_delivery_day">
                                                        Show delivery day
                                                    </label>
                                                    <input class="form-check-input-reverse" type="checkbox"
                                                        name="show_delivery_day" value=1 id="show_delivery_day" />
                                                </div>&nbsp &nbsp &nbsp
                                                <div class="form-check">
                                                    <label class="form-check-label" for="show_collection_day">
                                                        Show collection day
                                                    </label>
                                                    <input class="form-check-input-reverse" type="checkbox"
                                                        name="show_collection_day" value=1 id="show_collection_day" />
                                                </div>
                                            </div>
                                            <label for="w3review">Contacts:</label>

                                            <select class="checkings" id="contact_list_d" size="5"
                                                style="width:100%;background-color: #f2f2f2;">
                                            </select>
                                            <input type="hidden" name="contacts" id="contact_field"
                                                class="input-hidden" />
                                            <!-- button -->
                                            <div class="button1">
                                                <a href="javascript:void(0)" class="anchor-btn" id="edit_contact"
                                                    style="margin-right: 10px;">Edit</a>&nbsp
                                                <a href="javascript:void(0)" class="anchor-btn" id="mark_as_primary"
                                                    style="margin-right: 10px;">Mark as primary</a>&nbsp
                                                <input type="hidden" name="primary_contact" id="primary_contact" value="">
                                                <a href="javascript:void(0)" class="anchor-btn" id="delete_list"
                                                    style="background-color:#ff4e4e;border-color: #ff4e4e;">Delete</a>


                                            </div>

                                            <div class="button2">
                                                <a href="javascript:void(0)" onclick="getExistingContact()"
                                                    class="anchor-btn" style="margin-left: 31px;">Select from existing
                                                    contact</a>&nbsp
                                                <a href="javascript:void(0)" class="anchor-btn"
                                                    onclick="getExistingList()">Select from existing list</a>
                                            </div>

                                            <div class="button3">
                                                <a href="javascript:void(0)" id="addcontact" class="anchor-btn"
                                                    style="margin-right: 10px;">Add New Contact</a>&nbsp
                                                <a href="javascript:void(0)" class="anchor-btn"
                                                    id="add-list-contact">Add New List</a>

                                            </div>
                                            <label for="vehicle">Vehicle(s):</label>
                                            <textarea id="vehicle" name="vehicle" rows="5" cols="47"
                                                class="form-control custom-modal-textbox3" readonly></textarea>
                                            <div class="text-edit">
                                                <a href="javascript:void(0)" class="anchor-btn"
                                                    onclick="getVehicleList()">Edit</a>
                                            </div>
                                            <span>Select Email Templates for Booking:</span>
                                            <div class="checkings form-control custom-modal-textbox3"
                                                style="height: 152px;">
                                                <div class="checkin-box11" style="margin-left:10px">
                                                    @foreach ($email_templates as $key => $value)
                                                        <input type="checkbox" value="{{ $value->id }}"
                                                            name="email_template[]" /> {{ $value->description }} <br />

                                                    @endforeach
                                                </div>

                                            </div>
                                            <div class="">
                                                <span >Email Service:</span><br>
                                <select name="
                                                email_service" class="form-control custom-modal-textbox2"
                                                style="height: 26px;padding: 0px;width: 298px">

                                                <option value="sendinblue">Sendinblue</option>
                                                <option value="sparkpost">Sparkpost</option>

                                                </select>
                                            </div>
                                            <!--  -->
                                        </div>
                                    </div>

                                    <div class="modal-footer md-footer-custom">
                                    </div>

                                </div>

                            </div>
                        </div>

                    </div>

                    <!-- second-form-card -->
                    <script>
                        $(document).ready(function() {
                            $("#chekckk1").click(function() {
                                $("#aaa1").toggle();
                                // $('#chekckk').css('transform','rotate(180deg)');
                                $(this).find("i").toggleClass("fa-angle-down fa-angle-up");
                            });
                        });
                    </script>

                    <div class="modal-title md-heading-custom" style="background-color:#30a02c;" id="form_heading">
                        <h5>
                            OUTBOUND DETAILS
                        </h5>
                        <div class="side-header">


                            <span id="chekckk1"><i class="fa fa-angle-down"></i></span>
                        </div>
                    </div>

                    <div id="aaa1">
                        <div class="modal-body md-body-custom">

                            <div class="row">
                                <div class="col-md-12 main">
                                    <div class="col-md-6">
                                        <div class="main-for-checking11">
                                            <div class="for-checking11">
                                                <span>Pickup from factory</span><br>
                                                <label class="switcha">
                                                    <input type="checkbox" value=1 name="ob_pick_from" id="ob_pick_from" />
                                                    <span class="slidera rounda"></span>
                                                </label>

                                            </div>
                                            <!--  -->
                                            <div id="ob_pick_from_box">
                                                <div class="main-address">
                                                    <div class="address">
                                                        <span class="address1">Address1</span><br>
                                                        <input type="text" name="ob_pick_from_address_1"
                                                            id="ob_pick_from_address_1"
                                                            class="address2 form-control custom-modal-textbox4"
                                                            style="height: 26px;padding: 0px;width: 180px" required>
                                                    </div>
                                                    <div class="address">
                                                        <span class="address1">Address2</span><br>
                                                        <input type="text" name="ob_pick_from_address_2"
                                                            class="address2 form-control custom-modal-textbox4"
                                                            style="height: 26px;padding: 0px;width: 180px">
                                                    </div>
                                                </div>
                                                <div class="main-address">
                                                    <div class="address">
                                                        <span class="address1">Town/City</span><br>
                                                        <input type="text" name="ob_pick_from_town_city"
                                                            class="address2 form-control custom-modal-textbox4"
                                                            style="height: 26px;padding: 0px;width: 180px">
                                                    </div>
                                                    <div class="address">
                                                        <span class="address1">County</span><br>
                                                        <input type="text" name="ob_pick_from_county"
                                                            class="address2 form-control custom-modal-textbox4"
                                                            style="height: 26px;padding: 0px;width: 180px">
                                                    </div>
                                                </div>
                                                <div class="main-address">
                                                    <div class="address">
                                                        <span class="address1">Postcode</span><br>
                                                        <input type="text" name="ob_pick_from_post_code"
                                                            class="address2 form-control custom-modal-textbox4"
                                                            style="height: 26px;padding: 0px;width: 180px">
                                                    </div>
                                                    <div class="address">
                                                        <span class="address1">Country</span><br>
                                                        <input type="text" name="ob_pick_from_country"
                                                            class="address2 form-control custom-modal-textbox4"
                                                            style="height: 26px;padding: 0px;width: 180px">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="notes-all">
                                                <span class="loan11">Notes:</span><br>
                                                <textarea id="notes1" name="ob_pick_from_notes" rows="4" cols="58"
                                                    class="form-control custom-modal-textbox3" style="width: 368px;">
                                                </textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="main-for-checking11">
                                            <div class="for-checking11">
                                                <span>Deliver to factory</span><br>
                                                <label class="switcha">
                                                    <input type="checkbox" value="1" name="ob_deliver_to"
                                                        id="ob_deliver_to">
                                                    <span class="slidera rounda"></span>
                                                </label>

                                            </div>
                                            <!--  -->
                                            <div id="ob_deliver_to_box">
                                                <div class="main-address">
                                                    <div class="address">
                                                        <span class="address1">Address1</span><br>
                                                        <input type="text" name="ob_deliver_to_address_1"
                                                            id="ob_deliver_to_address_1"
                                                            class="address2 form-control custom-modal-textbox4"
                                                            style="height: 26px;padding: 0px;width: 180px" required>
                                                    </div>
                                                    <div class="address">
                                                        <span class="address1">Address2</span><br>
                                                        <input type="text" name="ob_deliver_to_address_2"
                                                            class="address2 form-control custom-modal-textbox4"
                                                            style="height: 26px;padding: 0px;width: 180px">
                                                    </div>
                                                </div>
                                                <div class="main-address">
                                                    <div class="address">
                                                        <span class="address1">Town/City</span><br>
                                                        <input type="text" name="ob_deliver_to_town_city"
                                                            class="address2 form-control custom-modal-textbox4"
                                                            style="height: 26px;padding: 0px;width: 180px">
                                                    </div>
                                                    <div class="address">
                                                        <span class="address1">County</span><br>
                                                        <input type="text" name="ob_deliver_to_county"
                                                            class="address2 form-control custom-modal-textbox4"
                                                            style="height: 26px;padding: 0px;width: 180px">
                                                    </div>
                                                </div>
                                                <div class="main-address">
                                                    <div class="address">
                                                        <span class="address1">Postcode</span><br>
                                                        <input type="text" name="ob_deliver_to_post_code"
                                                            class="address2 form-control custom-modal-textbox4"
                                                            style="height: 26px;padding: 0px;width: 180px">
                                                    </div>
                                                    <div class="address">
                                                        <span class="address1">Country</span><br>
                                                        <input type="text" name="ob_deliver_to_country"
                                                            class="address2 form-control custom-modal-textbox4"
                                                            style="height: 26px;padding: 0px;width: 180px">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="notes-all">
                                                <span class="loan11">Notes:</span><br>
                                                <textarea id="notes1" name="ob_deliver_to_notes" rows="4" cols="58"
                                                    class="form-control custom-modal-textbox3" style="width: 368px;">
                                                </textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer md-footer-custom foot">

                            </div>

                            <!-- end -->
                        </div>
                    </div>
                    <!-- start third-->
                    <script>
                        $(document).ready(function() {
                            $("#chekckk2").click(function() {
                                $("#aaa2").toggle();
                                // $('#chekckk').css('transform','rotate(180deg)');
                                $(this).find("i").toggleClass("fa-angle-down fa-angle-up");
                            });
                        });
                        $(document).ready(function() {
                            $(".toggle-btn").click(function() {
                                $(".toggle-class").toggle();
                                $(this).find("i").toggleClass("fa-angle-down fa-angle-up");
                            });
                        });
                    </script>
                    <!--  <h6 class="modal-title md-heading-custom" style="background-color:#30a02c;" id="form_heading">Booking Overview</h6> -->

                    <div class="modal-title md-heading-custom" style="background-color:#30a02c;" id="form_heading">
                        <h5>
                            INBOUND DETAILS
                        </h5>
                        <div class="side-header">
                            <span id="chekckk2"><i class="fa fa-angle-down"></i></span>
                        </div>
                    </div>

                    <div id="aaa2">
                        <div class="modal-body md-body-custom">

                            <div class="row">
                                <div class="col-md-12 main">

                                    <div class="col-md-6">

                                        <div class="main-for-checking11">
                                            <div class="for-checking11">
                                                <span>Pickup from factory</span><br>
                                                <label class="switcha">
                                                    <input type="checkbox" value=1 name="ib_pick_from" id="ib_pick_from" />
                                                    <span class="slidera rounda"></span>
                                                </label>

                                            </div>
                                            <!--  -->
                                            <div id="ib_pick_from_box">
                                                <div class="main-address">
                                                    <div class="address">
                                                        <span class="address1">Address1</span><br>
                                                        <input type="text" name="ib_pick_from_address_1"
                                                            id="ib_pick_from_address_1"
                                                            class="address2 form-control custom-modal-textbox4"
                                                            style="height: 26px;padding: 0px;width: 180px" required>
                                                    </div>
                                                    <div class="address">
                                                        <span class="address1">Address2</span><br>
                                                        <input type="text" name="ib_pick_from_address_2"
                                                            class="address2 form-control custom-modal-textbox4"
                                                            style="height: 26px;padding: 0px;width: 180px">
                                                    </div>
                                                </div>
                                                <div class="main-address">
                                                    <div class="address">
                                                        <span class="address1">Town/City</span><br>
                                                        <input type="text" name="ib_pick_from_town_city"
                                                            class="address2 form-control custom-modal-textbox4"
                                                            style="height: 26px;padding: 0px;width: 180px">
                                                    </div>
                                                    <div class="address">
                                                        <span class="address1">County</span><br>
                                                        <input type="text" name="ib_pick_from_county"
                                                            class="address2 form-control custom-modal-textbox4"
                                                            style="height: 26px;padding: 0px;width: 180px">
                                                    </div>
                                                </div>
                                                <div class="main-address">
                                                    <div class="address">
                                                        <span class="address1">Postcode</span><br>
                                                        <input type="text" name="ib_pick_from_post_code"
                                                            class="address2 form-control custom-modal-textbox4"
                                                            style="height: 26px;padding: 0px;width: 180px">
                                                    </div>
                                                    <div class="address">
                                                        <span class="address1">Country</span><br>
                                                        <input type="text" name="ib_pick_from_country"
                                                            class="address2 form-control custom-modal-textbox4"
                                                            style="height: 26px;padding: 0px;width: 180px">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="notes-all">
                                                <span class="loan11">Notes:</span><br>
                                                <textarea id="notes1" name="ib_pick_from_notes" rows="4" cols="58"
                                                    class="form-control custom-modal-textbox3" style="width: 368px;">
                                                </textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="main-for-checking11">
                                            <div class="for-checking11">
                                                <span>Deliver to factory</span><br>
                                                <label class="switcha">
                                                    <input type="checkbox" value=1 name="ib_deliver_to"
                                                        id="ib_deliver_to" />
                                                    <span class="slidera rounda"></span>
                                                </label>

                                            </div>
                                            <!--  -->
                                            <div id="ib_deliver_to_box">
                                                <div class="main-address">
                                                    <div class="address">
                                                        <span class="address1">Address1</span><br>
                                                        <input type="text" name="ib_deliver_to_address_1"
                                                            id="ib_deliver_to_address_1"
                                                            class="address2 form-control custom-modal-textbox4"
                                                            style="height: 26px;padding: 0px;width: 180px" required>
                                                    </div>
                                                    <div class="address">
                                                        <span class="address1">Address2</span><br>
                                                        <input type="text" name="ib_deliver_to_address_2"
                                                            class="address2 form-control custom-modal-textbox4"
                                                            style="height: 26px;padding: 0px;width: 180px">
                                                    </div>
                                                </div>
                                                <div class="main-address">
                                                    <div class="address">
                                                        <span class="address1">Town/City</span><br>
                                                        <input type="text" name="ib_deliver_to_town_city"
                                                            class="address2 form-control custom-modal-textbox4"
                                                            style="height: 26px;padding: 0px;width: 180px">
                                                    </div>
                                                    <div class="address">
                                                        <span class="address1">County</span><br>
                                                        <input type="text" name="ib_deliver_to_county"
                                                            class="address2 form-control custom-modal-textbox4"
                                                            style="height: 26px;padding: 0px;width: 180px">
                                                    </div>
                                                </div>
                                                <div class="main-address">
                                                    <div class="address">
                                                        <span class="address1">Postcode</span><br>
                                                        <input type="text" name="ib_deliver_to_post_code"
                                                            class="address2 form-control custom-modal-textbox4"
                                                            style="height: 26px;padding: 0px;width: 180px">
                                                    </div>
                                                    <div class="address">
                                                        <span class="address1">Country</span><br>
                                                        <input type="text" name="ib_deliver_to_country"
                                                            class="address2 form-control custom-modal-textbox4"
                                                            style="height: 26px;padding: 0px;width: 180px">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="notes-all">
                                                <span class="loan11">Notes:</span><br>
                                                <textarea id="notes1" name="ib_deliver_to_notes" rows="4" cols="58"
                                                    class="form-control custom-modal-textbox3" style="width: 368px;">
                                                </textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="createby1">
                                    <span id='booking_created'></span><br>
                                    <span id="booking_modified"></span>

                                </div>
                            </div>
                            <div class="modal-footer md-footer-custom foot">
                                <hr style="margin-top: 0px;">
                                <button type="submit" class="btn custom-modal-btn btn-success" id="btn">Save
                                    change</button>
                                <button type="button" class="btn custom-modal-btn btn-danger"
                                    data-dismiss="modal">Cancel</button>
                                <button type="button" id="delete_booking" class="btn custom-modal-btn btn-danger"
                                    style="float: right" onclick="deleteitem();">Delete</button>

                            </div><br>
                </form>
                <!-- end -->
            </div>
        </div>
    </div>
    <!-- end -->
    <div id="popup_model_editor" data-backdrop="false" class="modal fade second_model"
        style="margin-top:20%;margin-right:10%;">
        <div class="modal-dialog">
            <div class="modal-content" style="background-color: #f2f2f2;width: 100%;">
                <div class="modal-header">
                    <button type="button" class="close" onclick="$('#popup_model_editor').modal('hide')"><i
                            class="icon-cancel-circle2"></i></button>
                </div>
                <h6 class="modal-title md-heading-custom" id="form_heading">Contact Lists</h6>
                <div class="modal-body md-body-custom">

                    <div class="row">
                        <div class="col-md-6">

                            <select class="select-remote-data form-control custom-modal-textbox1">

                            </select>
                        </div>
                    </div>

                    <div class="modal-footer md-footer-custom" style="margin: 0px 20px 20px -20px;">
                        <hr style="margin-top: 0px;">
                        <button type="button" class="btn custom-modal-btn btn-success" id="insert_list">Insert</button>
                        <button type="button" class="btn custom-modal-btn btn-danger"
                            onclick="$('#popup_model_editor').modal('hide')">Cancel</button>

                    </div>

                </div>
            </div>
        </div>
    </div>
    <div id="popup_model_search-list" data-backdrop="false" class="modal fade second_model"
        style="margin-top:20%;margin-right:10%;">
        <div class="modal-dialog">
            <div class="modal-content" style="background-color: #f2f2f2;width: 100%;">
                <div class="modal-header">
                    <button type="button" class="close" onclick="$('#popup_model_search-list').modal('hide')"><i
                            class="icon-cancel-circle2"></i></button>
                </div>
                <h6 class="modal-title md-heading-custom" id="form_heading">Lists</h6>
                <div class="modal-body md-body-custom">

                    <div class="row">
                        <div class="col-md-6">

                            <select class="select-remote-list form-control custom-modal-textbox1">

                            </select>
                        </div>
                    </div>

                    <div class="modal-footer md-footer-custom" style="margin: 0px 20px 20px -20px;">
                        <hr style="margin-top: 0px;">
                        <button type="button" class="btn custom-modal-btn btn-success"
                            id="insert_contact_by_list">Insert</button>
                        <button type="button" class="btn custom-modal-btn btn-danger"
                            onclick="$('#popup_model_search-list').modal('hide')">Cancel</button>

                    </div>

                </div>
            </div>
        </div>
    </div>
    <!---end --->
    <div id="popup_model_vehicle" class="modal fade second_model" style="margin-top:20%;margin-right:10%;">
        <div class="modal-dialog">
            <div class="modal-content" style="background-color: #f2f2f2;width: 100%;">
                <div class="modal-header">
                    <button type="button" class="close" onclick="$('#popup_model_vehicle').modal('hide')"><i
                            class="icon-cancel-circle2"></i></button>
                </div>
                <h6 class="modal-title md-heading-custom" id="form_heading">Vehicle Lists</h6>
                <div class="modal-body md-body-custom">

                    <div class="row">
                        <div class="col-md-12">
                            <table class="table table-bordered" style="font-size: 12px;">
                                <tr>
                                    <th>Registration Number</th>
                                    <th>Brand</th>
                                    <th>Model</th>
                                    <th>Derivative</th>
                                </tr>

                                @foreach ($vehicles as $key => $value)
                                    <tr>
                                        <td><input type="radio" value="{{ $value->id }}" name="vehi">
                                            <img src='{{ asset('storage/' . $value->image) }}'
                                                alt='{{ $value->registration_number }}'
                                                style='width: 40%; height:auto;' />
                                            <span id="img_n_{{ $value->id }}"
                                                style="display: none;">{{ $value->image }}</span>
                                            <span id="lead_n_{{ $value->id }}"
                                                style="display: none;">{{ $value->lead_time }}</span>
                                            <span id="lag_n_{{ $value->id }}"
                                                style="display: none;">{{ $value->lag_time }}</span>
                                            <span id="col_n_{{ $value->id }}"
                                                style="display: none;">{{ $value->registration_plate_colour }}</span>
                                            <span id="reg_no_{{ $value->id }}"
                                                style="padding: 5px;border-radius: 5px;background-color:{{ $value->registration_plate_colour }}">{{ $value->registration_number }}</span>
                                        </td>
                                        <td id="br_n_{{ $value->id }}">{{ $value->brand->brand_name }}</td>
                                        <td id="mo_n_{{ $value->id }}">{{ $value->model }}</td>
                                        <td id="de_n_{{ $value->id }}">{{ $value->derivative }}</td>
                                    </tr>

                                @endforeach
                            </table>
                        </div>
                    </div>

                    <div class="modal-footer md-footer-custom" style="margin: 0px 20px 20px -20px;">
                        <hr style="margin-top: 0px;">
                        <button type="button" class="btn custom-modal-btn btn-success"
                            onclick="insert_vehicle()">Insert</button>
                        <button type="button" class="btn custom-modal-btn btn-danger"
                            onclick="$('#popup_model_vehicle').modal('hide')">Cancel</button>

                    </div>

                </div>
            </div>
        </div>
    </div>

    <div id="popup_model" class="modal fade second_model">
        <div class="modal-dialog modal-lg">
            <div class="modal-content" style="background-color: #f2f2f2;width: auto;">
                <div class="modal-header">
                    <button type="button" class="close"><i class="icon-cancel-circle2"
                            onclick="$('#popup_model').modal('hide')"></i></button>
                </div>
                <h6 class="modal-title md-heading-custom">Add Contact</h6>
                <form action="javascript:void(0)" id="contactform" class="form-horizontal" method="POST">
                    <div class="modal-body md-body-custom">
                        <div class="alert alert-danger print-error-msg" style="display:none">
                            <ul></ul>
                        </div>
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <input id="first_name" type="text" placeholder="First Name"
                                                class="form-control custom-modal-textbox @error('first_name') is-invalid @enderror"
                                                name="first_name" value="{{ old('first_name') }}" autofocus />
                                            <div class="text-danger" id="error_name"></div>
                                        </div>
                                        <div class="form-group row">
                                            <input id="last_name" type="text" placeholder="Last Name"
                                                class="form-control custom-modal-textbox @error('last_name') is-invalid @enderror"
                                                name="last_name" value="{{ old('last_name') }}" />
                                        </div>
                                        <div class="form-group row">
                                            <input id="job_title" type="text" placeholder="Job Title"
                                                class="form-control custom-modal-textbox @error('job_title') is-invalid @enderror"
                                                name="job_title" value="{{ old('job_title') }}" />
                                            <div class="text-danger" id="error_job"></div>
                                        </div>
                                        <div class="form-group row">
                                            <input id="email" type="email" placeholder="E-Mail Address"
                                                class="form-control custom-modal-textbox @error('email') is-invalid @enderror"
                                                name="email" value="{{ old('email') }}" />
                                            <div class="text-danger" id="error_email"></div>
                                        </div>
                                        <div class="form-group row">
                                            <input id="phone_number" type="text" placeholder="Phone Number"
                                                class="form-control custom-modal-textbox @error('phone_number') is-invalid @enderror"
                                                name="phone_number" value="{{ old('phone_number') }}" />
                                            <div class="text-danger" id="error_phone"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <input id="address1" type="text" placeholder="Address1"
                                                class="form-control custom-modal-textbox @error('address1') is-invalid @enderror"
                                                name="address1" value="{{ old('address1') }}" />
                                        </div>
                                        <div class="form-group row">
                                            <input id="address2" type="text" placeholder="Address2"
                                                class="form-control custom-modal-textbox @error('address2') is-invalid @enderror"
                                                name="address2" value="{{ old('address2') }}" />
                                        </div>
                                        <div class="form-group row">
                                            <input id="address3" type="text" placeholder="Address3"
                                                class="form-control custom-modal-textbox @error('address3') is-invalid @enderror"
                                                name="address3" value="{{ old('address3') }}" />
                                        </div>
                                        <div class="form-group">
                                            <input id="city" type="text" placeholder="Town/City"
                                                class="form-control custom-modal-textbox @error('city') is-invalid @enderror"
                                                name="city" value="{{ old('city') }}" />
                                        </div>
                                        <div class="form-group">
                                            <input id="country" type="text" placeholder="Country"
                                                class="form-control custom-modal-textbox @error('country') is-invalid @enderror"
                                                name="country" value="{{ old('country') }}" />
                                        </div>
                                        <div class="form-group">
                                            <input id="post_code" type="text" placeholder="Post Code"
                                                class="form-control custom-modal-textbox @error('post_code') is-invalid @enderror"
                                                name="post_code" value="{{ old('post_code') }}" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer md-footer-custom">
                        <hr style="margin-top: 0px;">
                        <button type="submit" class="btn custom-modal-btn btn-success"
                            id="contact-submit-btn">Submit</button>
                        <button type="button" class="btn custom-modal-btn btn-danger"
                            onclick="$('#popup_model').modal('hide');">Cancel</button>
                    </div>
                    {!! Form::close() !!}
            </div>
        </div>
    </div>

    <div id="list_popup_model" data-backdrop="false" class="modal fade" style="width: 1200px;">
        <div class="modal-dialog modal-lg">
            <div class="modal-content" style="background-color: #f2f2f2;width: auto;">
                <div class="modal-header">
                    <button type="button" class="close"><i class="icon-cancel-circle2"
                            onclick="$('#list_popup_model').modal('hide')"></i></button>

                </div>
                <h6 class="modal-title md-heading-custom">Add List</h6>
                <div class="modal-body md-body-custom">
                    <div class="alert alert-danger print-error-msg" style="display:none">
                        <ul></ul>
                    </div>
                    <div class="row">
                        <div class="col-xs-6 col-sm-6 col-md-6">
                            <div class="form-group" style="margin-bottom: 0px;">
                                <div class="form-group" style="margin-bottom: 0px;"> <strong>List Name:</strong>
                                    <input type="text" form="list-form" name="list_name" id="list_name" placeholder="List"
                                        class="form-control custom-modal-textbox">
                                </div>

                            </div>
                            <div class="form-group" style="margin-bottom: 0px;">
                                <div class="form-group" style="margin-bottom: 0px;"> <strong>Contacts:</strong>
                                    <select class="select-contact-data-list form-control custom-modal-textbox">
                                    </select>
                                </div>

                            </div>
                            <div class="text-right">
                                <button type="submit" class="btn custom-modal-btn anchor-btn" id="add_c_list">Add
                                    Contact</button>
                            </div>
                        </div>
                        <div class="col-xs-6 col-sm-6 col-md-6">
                            <div class="form-group" style="margin-bottom: 0px;"> <strong>Selected Contacts:</strong>
                                <select class="checkings" id="contact_list_final" size="5"
                                    style="margin-top: 10px;width:100%;background-color: #f2f2f2;">
                                </select>
                            </div>
                            <div class="text-right">
                                <button type="submit" class="btn custom-modal-btn btn-danger"
                                    id="delete_c_list">Delete</button>
                            </div>

                        </div>
                    </div>


                </div>

                <div class="modal-footer md-footer-custom">
                    <hr style="margin-top: 0px;">
                    <button type="submit" class="btn custom-modal-btn btn-success" id="listbtn">Add List</button>
                    <button type="button" class="btn custom-modal-btn btn-danger"
                        onclick="$('#list_popup_model').modal('hide');">Cancel</button>

                </div>
            </div>
        </div>
    </div>
    <script>
        function getVehicleList() {
            $('#popup_model_vehicle').modal('show');
        }

        function insert_vehicle() {
            var vehicle_id = $("input[name='vehi']:checked").val();
            var old_vehicle_id = $("#vehicle_id").val();
            var date = $('#start_date_picker input').val();
            var path = '{{ asset('storage/') }}';
            var img = path + '/' + $('#img_n_' + vehicle_id).html();
            var lead_time = $('#lead_n_' + vehicle_id).html();
            var lag_time = $('#lag_n_' + vehicle_id).html();
            var reg_number = $('#reg_no_' + vehicle_id).html();
            var plate_colour = $('#col_n_' + vehicle_id).html();
            var brand = $('#br_n_' + vehicle_id).html();
            var model = $('#mo_n_' + vehicle_id).html();
            var derivative = $('#de_n_' + vehicle_id).html();
            $('#popup_model_vehicle').modal('hide');
            if (vehicle_id != old_vehicle_id || old_vehicle_id == '') {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type: "POST",
                    url: "{{ url('edit-booking') }}",
                    data: {
                        vehicle_id: vehicle_id,
                        date: date
                    },

                    dataType: 'json',
                    success: function(res) {
                        if (res.status == true) {
                            $('#itemform').trigger("reset");

                            $('#form_heading').html("Booking Overview");
                            $('#btn').html('Submit');
                            $('#vehicle_id').val(vehicle_id);
                            $('#id').val('');
                            $('#start_date_picker input').val(date);
                            $('#vahicle_img').attr('src', img);
                            $('#inserted-list').html('');
                            $('input[name="vehi"][value="' + vehicle_id.toString() + '"]').prop("checked",
                                true);
                            $('#rt-number').html(reg_number);
                            $('#booking_created').html('');
                            $('#booking_modified').html('');
                            $('#rt-number').css('background-color', plate_colour);
                            $('#brand_name').html('Brand: ' + brand);
                            $('#model_number').html('Model: ' + model);
                            $('#derivative').html('Derivative: ' + derivative);
                            $('#vehicle').html(reg_number);
                            $('#start_date_picker.date').datepicker("update", res.booking_list
                                .booking_start_date);
                            $('#end_date_picker.date').datepicker("update", res.booking_list.booking_end_date);
                            $.each(res.booking_list, function(key, value) {
                                if (key == 'booking_notes' || key == 'lag_notes' || key ==
                                    'lead_notes' ||
                                    key == 'ob_pick_from_notes' || key == 'ib_deliver_to_notes' ||
                                    key == 'ob_deliver_to_notes' ||
                                    key == 'ib_pick_from_notes' || key == 'vehicle') {
                                    $("textarea[name='" + key + "']").val(value);
                                    $('#btn').html('Update');
                                }
                                if (key == 'loan_type') {
                                    $("select[name='" + key + "']").val(value);
                                }
                                if (key == 'email_service') {
                                    $("select[name='" + key + "']").val(value);
                                }
                                if (key == 'show_delivery_day') {
                                    if (value == 1) {
                                        $('#show_delivery_day').prop('checked', true);
                                    } else {
                                        $('#show_delivery_day').prop('checked', false);
                                    }
                                }
                                if (key == 'show_collection_day') {
                                    if (value == 1) {
                                        $('#show_collection_day').prop('checked', true);
                                    } else {
                                        $('#show_collection_day').prop('checked', false);
                                    }
                                }
                                if (key == 'ob_pick_from') {
                                    if (value == 1) {
                                        $('#ob_pick_from').prop('checked', true);
                                        $("#ob_pick_from_box").hide(); // checked
                                        $('#ob_pick_from_address_1').removeAttr('required', 'required');

                                    } else {
                                        $('#ob_pick_from').prop('checked', false);
                                        $("#ob_pick_from_box").show(); // unchecked
                                        $('#ob_pick_from_address_1').attr('required', 'required');
                                    }
                                }
                                if (key == 'ob_deliver_to') {
                                    if (value == 1) {
                                        $('#ob_deliver_to').prop('checked', true);
                                        $("#ob_deliver_to_box").hide(); // checked
                                        $('#ob_deliver_to_address_1').removeAttr('required',
                                        'required');
                                    } else {
                                        $('#ob_deliver_to').prop('checked', false);
                                        $("#ob_deliver_to_box").show(); // unchecked
                                        $('#ob_deliver_to_address_1').attr('required', 'required');
                                    }
                                }
                                if (key == 'ib_pick_from') {
                                    if (value == 1) {
                                        $('#ib_pick_from').prop('checked', true);
                                        $("#ib_pick_from_box").hide(); // checked
                                        $('#ib_pick_from_address_1').removeAttr('required', 'required');
                                    } else {
                                        $('#ib_pick_from').prop('checked', false);
                                        $("#ib_pick_from_box").show(); // unchecked
                                        $('#ib_pick_from_address_1').attr('required', 'required');
                                    }
                                }
                                if (key == 'ib_deliver_to') {
                                    if (value == 1) {
                                        $('#ib_deliver_to').prop('checked', true);
                                        $("#ib_deliver_to_box").hide(); // checked
                                        $('#ib_deliver_to_address_1').removeAttr('required',
                                        'required');
                                    } else {
                                        $('#ib_deliver_to').prop('checked', false);
                                        $("#ib_deliver_to_box").show(); // unchecked
                                        $('#ib_deliver_to_address_1').attr('required', 'required');
                                    }
                                }

                                if (key == 'email_template') {
                                    var email_tem = value.split(",");
                                    $.each(email_tem, function(index, v) {
                                        $('input[name="email_template[]"][value="' + v
                                            .toString() + '"]').prop("checked", true);
                                    });
                                }
                                if (key == 'contacts') {
                                    var addtext = '';
                                    $.each(res.contact_list, function(index, v) {
                                        if (res.booking_list.primary_contact == v.id) {
                                            addtext = v.name + '*';
                                        } else {
                                            addtext = v.name;
                                        }
                                        $('#contact_list_d').append(new Option(addtext, v.id));
                                        $('#contacts').val(value);

                                    });
                                } else {
                                    if (key != 'booking_notes' && key != 'lag_notes' && key !=
                                        'lead_notes' && key != 'ob_deliver_to_notes' && key !=
                                        'ob_pick_from_notes' && key != 'ib_deliver_to_notes' && key !=
                                        'ib_pick_from_notes' && key != 'vehicle' && key !=
                                        'loan_type' && key != 'email_service' && key !=
                                        'email_template' && key != 'show_delivery_day' && key !=
                                        'show_collection_day' && key != 'ob_pick_from' && key !=
                                        'ob_deliver_to' && key != 'ib_deliver_to' && key !=
                                        'ib_pick_from' && key != 'contacts') {
                                        $("input[name='" + key + "']").val(value);
                                    }
                                }
                                $('#booking_created').html(res.booking_created.event + ' by ' + res
                                    .booking_created.user_email + ' on ' + res.booking_created
                                    .created_at);
                                if (res.booking_modified) {
                                    $('#booking_modified').html(res.booking_modified.event +
                                        ' by ' +
                                        res.booking_modified.user_email + ' on ' + res
                                        .booking_modified.created_at);
                                }

                            });
                            alert('Booking Already Exists with selected date range');
                        } else {
                            $('#vahicle_img').removeAttr('src');
                            $('#vehicle_id').val(vehicle_id);
                            $('#vahicle_img').attr('src', img);
                            $('input[name="vehi"][value="' + vehicle_id.toString() + '"]').prop("checked",
                                true);
                            $('#rt-number').html(reg_number);
                            $('#rt-number').css('background-color', plate_colour);
                            $('#brand_name').html('Brand: ' + brand);
                            $('#model_number').html('Model: ' + model);
                            $('#derivative').html('Derivative: ' + derivative);
                            $('#vehicle').html(reg_number);
                            $('input[name="lead_time"]').val(lead_time);
                            $('input[name="lag_time"]').val(lag_time);
                            $('#start_date_picker.date').datepicker("update", date);

                            set_second_cal();
                            set_start_date();
                            set_end_date();
                            $('#delete_booking').hide();
                        }
                    }

                });
            }




        }

        function getExistingContact() {
            $('.select-remote-data').empty();
            $('#popup_model_editor').modal('show');
        }

        function getExistingList() {
            $('.select-remote-list').empty();
            $('#popup_model_search-list').modal('show');
        }
        $('#insert_list').click(function() {
            var data = $('.select-remote-data').select2('data');

            var primary_contact = $('#primary_contact').val();
            var v = $('#contact_list_d option').length;
            if (v == 0 && primary_contact == '' && data.length == 1) {

                var x = data[0].text + '*';
                $('#primary_contact').val(data[0].id);
                $('#contact_list_d').append(new Option(x, data[0].id));
            } else {
                $.each(data, function(index, item) {
                    $('#contact_list_d').append(new Option(item.text, item.id));
                });
                if (primary_contact == '') {
                    var first_id = $("#contact_list_d option:first").val();
                    var first_text = $("#contact_list_d option:first").text();
                    $('#primary_contact').val(first_id);
                    $("#contact_list_d option:first").text(first_text + '*');
                }
            }
            var code = {};
            $("#contact_list_d > option").each(function() {
                if (code[this.value]) {
                    $(this).remove();
                } else {
                    code[this.value] = this.value;
                }
            });
            $('#popup_model_editor').modal('hide');
        });
        $('#add_c_list').click(function() {
            var data = $('.select-contact-data-list').select2('data');

            $.each(data, function(index, item) {
                $('#contact_list_final').append(new Option(item.text, item.id));
            });
            var code = {};
            $("#contact_list_final > option").each(function() {
                if (code[this.value]) {
                    $(this).remove();
                } else {
                    code[this.value] = this.value;
                }
            });

        });

        $('#delete_list').click(function() {
            var value = '';
            value = $('#contact_list_d option:selected').val();
            var primary = $('#primary_contact').val();

            if (typeof value === 'undefined') {
                alert('Please Select a Contact for delete');
            } else {

                if (value == primary) {
                    $('#primary_contact').val('');
                }
                $('#contact_list_d option:selected').remove();
            }

        });



        $('#mark_as_primary').click(function() {
            var id = '';
            var text = '';
            id = $('#contact_list_d option:selected').val();

            if (typeof id === 'undefined') {
                alert("Please Select a Contact to make Mark as Primary");
            } else {
                var check_id = $('#primary_contact').val();
                if (check_id != id) {
                    text = $('#contact_list_d').find('option:selected').text();
                    $("#contact_list_d option").each(function() {

                        $(this).text($(this).text().replace('*', ''));
                    });
                    $('#primary_contact').val(id);
                    $('#contact_list_d option:selected').text(text + '*');
                    alert("Mark as Primary Successful");
                } else {
                    alert('This contact already selected as a primary contact! Please select another one');
                }

            }
        });

        function step_fast_backward_date() {

            $('#date_range').val(4);
            $('#custom_input').html('<input type="hidden" name="mode" value="backward"/>');

            $('#search_form').submit();
        }

        function step_backward_date() {


            $('#custom_input').html('<input type="hidden" name="mode" value="backward"/>');

            $('#search_form').submit();
        }

        function step_forward_date() {


            $('#custom_input').html('<input type="hidden" name="mode" value="forward"/>');

            $('#search_form').submit();
        }

        function step_fast_forward_date() {

            $('#date_range').val(4);
            $('#custom_input').html('<input type="hidden" name="mode" value="forward"/>');

            $('#search_form').submit();
        }

        function custom_search() {
            $('#search_form').submit();
        }

        function makebooking(vehicle_id, date, img, reg_number, plate_colour, brand, model, derivative, lead_time,
            lag_time) {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $('#itemform').trigger("reset");
            $('#form_heading').html("Booking Overview");
            $('#btn').html('Submit');
            $('#vehicle_id').val(vehicle_id);
            $('#id').val('');
            $('#start_date_picker input').val(date);
            $('#vahicle_img').attr('src', img);
            $('#inserted-list').html('');
            $('input[name="vehi"][value="' + vehicle_id.toString() + '"]').prop("checked", true);
            $('#rt-number').html(reg_number);
            $('input[name="lead_time"]').val(lead_time);
            $('input[name="lag_time"]').val(lag_time);
            $('#rt-number').css('background-color', plate_colour);
            $('#brand_name').html('Brand: ' + brand);
            $('#model_number').html('Model: ' + model);
            $('#derivative').html('Derivative: ' + derivative);
            $('#vehicle').html(reg_number);
            $('#booking_created').html('');
            $('#booking_modified').html('');
            $('#start_date_picker.date').datepicker("update", date);
            $('#contact_list_d').empty();
            $('#delete_booking').hide();
            set_second_cal();
            set_start_date();
            set_end_date();
            $('#popup_model1').modal('show');
            $.ajax({
                type: "POST",
                url: "{{ url('edit-booking') }}",
                data: {
                    vehicle_id: vehicle_id,
                    date: date
                },

                dataType: 'json',
                success: function(res) {

                    if (res.status == true) {
                        $('#btn').html('Update');
                        $('#delete_booking').show();
                        $('#start_date_picker.date').datepicker("update", res.booking_list.booking_start_date);
                        $('#end_date_picker.date').datepicker("update", res.booking_list.booking_end_date);
                        $.each(res.booking_list, function(key, value) {
                            if (key == 'booking_notes' || key == 'lag_notes' || key == 'lead_notes' ||
                                key == 'ob_deliver_to_notes' ||
                                key == 'ob_pick_from_notes' || key == 'ib_deliver_to_notes' || key ==
                                'ib_pick_from_notes' || key == 'vehicle') {
                                $("textarea[name='" + key + "']").val(value);
                                $('#btn').html('Update');
                            }
                            if (key == 'loan_type') {
                                $("select[name='" + key + "']").val(value);
                            }
                            if (key == 'email_service') {
                                $("select[name='" + key + "']").val(value);
                            }
                            if (key == 'email_template') {
                                var email_tem = value.split(",");
                                $.each(email_tem, function(index, v) {
                                    $('input[name="email_template[]"][value="' + v
                                        .toString() + '"]').prop("checked", true);
                                });
                            }
                            if (key == 'show_delivery_day') {
                                if (value == 1) {
                                    $('#show_delivery_day').prop('checked', true);
                                } else {
                                    $('#show_delivery_day').prop('checked', false);
                                }
                            }
                            if (key == 'show_collection_day') {
                                if (value == 1) {
                                    $('#show_collection_day').prop('checked', true);
                                } else {
                                    $('#show_collection_day').prop('checked', false);
                                }
                            }
                            if (key == 'ob_pick_from') {
                                if (value == 1) {
                                    $('#ob_pick_from').prop('checked', true);
                                    $("#ob_pick_from_box").hide(); // checked
                                    $('#ob_pick_from_address_1').removeAttr('required', 'required');

                                } else {
                                    $('#ob_pick_from').prop('checked', false);
                                    $("#ob_pick_from_box").show(); // unchecked
                                    $('#ob_pick_from_address_1').attr('required', 'required');
                                }
                            }
                            if (key == 'ob_deliver_to') {
                                if (value == 1) {
                                    $('#ob_deliver_to').prop('checked', true);
                                    $("#ob_deliver_to_box").hide(); // checked
                                    $('#ob_deliver_to_address_1').removeAttr('required', 'required');
                                } else {
                                    $('#ob_deliver_to').prop('checked', false);
                                    $("#ob_deliver_to_box").show(); // unchecked
                                    $('#ob_deliver_to_address_1').attr('required', 'required');
                                }
                            }
                            if (key == 'ib_pick_from') {
                                if (value == 1) {
                                    $('#ib_pick_from').prop('checked', true);
                                    $("#ib_pick_from_box").hide(); // checked
                                    $('#ib_pick_from_address_1').removeAttr('required', 'required');
                                } else {
                                    $('#ib_pick_from').prop('checked', false);
                                    $("#ib_pick_from_box").show(); // unchecked
                                    $('#ib_pick_from_address_1').attr('required', 'required');
                                }
                            }
                            if (key == 'ib_deliver_to') {
                                if (value == 1) {
                                    $('#ib_deliver_to').prop('checked', true);
                                    $("#ib_deliver_to_box").hide(); // checked
                                    $('#ib_deliver_to_address_1').removeAttr('required', 'required');
                                } else {
                                    $('#ib_deliver_to').prop('checked', false);
                                    $("#ib_deliver_to_box").show(); // unchecked
                                    $('#ib_deliver_to_address_1').attr('required', 'required');
                                }
                            }
                            if (key == 'contacts') {
                                var addtext = '';
                                $.each(res.contact_list, function(index, v) {
                                    if (res.booking_list.primary_contact == v.id) {
                                        addtext = v.name + '*';
                                    } else {
                                        addtext = v.name;
                                    }
                                    $('#contact_list_d').append(new Option(addtext, v.id));
                                    $('#contacts').val(value);

                                });
                            } else {
                                if (key != 'booking_notes' && key != 'lag_notes' && key !=
                                    'lead_notes' && key != 'ob_deliver_to_notes' && key !=
                                    'ob_pick_from_notes' && key != 'ib_deliver_to_notes' && key !=
                                    'ib_pick_from_notes' && key != 'vehicle' && key != 'loan_type' &&
                                    key != 'email_service' && key != 'email_template' && key !=
                                    'show_delivery_day' && key != 'show_collection_day' && key !=
                                    'ob_pick_from' && key != 'ob_deliver_to' && key !=
                                    'ib_deliver_to' && key != 'ib_pick_from' && key != 'contacts') {
                                    $("input[name='" + key + "']").val(value);
                                }
                            }
                            $('#booking_created').html(res.booking_created.event + ' by ' + res
                                .booking_created.user_email + ' on ' + res.booking_created
                                .created_at);
                            if (res.booking_modified) {
                                $('#booking_modified').html(res.booking_modified.event + ' by ' +
                                    res
                                    .booking_modified.user_email + ' on ' + res.booking_modified
                                    .created_at);
                            }

                        });
                    }

                }
            });

        }


        $("#itemform").submit(function(event) {
            event.preventDefault();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            var btn_name = $("#btn").html();

            $("#btn").html('Please Wait...');
            var contact = new Array();
            $("#contact_list_d option").each(function() {
                contact.push($(this).val());
            });
            var primary = $('#primary_contact').val();
            if (contact.length == 0) {
                $('#contact_field').val('');
                alert('Contacts Required!');
                $("#btn").html(btn_name);
                throw new Error('This is not an error. This is just to abort javascript');
            } else if (primary == '') {

                alert('Please mark a Primary Contact!');
                $("#btn").html(btn_name);
                throw new Error('This is not an error. This is just to abort javascript');
            } else if (contact.length != 0) {
                $('#contact_field').val(contact.toString());
                const data = new FormData(this);

                // throw new Error('This is not an error. This is just to abort javascript');
                $.ajax({
                    type: "POST",
                    url: "{{ url('store-booking') }}",
                    data: data,
                    contentType: false,
                    cache: false,
                    processData: false,
                    dataType: 'json',
                    success: function(res) {
                        console.log(res);
                        if (res.success == true) {
                            window.location.reload();
                        } else {
                            $("#btn").html(btn_name);
                            $("#btn").attr("disabled", false);
                            alert(
                                'Warning! We have already booking with selected date range for this vehicle'
                                );

                        }
                    }
                });
            }

        });

        //add new contact
        $(document).ready(function($) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $('#addcontact').click(function() {
                $('#contactform').trigger("reset");
                $('#popup_model').modal('show');
            });

            $('#contact-submit-btn').click(function() {
                var id = '';
                var first_name = $("#first_name").val();
                var last_name = $("#last_name").val();
                var job_title = $("#job_title").val();
                var email = $("#email").val();
                var phone_number = $("#phone_number").val();
                var address1 = $("#address1").val();
                var address2 = $("#address2").val();
                var address3 = $("#address3").val();
                var city = $("#city").val();
                var country = $("#country").val();
                var post_code = $("#post_code").val();
                if (first_name == '' || job_title == '' || email == '' || phone_number == '') {
                    if (first_name == '') {
                        $('#error_name').html('Name Required!');
                    } else {
                        $('#error_name').html('');
                    }

                    if (job_title == '') {
                        $('#error_job').html('Job Title Required!');
                    } else {
                        $('#error_job').html('');
                    }
                    if (email == '') {
                        $('#error_email').html('Email Required!');
                    } else {
                        $('#error_email').html('');
                    }
                    if (phone_number == '') {
                        $('#error_phone').html('Phone Required!');
                    } else {
                        $('#error_phone').html('');
                    }
                } else {
                    $("#contact-submit-btn").html('Please Wait...');
                    $("#contact-submit-btn").attr("disabled", true);

                    // ajax
                    $.ajax({
                        type: "POST",
                        url: "{{ route('contacts.store') }}",
                        data: {
                            id: id,
                            first_name: first_name,
                            last_name: last_name,
                            job_title: job_title,
                            email: email,
                            phone_number: phone_number,
                            address1: address1,
                            address2: address2,
                            address3: address3,
                            city: city,
                            country: country,
                            post_code: post_code,

                        },
                        dataType: 'json',
                        success: function(res) {
                            console.log(res);
                            if (res.success == true) {
                                var id = res.contact.id;
                                var text = res.contact.first_name + ' ' + res.contact.last_name;
                                var primary_contact = $('#primary_contact').val();
                                if (primary_contact == '') {
                                    $('#primary_contact').val(id);
                                    $('#contact_list_d').append(new Option(text + '*', id));
                                } else {
                                    $('#contact_list_d').append(new Option(text, id));
                                }

                                $('#popup_model').modal('hide');
                                alert("Contact Added Successful");
                                $("#contact-submit-btn").html('Submit');
                                $("#contact-submit-btn").attr("disabled", false);
                            } else {
                                alert("Try Again");
                            }
                        }
                    });
                }
            });
            //end add new contact

            //add list

        });

        $(document).ready(function($) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $('#add-list-contact').click(function() {
                $('#list_name').val('');
                $('.select-contact-data-list').empty();
                $('#contact_list_final').empty();
                $('#list_popup_model').modal('show');
            });

            $('#listbtn').click(function(event) {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                var list_name = $('#list_name').val();
                var contact = new Array();
                $("#contact_list_final option").each(function() {
                    contact.push($(this).val());
                });
                console.log(contact);
                // throw new Error('This is not an error. This is just to abort javascript');
                if (list_name == '') {
                    alert('List name required!');
                } else if (contact.length == 0) {
                    alert('Contacts required!');

                } else {

                    $.ajax({
                        type: "POST",
                        url: "{{ route('lists.store') }}",
                        data: {
                            list_name: list_name,
                            contacts: contact
                        },
                        dataType: 'json',
                        success: function(res) {
                            
                            if (res.success == true) {
                                get_contact_list_by_list_id(res.list_id);
                                alert('List Added Successfully');
                                $('#list_popup_model').modal('hide');
                            }
                        }
                    });
                }
            });
        });



        $('.form-group.date').datepicker({
            format: "yyyy-mm-dd",
            daysOfWeekHighlighted: "0",
            autoclose: true
        });

        $('#start_date_picker.date').datepicker({
            format: "yyyy-mm-dd",
            daysOfWeekHighlighted: "0",
            autoclose: true,

        });
        $("#start_date_picker input").change(function() {
            var d = $("#start_date_picker input").val();
            $("#end_date_picker.date").datepicker("destroy");
            $('#end_date_picker.date').datepicker({
                format: "yyyy-mm-dd",
                startDate: d,
                daysOfWeekHighlighted: "0",
                autoclose: true
            });
        });

        function set_second_cal() {
            var d = $("#start_date_picker input").val();
            $("#end_date_picker.date").datepicker("destroy");
            $('#end_date_picker.date').datepicker({
                format: "yyyy-mm-dd",
                startDate: d,
                daysOfWeekHighlighted: "0",
                autoclose: true
            });
        }

        //get start date based on booking start date and lead time
        function set_start_date() {

            var booking_date = $('input[name="booking_start_date"]').val();
            var lag_time = $('input[name="lag_time"]').val();
            const d = new Date(booking_date);
            d.setDate(d.getDate() - lag_time);
            var month = d.getMonth() + 1;
            var day = d.getDate();
            if (month < 10) {
                month = '0' + month;
            }
            if (day < 10) {
                day = '0' + day;
            }
            var start_date = d.getFullYear() + '-' + month + '-' + day;
            $('input[name="start_date"]').val(start_date);



        }

        function get_start_date() {

            var booking_date = $('input[name="booking_start_date"]').val();
            var lag_time = $('input[name="lag_time"]').val();
            const d = new Date(booking_date);
            d.setDate(d.getDate() - lag_time);
            var month = d.getMonth() + 1;
            var day = d.getDate();
            if (month < 10) {
                month = '0' + month;
            }
            if (day < 10) {
                day = '0' + day;
            }
            var start_date = d.getFullYear() + '-' + month + '-' + day;
            $('input[name="start_date"]').val(start_date);
            var id = $('#id').val();
            var vehicle_id = $('#vehicle_id').val();




        }
        //set/ get end date based on booking end date and lead time 
        function set_end_date() {

            var booking_date = $('input[name="booking_end_date"]').val();
            var lead_time = $('input[name="lead_time"]').val();
            const d = new Date(booking_date);

            d.setDate(d.getDate() + parseInt(lead_time));

            var month = d.getMonth() + 1;
            var day = d.getDate();
            if (month < 10) {
                month = '0' + month;
            }
            if (day < 10) {
                day = '0' + day;
            }
            var end_date = d.getFullYear() + '-' + month + '-' + day;
            $('input[name="end_date"]').val(end_date);


        }

        function get_end_date() {

            var booking_date = $('input[name="booking_end_date"]').val();
            var lead_time = $('input[name="lead_time"]').val();
            const d = new Date(booking_date);

            d.setDate(d.getDate() + parseInt(lead_time));

            var month = d.getMonth() + 1;
            var day = d.getDate();
            if (month < 10) {
                month = '0' + month;
            }
            if (day < 10) {
                day = '0' + day;
            }
            var end_date = d.getFullYear() + '-' + month + '-' + day;
            $('input[name="end_date"]').val(end_date);



        }



        function getContactList() {
            $.ajax({
                type: "GET",
                url: "{{ url('get-contact-lists-for-list') }}",
                data: {},
                success: function(res) {
                    $('#list-mytable').html(res);
                    $('.contact-list-row').css('display', 'block');
                }
            });
        }
        // Initialize select2 for contact list
        $(".select-remote-data").select2({
            ajax: {
                type: "POST",
                url: "{{ url('get-contact-lists-for-search') }}",
                dataType: 'json',
                delay: 250,
                data: function(params) {
                    return {
                        q: params.term, // search term
                        page: params.page
                    };
                },
                processResults: function(data) {
                    return {
                        results: $.map(data, function(item) {
                            return {
                                text: item.first_name + ' ' + item.last_name,
                                id: item.id,

                            }
                        })
                    };
                }

            },
            escapeMarkup: function(markup) {
                return markup;
            }, // let our custom formatter work
            minimumInputLength: 1,
            multiple: true,
            placeholder: "Search Here",





        });

        $(".select-contact-data-list").select2({
            ajax: {
                type: "POST",
                url: "{{ url('get-contact-lists-for-search') }}",
                dataType: 'json',
                delay: 250,
                data: function(params) {
                    return {
                        q: params.term, // search term
                        page: params.page
                    };
                },
                processResults: function(data) {
                    return {
                        results: $.map(data, function(item) {
                            return {
                                text: item.first_name + ' ' + item.last_name,
                                id: item.id,

                            }
                        })
                    };
                }

            },
            escapeMarkup: function(markup) {
                return markup;
            }, // let our custom formatter work
            minimumInputLength: 1,
            multiple: true,
            placeholder: "Search Here",





        });

        $(".select-remote-list").select2({
            ajax: {
                type: "POST",
                url: "{{ url('get-list-search') }}",
                dataType: 'json',
                delay: 250,
                data: function(params) {
                    return {
                        q: params.term, // search term
                        page: params.page
                    };
                },
                processResults: function(data) {
                    return {
                        results: $.map(data, function(item) {
                            return {
                                text: item.list_name,
                                id: item.id
                            }
                        })
                    };
                }

            },
            escapeMarkup: function(markup) {
                return markup;
            }, // let our custom formatter work
            minimumInputLength: 1,
            placeholder: "Search Here",





        });

        $('#insert_contact_by_list').click(function() {
            var id = $('.select-remote-list option:selected').val();
            get_contact_list_by_list_id(id);
            $('#popup_model_search-list').modal('hide');

        });

        function get_contact_list_by_list_id(id) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: "POST",
                url: "{{ url('get-contacts-by-list-id') }}",
                data: {
                    id: id
                },
                dataType: 'json',
                success: function(res) {
                    console.log(res);
                    var primary_contact = $('#primary_contact').val();
                    var v = $('#contact_list_d option').length;
                    if (v == 0 && primary_contact == '' && contacts
                        .length == 1) {

                        var x = contacts[0].name + '*';
                        $('#primary_contact').val(contacts[0].id);
                        $('#contact_list_d').append(new Option(x,
                            contacts[0].id));
                    } else {
                        $.each(res.contacts, function(index, item) {
                            $('#contact_list_d').append(
                            new Option(item.name,item.id));
                        });
                        if (primary_contact == '') {
                            var first_id = $(
                                    "#contact_list_d option:first")
                                .val();
                            var first_text = $(
                                    "#contact_list_d option:first")
                                .text();
                            $('#primary_contact').val(first_id);
                            $("#contact_list_d option:first").text(
                                first_text + '*');
                        }
                    }
                    var code = {};
                    $("#contact_list_d > option").each(function() {
                        if (code[this.value]) {
                            $(this).remove();
                        } else {
                            code[this.value] = this.value;
                        }
                    });
                }
            });

        }

        $('#delete_c_list').click(function() {
            var value = '';
            value = $('#contact_list_final option:selected').val();
            var primary = $('#primary_contact').val();
            $('#contact_list_final option:selected').remove();

        });

        function deleteitem() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            var id = $('#id').val();
            if (confirm("Delete Booking?") == true) {


                // ajax
                $.ajax({
                    type: "POST",
                    url: "{{ url('delete-booking') }}",
                    data: {
                        id: id
                    },
                    dataType: 'json',
                    success: function(res) {
                        window.location.reload();
                    }
                });
            }
        }

        $('#ob_pick_from').change(function() {
            if ($(this).is(':checked')) {
                $("#ob_pick_from_box").hide(); // checked
                $('#ob_pick_from_address_1').removeAttr('required', 'required');
            } else {
                $("#ob_pick_from_box").show(); // unchecked
                $('#ob_pick_from_address_1').attr('required', 'required');
            }
        });

        $('#ob_deliver_to').change(function() {
            if ($(this).is(':checked')) {
                $("#ob_deliver_to_box").hide(); // checked
                $('#ob_deliver_to_address_1').removeAttr('required', 'required');
            } else {
                $("#ob_deliver_to_box").show(); // unchecked
                $('#ob_deliver_to_address_1').attr('required', 'required');
            }

        });

        $('#ib_pick_from').change(function() {
            if ($(this).is(':checked')) {
                $("#ib_pick_from_box").hide(); // checked
                $('#ib_pick_from_address_1').removeAttr('required', 'required');
            } else {
                $("#ib_pick_from_box").show(); // unchecked
                $('#ib_pick_from_address_1').attr('required', 'required');

            }
        });

        $('#ib_deliver_to').change(function() {
            if ($(this).is(':checked')) {
                $("#ib_deliver_to_box").hide(); // checked
                $('#ib_deliver_to_address_1').removeAttr('required', 'required');
            } else {
                $("#ib_deliver_to_box").show(); // unchecked
                $('#ib_deliver_to_address_1').attr('required', 'required');
            }
        });
    </script>

@endsection
