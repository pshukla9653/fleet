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
        margin-left: 40px;
    }

    .main-for-checking1 {
        margin-left: 50px;
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
            <select class="form-control border-0" style="background: transparent;width:12%;">
                <option>Filter</option>
            </select>
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

                            <div class="form-group" style="width: 81%;">
                                <strong>Start Date</strong>

                                <input type="date" onchange="submit();" value="{{ $start_date }}" id="start_date"
                                    class="form-control custom-modal-textbox" style="padding:0px!important;width:90px;"
                                    name="start_date" />
                            </div>
                        </div>

                        <div class="col-md-2" style="width: 14.28%">
                            <div class="form-group">
                                <img src="{{ asset('assets/images/icon/calendar.png') }}"
                                    onclick="$('#start_date').focus();" alt="bell" style="width: 17px;
        margin-left: -25px;
        margin-top: 35px;" />
                                <button class="btn btn-outline-success" style="   width: 126px;
        left: 20px;
        bottom: -19px;
        height: 35px;">
                                    <span id="custom_input"></span>
                                    <i class="fa fa-fast-backward" onclick="step_fast_backward_date();"></i>
                                    <i class="fa fa-step-backward" onclick="step_backward_date();"></i>
                                    <span class="day-filter">{{ date('Y-m-d') == $start_date ? 'Today' : $start_date }}</span>
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
                                        <option value="{{ $brand->id }}" {{ $brand_id == $brand->id ? 'selected' : '' }}>
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
                                        <option value="{{ $region->id }}" {{ $region_id == $region->id ? 'selected' : '' }}>
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
                <div class="row">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th style="width: 7%; font-weight: 600;">VEHICLES</th>
                                @for ($i = 0; $i < $days; $i++)
                                    <th style="width:3% !impotant;padding:10px; font-size:8px;font-weight: 600;">
                                        {{ date('d-m-Y', strtotime($start_date . '+' . $i . ' day')) }}</th>
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

                                        <td onclick="makebooking('{{ $vehicle->id }}','{{ $thisdate }}','{{ $img_path }}','{{ $vehicle->registration_number }}','{{ $vehicle->brand->brand_name }}','{{ $vehicle->model }}','{{ $vehicle->derivative }}');"
                                            @php
                                                $booking = DB::table('bookings')
                                                    ->where('company_id', Auth()->user()->company_id)
                                                    ->where('vehicle_id', $vehicle->id)
                                                    ->whereDate('start_date', '<=', $thisdate)
                                                    ->whereDate('end_date', '>=', $thisdate)
                                                    ->get();
                                                foreach ($booking as $key => $value) {
                                                    if ($value->id) {
                                                        echo 'style="background-color:#0f91fb;"';
                                                    }
                                                }
                                            @endphp>
                                            @foreach ($booking as $key => $value)


                                                @if ($value->id)
                                                    <span data-popup="tooltip" title="
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
                              <tr style='font-size:12px;'><td style='padding:2px 2px 2px 70px;'><b>Brand:</b></td><td> {{ $vehicle->brand->brand_name }}</td></tr>
                              <tr style='font-size:12px;'><td style='padding:2px 2px 2px 70px;'><b>Model:</b></td><td> {{ $vehicle->model }}</td></tr>
                              <tr style='font-size:12px;'><td style='padding:2px 2px 2px 70px;'><b>Derivative:</b></td><td> {{ $vehicle->derivative }}</td></tr>
                              <tr style='font-size:12px;'><td style='padding:2px 2px 2px 70px;'><b>Start Date:</b></td><td> {{ date_format(date_create($value->start_date), 'd-M-Y') }}</td></tr>
                              <tr style='font-size:12px;'><td style='padding:2px 2px 2px 70px;'><b>End Date:</b></td><td> {{ date_format(date_create($value->end_date), 'd-M-Y') }}</td></tr>
                              <tr style='font-size:12px;'><td style='padding:2px 2px 2px 70px;'><b>Primary Contact:</b></td><td></td></tr>
                              
                              
                            </table>
                          </td>
                          <td style='width:33.33%;padding:10px;'>
                            <table style='width:100%;margin-top:-80px;'>
                              <tr><td style='color:#376473;font-weight:600;' colspan='2'>Vehicle Information<br>&nbsp;<br></td></tr>
                              <tr style='font-size:12px; background-color:{{ $vehicle->registration_plate_colour }}'><td style='padding:2px;'><b>Start Date:</b></td><td> {{ date_format(date_create($value->start_date), 'd-M-Y') }}</td></tr>
                              <tr style='font-size:12px; background-color:{{ $vehicle->registration_plate_colour }}'><td style='padding:2px;'><b>End Date:</b></td><td> {{ date_format(date_create($value->end_date), 'd-M-Y') }}</td></tr>
                              <tr style='font-size:12px; background-color:{{ $vehicle->registration_plate_colour }}'><td style='padding:2px;'><b>Primary Contact:</b></td><td>  </td></tr>
                              <tr style='font-size:12px;'><td style='padding:2px;'><b>Company:</b></td><td></td></tr>
                              <tr style='font-size:12px;background-color:#eeeeee;'><td style='padding:2px;'><b>Loan Type:</b></td><td></td></tr>
                              <tr style='font-size:12px;'><td style='padding:2px;'><b>Purpose of Loan:</b></td><td>{{ $value->purpose_of_lone }}</td></tr>
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
                    " data-html="true" data-placement="right"
                                                        style="font-weight: 600; font-size:12px; padding: 5px;border-radius: 5px;"></span>
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
            width: 363px;
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

    </style>
    <div id="popup_model1" class="modal fade" style="overflow-y: auto;">
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
                        <span class="completed">Completed</span>
                        <span id="chekckk"><i class="fa fa-angle-down"></i></span>
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
                                                <button class="rt-number" id="rt-number"
                                                    style="border-radius: 7px; border-color: #eecc00; margin-top: 10px;  width: 90px;">9867RT</button><br>
                                                <span id="brand_name" style="font-weight: 600"></span><br>
                                                <span id="model_number" style="font-weight: 600"></span><br>
                                                <span id="derivative" style="font-weight: 600"></span>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="main-date">
                                                <input type="hidden" name="id" id="id" />
                                                <input type="hidden" name="vehicle_id" id="vehicle_id" />
                                                <span class="startdate">Start Date</span>
                                                <span class="enddate">End Date</span>
                                                <div class="form-groupdate">
                                                    <span class="datepicker">

                                                        <input type="date" name="start_date" id="feRouteDate"
                                                            class="form-control custom-modal-textbox1 start_date" required/>

                                                        <img class="fa fa-calendar ass"
                                                            src="{{ asset('assets/images/icon/calendar.png') }}" alt=""
                                                            style="margin-left: 90px;margin-top: -28px;color: #000 !important; border-radius: 5px; background-color: #f2f2f2;padding: 5px;height: 28px;">
                                                    </span>
                                                    <span class="datepickers">
                                                        <input type="date" name="end_date" id="feRouteDate"
                                                            class="form-control custom-modal-textbox1"
                                                            style=" margin-top: -25px;margin-left: 134px;" required/>

                                                        <img class="fa fa-calendar as "
                                                            src="{{ asset('assets/images/icon/calendar.png') }}" alt=""
                                                            style="margin-left: 251px;margin-top: -28px;color: #000 !important;border-radius: 5px;background-color: #f2f2f2;padding: 5px;height: 28px;">
                                                    </span>
                                                </div>
                                            </div>
                                            <br>
                                            <div class="booking-set">
                                                <span class="booknow">Booking Reference</span>
                                                <span class="booknowaa">Purpose of Loan</span>
                                            </div>
                                            <div class="book-loan">
                                                <input type="text" name="booking_reference"
                                                    class="ref-name form-control custom-modal-textbox1"
                                                    style="width: 140px;" required>&nbsp&nbsp
                                                <input type="text" name="purpose_of_lone"
                                                    class="loan-name form-control custom-modal-textbox1"
                                                    style="width: 140px;margin-left: 14px;" required>
                                            </div>
                                            <br>
                                            <div class="">
                        <span class=" loan1">Loan Type:</span><br>
                                                <select id="cars" name="loan_type"
                                                    class="form-control custom-modal-textbox2"
                                                    style="height: 26px;padding: 0px;width: 298px">
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
                                                <input type="text" name="lag_time"
                                                    class="ref-name form-control custom-modal-textbox1">&nbsp&nbsp
                                                <input type="text" name="lead_time"
                                                    class="loan-name form-control custom-modal-textbox1">
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
                                                        name="show_delivery_day" value="Show Delivery Day"
                                                        id="show_delivery_day">
                                                </div>&nbsp &nbsp &nbsp
                                                <div class="form-check">
                                                    <label class="form-check-label" for="show_collectioin_day">
                                                        Show collection day
                                                    </label>
                                                    <input class="form-check-input-reverse " type="checkbox"
                                                        name="show_collectioin_day" value="Show Collection Day"
                                                        id="show_collectioin_day">
                                                </div>
                                            </div>
                                            <label for="w3review">Contacts:</label>
                                            <div class="checkings form-control custom-modal-textbox3"
                                                style="height: 152px;">
                                                <div class="checkin-box11" id="inserted-list" style="margin-left:10px">

                                                </div>
                                            </div>
                                            <!-- <textarea id="" name="contacts" rows="5" cols="47" class="form-control custom-modal-textbox3"> </textarea> -->
                                            <!-- button -->
                                            <div class="button1">
                                                <a href="javascript:void(0)" class="anchor-btn" id="edit_contact"
                                                    style="margin-right: 10px;">Edit</a>&nbsp
                                                <a href="javascript:void(0)" class="anchor-btn" id="mark_as_primary"
                                                    style="margin-right: 10px;">Mark as primary</a>&nbsp
                                                <input type="hidden" name="primary_contact" id="primary_contact" value="0">
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
                                            <label for="vehicle">Vehicle:</label>
                                            <textarea id="vehicle" name="vehicle" rows="5" cols="47"
                                                class="form-control custom-modal-textbox3"></textarea>
                                            <div class="text-edit">
                                                <button class="editss">Edit</button>
                                            </div>
                                            <span>Select Email Tampalet for Booking</span>
                                            <div class="checkings form-control custom-modal-textbox3"
                                                style="height: 152px;">
                                                <div class="checkin-box11" style="margin-left:10px">
                                                    @foreach ($email_templates as $key => $value)
                                                        <input type="checkbox" value="{{ $value->id }}"
                                                            name="email_temeplete[]" /> {{ $value->description }} <br />

                                                    @endforeach
                                                </div>
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

                    <div class="modal-title md-heading-custom" style="background-color:#ff4e4e;" id="form_heading">
                        <h5>
                            OUTBOUND DETAILS
                        </h5>
                        <div class="side-header">
                            <span class="checkboxs">
                                <img class="check-mark" src="{{ asset('assets/images/check.png') }}">
                            </span>
                            <span class="completed">Non Compeleted</span>
                            <span id="chekckk1"><i class="fa fa-angle-down"></i></span>
                        </div>
                    </div>

                    <div id="aaa1">
                        <div class="modal-body md-body-custom">

                            <div class="row">
                                <div class="col-md-12 main">
                                    <div class="col-md-5">
                                        <div class="main-for-checking">

                                            <div class="for-checking">
                                                <label>Pickup Form</label><br>
                                                <label class="switch" for="checkbox">
                                                    <input type="checkbox" id="checkbox" checked name="ob_pick_from" />
                                                    <div class="slider round"></div>
                                                </label>
                                            </div>
                                            <div class="notes">
                                                <span class="loan1">Notes:</span><br>
                                                <textarea id="w3review" name="ob_pick_from_notes" rows="4" cols="45"
                                                    class="form-control custom-modal-textbox3"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-7">
                                        <div class="main-for-checking1">

                                            <div class="container">
                                                <span>Deliver To</span><br>
                                                <label class="switch1" for="checkbox1">
                                                    <input type="checkbox" id="checkbox1" checked name="ob_deliver_to" />
                                                    <div class="slider1 round1"></div>
                                                </label>
                                            </div>
                                            <!--  -->
                                            <div class="main-address">
                                                <div class="address">
                                                    <span class="address1">Address1</span><br>
                                                    <input type="text" name="ob_deliver_to_address_1"
                                                        class="address2 form-control custom-modal-textbox4"
                                                        style="height: 26px;padding: 0px;width: 216px">
                                                </div>
                                                <div class="address">
                                                    <span class="address1">Address2</span><br>
                                                    <input type="text" name="ob_deliver_to_address_2"
                                                        class="address2 form-control custom-modal-textbox4"
                                                        style="height: 26px;padding: 0px;width: 216px">
                                                </div>
                                            </div>
                                            <div class="main-address">
                                                <div class="address">
                                                    <span class="address1">Town/City</span><br>
                                                    <input type="text" name="ob_deliver_to_town_city"
                                                        class="address2 form-control custom-modal-textbox4"
                                                        style="height: 26px;padding: 0px;width: 216px">
                                                </div>
                                                <div class="address">
                                                    <span class="address1">County</span><br>
                                                    <input type="text" name="ob_deliver_to_county"
                                                        class="address2 form-control custom-modal-textbox4"
                                                        style="height: 26px;padding: 0px;width: 216px">
                                                </div>
                                            </div>
                                            <div class="main-address">
                                                <div class="address">
                                                    <span class="address1">Postcode</span><br>
                                                    <input type="text" name="ob_deliver_to_post_code"
                                                        class="address2 form-control custom-modal-textbox4"
                                                        style="height: 26px;padding: 0px;width: 216px">
                                                </div>
                                                <div class="address">
                                                    <span class="address1">Country</span><br>
                                                    <input type="text" name="ob_deliver_to_country"
                                                        class="address2 form-control custom-modal-textbox4"
                                                        style="height: 26px;padding: 0px;width: 216px">
                                                </div>
                                            </div>
                                            <div class="notes-all">
                                                <span class="loan11">Notes:</span><br>
                                                <textarea id="notes1" name="ob_deliver_to_deliver_notes" rows="4" cols="58"
                                                    class="form-control custom-modal-textbox3"
                                                    style="width: 441px;"></textarea>
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
                            <span class="checkboxs">
                                <img class="check-mark" src="{{ asset('assets/images/check.png') }}">
                            </span>
                            <span class="completed">Completed</span>
                            <span id="chekckk2"><i class="fa fa-angle-down"></i></span>
                        </div>
                    </div>

                    <div id="aaa2">
                        <div class="modal-body md-body-custom">

                            <div class="row">
                                <div class="col-md-12 main">

                                    <div class="col-md-5">

                                        <div class="main-for-checking11">
                                            <div class="for-checking11">
                                                <span>Pickup From</span><br>
                                                <label class="switcha">
                                                    <input type="checkbox" checked name="ib_pick_from">
                                                    <span class="slidera rounda"></span>
                                                </label>

                                            </div>
                                            <!--  -->
                                            <div class="main-address">
                                                <div class="address">
                                                    <span class="address1">Address1</span><br>
                                                    <input type="text" name="ib_pick_from_address_1"
                                                        class="address2 form-control custom-modal-textbox4"
                                                        style="height: 26px;padding: 0px;width: 180px">
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
                                            <div class="notes-all">
                                                <span class="loan11">Notes:</span><br>
                                                <textarea id="notes1" name="ib_pick_from_notes" rows="4" cols="58"
                                                    class="form-control custom-modal-textbox3" style="width: 368px;">
                </textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-7">
                                        <div class="main-for-checking1" style="    margin-left: 88px;">

                                            <div class="for-checking">
                                                <span>Deliver To</span><br>
                                                <label class="switcha">
                                                    <input type="checkbox" checked name="ib_deliver_to">
                                                    <span class="slidera rounda"></span>
                                                </label>
                                            </div>

                                            <div class="notes">
                                                <span class="loan1">Notes:</span><br>
                                                <textarea id="w3review" name="ib_deliver_to_notes" rows="4" cols="45"
                                                    class="form-control custom-modal-textbox3"
                                                    style="width: 441px"> </textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="createby1">
                                    <span>createbysonsoncheckit@gmail.com on 12/02/2022</span><br>
                                    <span>createbysonsoncheckit@gmail.com on 12/02/2022</span>

                                </div>
                            </div>
                            <div class="modal-footer md-footer-custom foot">
                                <hr style="margin-top: 0px;">
                                <button type="submit" class="btn custom-modal-btn btn-success" id="btn">Save
                                    change</button>
                                <button type="button" class="btn custom-modal-btn btn-danger"
                                    data-dismiss="modal">Cancel</button>

                            </div><br>
                </form>
                <!-- end -->
            </div>
        </div>
    </div>
    <!-- end -->
    <div id="popup_model_editor" class="modal fade second_model" style="margin-top:20%;margin-right:10%;">
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
                            <div class="checkings form-control custom-modal-textbox3" id="for-insert-list"
                                style="height: auto;margin-top: 15px;">
                                <div class="checkin-box11" style="margin:10px 0px;" id="mytable">

                                </div>
                            </div>
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

    <div id="popup_model" class="modal fade second_model">
        <div class="modal-dialog modal-lg">
            <div class="modal-content" style="background-color: #f2f2f2;width: auto;">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><i
                            class="icon-cancel-circle2"></i></button>
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

    <div id="list_popup_model" class="modal fade" style="width: 1200px;">
        <div class="modal-dialog modal-lg">
            <div class="modal-content" style="background-color: #f2f2f2;width: auto;">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><i
                            class="icon-cancel-circle2"></i></button>

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
                                <div class="text-danger"></div>
                            </div>
                        </div>
                        <div class="col-xs-6 col-sm-6 col-md-6">
                            <button type="button" class="btn btn-primary" style="margin-top: 30px;font-size: 10px;"
                                onclick="getContactList()">Add Existing Contact</button>
                        </div>
                    </div>
                    <div class="row contact-list-row" style="display: none">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <hr>
                            <h4>List of Contacts</h4>


                            <table class="table table-bordered table-responsive" id="list-mytable">
                                <tr>
                                    <th>Name</th>
                                    <th>Surname</th>
                                    <th>Email</th>
                                    <th>Action</th>
                                </tr>

                            </table>
                            <button type="button" class="btn btn-primary text-end"
                                style="margin-top: 30px;font-size: 10px;float: right;" id="add-rows">Add</button>
                        </div>
                    </div>
                    <div class="row" style="">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <h4>Added List of Contact</h4>
                            <form action="javascript:void(0)" id="list-form" class="form-horizontal" style="padding: 20px"
                                method="POST">

                                <table class="table table-bordered table-responsive" id="final-contact">
                                    <tr>
                                        <th>Name</th>
                                        <th>Surname</th>
                                        <th>Email</th>
                                        <th>Action</th>
                                    </tr>
                                </table>

                            </form>
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
        function getExistingContact() {
            $.ajax({
                type: "GET",
                url: "{{ url('get-contact-lists-booking') }}",
                data: {},
                success: function(res) {
                    $('#mytable').html(res);
                    $('#popup_model_editor').modal('show');
                }
            });
        }

        function getExistingList() {
            $.ajax({
                type: "GET",
                url: "{{ url('get-lists-booking') }}",
                data: {},
                success: function(res) {
                    $('#mytable').html(res);
                    $('#popup_model_editor').modal('show');
                }
            });
        }
        $('#insert_list').click(function() {
            $('#mytable').find('p').each(function() {
                var row = $(this);
                if (row.find('input[type="checkbox"]').is(':checked')) {
                    var current_id = row.find('input').val();
                    var contact = [];
                    $('#inserted-list').find('p').each(function() {
                        var row = $(this);
                        var ids = row.find('input[type="checkbox"]').val();
                        contact.push(ids);
                    });
                    if (contact.indexOf(current_id) == -1) {
                        $("#inserted-list").append(row);
                    }
                }
            });

            $('#popup_model_editor').modal('hide');
        });
        $('#delete_list').click(function() {
            $('#inserted-list').find('p').each(function() {
                var row = $(this);
                if (row.find('input[type="checkbox"]').is(':checked')) {
                    row.hide();
                }
            });
            $('#popup_model_editor').modal('hide');
            $('#popup_model1').modal('show');
        });
        $('#mark_as_primary').click(function() {
            var id = 0;
            var counter = 0;
            $('#inserted-list').find('p').each(function() {
                var row = $(this);
                if (row.find('input[type="checkbox"]').is(':checked')) {
                    id = row.find('input[type="checkbox"]').val();
                    counter++;
                }
            });
            if (counter == 0) {
                alert("Please Select a Contact to make Mark as Primary");
            } else if (counter > 1) {
                alert("Please Select a Single Contact to make Mark as Primary");
            } else {
                if (counter == 1) {
                    $('#primary_contact').val(id);
                    alert("Mark as Primary Successful");
                }
            }
        });
        /*$('#edit_contact').click(function () {
          $('#inserted-list').find('p').each(function () {
                var row = $(this);
                var id = row.find('input[type="checkbox"]').click();
                
            });
        });*/
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

        function makebooking(vehicle_id, date, img, reg_number, brand, model, derivative) {
            console.log(date, img, reg_number, brand, model, derivative);
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
            $('.start_date').val(date);
            $('#vahicle_img').attr('src', img);
            $('#rt-number').html(reg_number);
            $('#brand_name').html('Brand: ' + brand);
            $('#model_number').html('Model: ' + model);
            $('#derivative').html('Derivative: ' + derivative);

            $.ajax({
                type: "POST",
                url: "{{ url('edit-booking') }}",
                data: {
                    vehicle_id: vehicle_id,
                    date: date
                },

                dataType: 'json',
                success: function(res) {

                    if (res.length != 0) {

                        $.each(res.booking_list, function(key, value) {
                            if (key == 'booking_notes' || key == 'lag_notes' || key == 'lead_notes' ||
                                key == 'ob_pick_from_notes' || key == 'ib_deliver_to_notes' || key ==
                                'ib_pick_from_notes' || key == 'vehicle') {
                                $("textarea[name='" + key + "']").val(value);
                                $('#btn').html('Update');
                            } else {
                                if (key == 'loan_type') {
                                    $("select[name='" + key + "']").val(value);
                                }
                                if (key == 'email_temeplete') {
                                    var email_tem = value.split(",");
                                    $.each(email_tem, function(index, v) {
                                        $('input[name="email_temeplete[]"][value="' + v
                                            .toString() + '"]').prop("checked", true);
                                    });
                                }
                                if (key == 'contacts') {
                                    var addtext = '';
                                    $.each(res.contact_list, function(index, v) {
                                        if (res.booking_list.primary_contact == v.id) {
                                            addtext = ' (Primary)';
                                        } else {
                                            addtext = '';
                                        }

                                        $('#inserted-list').append(
                                            '<p><input type="checkbox" checked id="' + v
                                            .id + '" value="' + v.id +
                                            '" name="contacts[]"> &nbsp;&nbsp;&nbsp;<lable for="' +
                                            v.id + '">' + v.name + addtext + '</lable></p>'
                                        );
                                    });
                                } else {
                                    $("input[name='" + key + "']").val(value);
                                }
                            }
                        });
                    }
                }
            });
            $('#popup_model1').modal('show');
        }
        $("#itemform").submit(function(event) {
            event.preventDefault();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $("#btn").html('Please Wait...');

            $.ajax({
                type: "POST",
                url: "{{ url('store-booking') }}",
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                dataType: 'json',
                success: function(res) {
                    if (res.success == true) {
                        window.location.reload();
                    } else {
                        $("#btn").html('Submit');
                        $('.text-danger').html(res.error - msg);
                        $("#btn").html(btn);
                        $("#btn").attr("disabled", false);
                    }
                }
            });
        });
        //add contact
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
                            $('#popup_model').modal('hide');
                            alert("Contact Added Successful");
                            $("#contact-submit-btn").attr("disabled", false);
                        }
                    });
                }
            });
        });
        //add list
        $("#list-form").submit(function(event) {
            event.preventDefault();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $("#listbtn").html('Please Wait...');
            $.ajax({
                type: "POST",
                url: "{{ route('lists.store') }}",
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                dataType: 'json',
                success: function(res) {
                    if (res.success == true) {
                        $('#list_popup_model').modal('hide');
                    } else {
                        $('.text-danger').html(res.error - msg);
                        $("#listbtn").html(btn);
                        $("#listbtn").attr("disabled", false);
                    }
                }
            });
        });
        $(document).ready(function($) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $('#add-list-contact').click(function() {

                $('#list-form').trigger("reset");
                $("#listbtn").attr("disabled", false);
                $('.text-danger').html('');
                $('#final-contact').html(
                    '<tr> <th>Name</th> <th>Surname</th> <th>Email</th> <th>Action</th> </tr>');
                $('#list-mytable').html('');
                $('#list_popup_model').modal('show');
            });

            $('#listbtn').click(function(event) {
                $("#list-form").submit();
            });
        });

        function getContactList() {
            $.ajax({
                type: "GET",
                url: "{{ url('get-contact-lists') }}",
                data: {},
                success: function(res) {
                    $('#list-mytable').html(res);
                    $('.contact-list-row').css('display', 'block');
                }
            });
        }

        function removethis(_this) {
            $(_this).parents(".contact-row").remove();
        }
        $('#add-rows').click(function() {
            $('#list-mytable').find('tr').each(function() {
                var row = $(this);
                if (row.find('input[type="checkbox"]').is(':checked')) {
                    row.children(".check-box").html(
                        '<button type="button" class="btn btn-danger delete" onclick="removethis(this)">Delete</button>'
                        );

                    var current_id = row.find('input[type="hidden"]').val();
                    var contact = [];
                    $('#final-contact').find('tr').each(function() {
                        var ids = $(this).find('input[type="hidden"]').val();
                        contact.push(ids);
                    });
                    if (contact.indexOf(current_id) == -1) {
                        $("#final-contact").append(row);
                        row.children(".contact-row").hide();
                    }
                }
            });
            $('.contact-list-row').css('display', 'none');
        });
    </script>
@endsection
