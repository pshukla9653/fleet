@extends('layouts.theme')

@section('heading','Booking Overview')
<style>
  
.tooltip-inner{
  
  background-color: #fff !important;
  padding:0px !important;
  
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
  .btnsss{
  border: 2px solid #0f91fb;
  background-color: white;
  padding: 2px 10px;
  font-size: 10px;
  background: #0f91fb;
  color: white;
  font-weight: 500;
  }
  .btnssss{
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
 input[type="date"]::-webkit-calendar-picker-indicator{
    position: absolute;
    margin-left: 72%;
    background-color: #f2f2f2;
    padding: 7px;
    border: 1px solid #bbb8b8;
    border-radius: 2px;
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
.form-check-input-reverse{
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

.checkings { border:2px solid #ccc; width:361px; height: 100px; overflow-y: scroll;}
  /*second-form css*/
  .switch {
  display: inline-block;
  height: 34px;
  position: relative;
  width: 60px;
}

.switch input {
  display:none;
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

input:checked + .slider {
  background-color: #66bb6a;
}

input:checked + .slider:before {
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
  display:none;
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

input:checked + .slider1 {
  background-color: #66bb6a;
}

input:checked + .slider1:before {
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

input:checked + .slidera {
  background-color: #66bb6a;
}

input:focus + .slidera {
  box-shadow: 0 0 1px #66bb6a;
}

input:checked + .slidera:before {
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

button.editss {
  font-size: 12px;
      margin-top: 10px;
    background: #2b80ff;
    color: #fff;
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
</style>

</style>
@section('content')
<div class="page-header">
	<div class="page-header-content">
	  <div class="page-title">
		<h6><i class="icon-home2 position-left"></i> <i class="fa fa-angle-double-right"></i>  Overview</h6>
	  </div>
  <hr>
	  
	</div>
	</div>
<div class="row">		
  <div class="col-md-4" style="padding: 30px;">
    <select class="form-control border-0" style="background: transparent;width:6%;">
      <option>Filter</option>
   </select>

  </div>
  <div class="col-md-4" style="">
    <a id="additem" class="btn btn-primary" style="margin-left: 20px;"><img src="{{ asset('assets/images/icon/add.png') }}" alt="add" style="width: 21px;margin-left: -8px;"/>&nbsp;  Add New Item</a>

  </div>
  <div class="col-md-4" style="padding: 30px;">
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
      <div class="col-md-2" style="width: 28.56%">
        
        <div class="form-group" style="margin-bottom: -10px;">
          <strong>Start Date</strong>
          
          <input type="text" onchange="submit();" value="{{$start_date}}" id="start_date" class="form-control custom-modal-textbox" style="padding:0px!important;width:150px;" name="start_date"/>
          <img src="{{ asset('assets/images/icon/calendar.png') }}" onclick="$('#start_date').focus();" alt="bell" style="width: 17px;margin-top: -80px;
          margin-left: 161px;"/>
          <button class="btn btn-outline-success" style="width: 143px;left: 66px;
          bottom: 40px;">
          <span id="custom_input"></span>
            <i class="fa fa-fast-backward" onclick="step_fast_backward_date();"></i>
            <i class="fa fa-step-backward" onclick="step_backward_date();"></i>
            <span class="day-filter">{{date('Y-m-d')==$start_date?'Today':$start_date}}</span>
            <i class="fa fa-step-forward" onclick="step_forward_date();"></i>
            <i class="fa fa-fast-forward" onclick="step_fast_forward_date();"></i>
          </button>
        </div> 
       
      </div>
      <div class="col-md-2" style="width: 14.28%">
        <div class="form-group">
          <strong>Date Range</strong>
          
              <select name="date_range" id="date_range" onchange="custom_search();" style="padding:5px;" class="form-control custom-modal-textbox">
               
                <option value="1" {{($date_range=='1')?'selected':''}}>1 weeks</option>
                <option value="2" {{($date_range=='2')?'selected':''}}>2 weeks</option>
                <option value="3" {{($date_range=='3')?'selected':''}}>3 weeks</option>
                <option value="4" {{($date_range=='4')?'selected':''}}>4 weeks</option>
              </select>  
              
            
        </div>  
      </div>
     
      <div class="col-md-2" style="width: 14.28%">
        <div class="form-group">
          <strong>Brand</strong>
          
              <select name="brand_id" id="brand_id" onchange="custom_search();" style="padding:5px;" class="form-control custom-modal-textbox">
                <option value="" >All Brands</option>
                @foreach ($brands as $key=>$brand)
                <option value="{{$brand->id}}" {{$brand_id==$brand->id?'selected':''}}>{{$brand->brand_name}}</option>
                @endforeach
              </select>  
            
        </div>  
      </div>
      <div class="col-md-2" style="width: 14.28%">
        <div class="form-group">
          <strong>Department</strong>
         
            <select name="department_id" style="padding:5px;" onchange="custom_search();" id="department_id" class="form-control custom-modal-textbox">
                <option value="">All Departments</option>
                  @foreach ($departments as $key=>$department)
                  <option value="{{$department->id}}" {{$department_id==$department->id?'selected':''}}>{{$department->department_name}}</option>
                  @endforeach
            </select> 
          
        </div>  
      </div>
      <div class="col-md-2" style="width: 14.28%">
        <div class="form-group">
          <strong>Region</strong>
         
            <select name="region_id" style="padding:5px;" onchange="custom_search();" id="region_id" class="form-control custom-modal-textbox">
              <option value="">All Regions</option>
                @foreach ($regions as $key=>$region)
                <option value="{{$region->id}}" {{$region_id==$region->id?'selected':''}}>{{$region->region_name}}</option>
                @endforeach
            </select> 
          
        </div>  
      </div>
      <div class="col-md-2" style="width: 14.28%">
        <div class="form-group">
          <strong>Vehicles</strong>
          <br>
          <input type="checkbox" name="" id=""/> Show off fleet vehicles?<br>
          <input type="checkbox" name="" id=""/> On fleet within 2 weeks
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
              @for($i=0; $i< $days; $i++)
                <th style="width:3% !impotant;padding:10px; font-size:8px;font-weight: 600;">{{date("d-m-Y", strtotime($start_date . "+".$i." day"))}}</th>
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
                          <tr><td colspan='2'><img src='{{ asset("storage/".$vehicle->image) }}' alt='{{$vehicle->registration_number}}' style='width: 100%; height:auto;padding:10px;'/></td></tr>
                          <tr><td colspan='2'>&nbsp;</td></tr>
                          <tr><td colspan='2' style='text-align:center;'><span style='font-size:18px;color:black;padding:5px;border-radius: 5px;background-color:{{$vehicle->registration_plate_colour}}'>{{$vehicle->registration_number}}</span></td></tr>
                          <tr><td colspan='2'>&nbsp;</td></tr>
                          <tr style='font-size:12px;'><td style='padding:2px 2px 2px 78px;'><b>Brand:</b></td><td> {{ $vehicle->brand->brand_name }}</td></tr>
                          <tr style='font-size:12px;'><td style='padding:2px 2px 2px 78px;'><b>Model:</b></td><td> {{ $vehicle->model }}</td></tr>
                          <tr style='font-size:12px;'><td style='padding:2px 2px 2px 78px;'><b>Derivative:</b></td><td> {{ $vehicle->derivative }}</td></tr>
                          
                          
                        </table>
                      </td>
                      <td style='width:33.33%;padding:10px;'>
                        <table style='width:100%;margin-top:-80px;'>
                          <tr><td style='color:#376473;font-weight:600;'>Vehicle Information<br>&nbsp;<br></td><td></td></tr>
                          <tr style='font-size:12px; background-color:{{$vehicle->registration_plate_colour}}'><td style='padding:2px;'><b>Brand:</b></td><td> {{ $vehicle->brand->brand_name }}</td></tr>
                          <tr style='font-size:12px; background-color:{{$vehicle->registration_plate_colour}}'><td style='padding:2px;'><b>Model:</b></td><td> {{ $vehicle->model }}</td></tr>
                          <tr style='font-size:12px; background-color:{{$vehicle->registration_plate_colour}}'><td style='padding:2px;'><b>Derivative:</b></td><td> {{ $vehicle->derivative }}</td></tr>
                          <tr style='font-size:12px;'><td style='padding:2px;'><b>Department:</b></td><td>{{ $vehicle->department->department_name }}</td></tr>
                          <tr style='font-size:12px;background-color:#eeeeee;'><td style='padding:2px;'><b>Registration NO:</b></td><td>{{$vehicle->registration_number}}</td></tr>
                          <tr style='font-size:12px;'><td style='padding:2px;'><b>VIN:</b></td><td>{{$vehicle->vin}}</td></tr>
                          <tr style='font-size:12px;background-color:#eeeeee;'><td style='padding:2px;'><b>Adoption Date:</b></td><td>{{$vehicle->adoption_date}}</td></tr>
                          <tr style='font-size:12px;'><td style='padding:2px;'><b>Projected Defleet Date:</b></td><td>{{$vehicle->projected_defleet_date}}</td></tr>
                        </table>
                      </td>
                      <td style='width:33.33%;padding:10px;'>
                        <table style='width:100%;margin-top:-35px;'>
                          
                          <tr style='font-size:12px;background-color:#eeeeee;'><td style='padding:2px;'><b>Regions:</b></td><td>{{ $vehicle->region->region_name }}</td></tr>
                          <tr style='font-size:12px;'><td style='padding:2px;'><b>Other Details:</b></td><td>{{$vehicle->other_details}}</td></tr>
                          <tr style='font-size:12px;background-color:#eeeeee;'><td style='padding:2px;'><b>Lead Time:</b></td><td>{{$vehicle->lead_time}}</td></tr>
                          <tr style='font-size:12px;'><td style='padding:2px;'><b>Lag Time:</b></td><td>{{$vehicle->lag_time}}</td></tr>
                          <tr style='font-size:12px;background-color:#eeeeee;'><td style='padding:2px;'><b>Engine:</b></td><td>{{$vehicle->engine}}</td></tr>
                          <tr style='font-size:12px;'><td style='padding:2px;'><b>Colour:</b></td><td>{{$vehicle->colour}}</td></tr>
                          <tr style='font-size:12px;background-color:#eeeeee;'><td style='padding:2px;'><b>Mileage:</b></td><td>{{$vehicle->mileage}}</td></tr>
                          <tr style='font-size:12px;'><td style='padding:2px;'><b>Value:</b></td><td>{{$vehicle->value}}</td></tr>
                          <tr style='font-size:12px;background-color:#eeeeee;'><td style='padding:2px;'><b>Notes:</b></td><td>{{$vehicle->notes}}</td></tr>
                        </table>
                      </td>
                    </tr>

                  </table>
                </div>
                " data-html="true" data-placement="right" style="font-weight: 600; font-size:12px; padding: 5px;border-radius: 5px;background-color:{{$vehicle->registration_plate_colour}}">{{$vehicle->registration_number}}</span>
              <br><span style="font-size:9px;position: absolute;margin-top: 7px;">{{$vehicle->vin}}</span>
              <br><span style="font-size:9px;position: absolute;margin-top: -4px;">Newspress {{$vehicle->model}}</span></td>
              @for($i=0; $i< $days; $i++)
                <td></td>
              @endfor
            </tr>
            @endforeach
          </tbody>

        </table>

	
      </div>
    </div>
  </div>
</div>
<div id="popup_model1" class="modal fade">
    <div class="modal-dialog modal-lg">
      <div class="modal-content" style="background-color: #f2f2f2;">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal"><i class="icon-cancel-circle2"></i></button>
          
        </div>

        <div class="modal-title md-heading-custom" style="background-color:#30a02c;" id="form_heading">
          <h5>
            Booking Overview
          </h5>
          <div class="side-header">
            <span class="checkboxs">
              <img class="check-mark" src="{{ asset('assets/images/check.png') }}">
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
        <form action="" id="itemform" class="" method="POST" enctype="multipart/form-data">
          <div id="aaa">
            <div class="modal-body md-body-custom allset">
              @csrf
            <div class="row">
              <div id="aaa">
                <div class="col-md-12 main">
                  <div class="col-md-3">
                     <div class="car-img">
                        <img class="image-1" src="{{ asset('assets/images/logo1.png') }}">                   
                      </div>
                      <div class="sides-1">
                        <button class="rt-number">9867RT</button><br>
                        <span>Brand:</span><br>
                        <span>Model:</span><br>
                        <span>Derivative:</span>
                      </div>
                  </div>
                  <div class="col-md-4">
                     <div class="main-date">
                        <span class="stratdate">Start Date</span>
                        <span class="enddate">End Date</span>
                        <div class="form-groupdate">
                          <span class="datepicker">
                            <input type="text" name="start_date" id="feRouteDate" />  
                            <img class="fa fa-calendar ass" src="{{ asset('assets/images/icon/calendar.png') }}" alt="">
                          </span> 
                          <span class="datepickers">
                            <input type="text" name="end_date" id="feRouteDate" />  
                            <img class="fa fa-calendar as" src="{{ asset('assets/images/icon/calendar.png') }}" alt="">
                          </span> 
                        </div>
                     </div>
                     <br>
                     <div class="booking-set">
                        <span class="booknow">Booking Reference</span>
                        <span class="booknowaa">Purpose of Loan</span>
                     </div>
                     <div class="book-loan">
                        <input type="text" name="booking_reference" class="ref-name">&nbsp&nbsp           
                        <input type="text" name="purpose_of_lone" class="loan-name">
                     </div>
                     <br>
                     <div class="">
                        <span class="loan1">Loan Type:</span><br>
                        <select id="cars" name="loan_type">
                           <option value="volvo">Volvo</option>
                           <option value="saab">Saab</option>
                        </select>
                     </div>
                     <br>
                     <span class="loan1">Booking Notes:</span>
                     <textarea id="w3review" name="booking_notes" rows="4" cols="38"></textarea>
                     <div class="booking-set">
                        <span class="booknow">Lag time (days)</span>
                        <span class="booknowa1">Lead time (days)</span>
                     </div>
                     <div class="book-loan">
                        <input type="text" name="lag_time" class="ref-name">&nbsp&nbsp           
                        <input type="text" name="lead_time" class="loan-name">
                     </div>
                     <br>
                     <span class="loan1">Lead time Notes:</span>
                     <textarea id="w3review" name="lag_notes" rows="4" cols="38"></textarea>
                     <span class="loan1">Load time Note:</span>
                     <textarea id="w3review" name="lead_notes" rows="4" cols="38"></textarea>
                  </div>
                  <div class="col-md-5">
                     <div class="checking-box">
                        <div class="form-check">
                           <label class="form-check-label" for="show_delivery_day">
                           Show delivery day
                           </label>
                           <input class="form-check-input-reverse" type="checkbox" name="show_delivery_day" value="Show Delivery Day" id="show_delivery_day">
                        </div>&nbsp  &nbsp  &nbsp  
                        <div class="form-check">
                           <label class="form-check-label" for="show_collectioin_day">
                           Show collection day
                           </label>
                           <input class="form-check-input-reverse" type="checkbox" name="show_collectioin_day" value="Show Collection Day" id="show_collectioin_day">
                        </div>
                     </div>
                     <label for="w3review">Contacts:</label>
                     <textarea id="" name="contacts" rows="5" cols="47"> </textarea>
                     <!-- button -->
                     <div class="button1">
                        <button class="editss">Edit</button>&nbsp 
                        <button class="editss">Mark as primary</button>&nbsp 
                        <button class="editss" style="background-color:#ff4e4e">Delete</button>
                     </div>
                     
                     <div class="button2">
                        <button class="editss">Select from existing contact</button>&nbsp 
                        <button class="editss">Select from existing list</button>
                     </div>
                    
                     <div class="button3">
                        <a href="{{ route('contacts.index') }}" class="editss"><button  >Add New Contact</button></a>&nbsp 
                        <a href="{{ route('lists.index') }}"><button  class="editss">Add New List</button></a>
                     </div>
                     <label for="vehicle">Vehicle:</label>
                     <textarea id="vehicle" name="vehicle" rows="5" cols="47">
                          </textarea>
                     <div class="text-edit">
                        <button>Edit</button>
                     </div>
                     <span>Select Email Tampalet for Booking</span>
                     <div class="checkings">
                        <div class="checkin-box11" style="margin-left:10px">
                          <input type="checkbox" value="1" name="email_temeplete[]" /> This is checkbox <br />
                          <input type="checkbox" value="2" name="email_temeplete[]" /> This is checkbox <br />
                          <input type="checkbox" value="3" name="email_temeplete[]" /> This is checkbox <br />
                          <input type="checkbox" value="4" name="email_temeplete[]" /> This is checkbox <br />
                          <input type="checkbox" value="5" name="email_temeplete[]" /> This is checkbox <br />
                          <input type="checkbox" value="6" name="email_temeplete[]" /> This is checkbox <br />
                          <input type="checkbox" value="7" name="email_temeplete[]" /> This is checkbox <br />
                          <input type="checkbox" value="8" name="email_temeplete[]" /> This is checkbox <br />
                          <input type="checkbox" value="9" name="email_temeplete[]" /> This is checkbox <br />
                          <input type="checkbox" value="10" name="email_temeplete[]" /> This is checkbox <br />
                        </div>
                      </div>
                     <!--  -->
                  </div>
                </div>

                <div class="createby">
                    <span>createbysonsoncheckit@gmail.com on 12/02/2022</span><br>
                    <span>createbysonsoncheckit@gmail.com on 12/02/2022</span>
                </div>
                <div class="modal-footer md-footer-custom">
                    <!-- <hr style="margin-top: 0px;">
                    <button type="submit" class="btn custom-modal-btn btn-success" id="btn">Save change</button>
                    <button type="button" class="btn custom-modal-btn btn-danger" data-dismiss="modal">Cancel</button> 
                    <div class="delete-booking">
                       <button type="button" class="btn custom-modal-btn btn-danger" data-dismiss="modal">Delete Booking</button>
                    </div>  -->             
                </div>
    
              </div>

            </div>
               </div>

          </div>
        
           <!-- second-form-card -->
        <script>
          $(document).ready(function(){
            $("#chekckk1").click(function(){
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
                <input type="checkbox" id="checkbox" name="ob_pick_from"/>
                <div class="slider round"></div>
              </label>
            </div>
            <div class="notes">
               <span class="loan1">Notes:</span><br>
              <textarea id="w3review" name="ob_pick_from_notes" rows="4" cols="45"> </textarea>
            </div>
        </div>
      </div>
      <div class="col-md-7">
         <div class="main-for-checking1">

            <div class="container">
              <span>Deliver To</span><br>
              <label class="switch1" for="checkbox1">
                <input type="checkbox" id="checkbox1" name="ob_deliver_to" />
                <div class="slider1 round1"></div>
              </label>
            </div>
            <!--  -->
            <div class="main-address">        
              <div class="address">
                <span class="address1">Address1</span><br>
                <input type="text" name="ob_deliver_to_address_1" class="address2">
              </div>
              <div class="address">
                <span class="address1">Address2</span><br>
                <input type="text" name="ob_deliver_to_address_2" class="address2">
              </div>
            </div>
          <div class="main-address">        
            <div class="address">
              <span class="address1">Twon/City</span><br>
              <input type="text" name="ob_deliver_to_town_city" class="address2">
            </div>
            <div class="address">
              <span class="address1">County</span><br>
              <input type="text" name="ob_deliver_to_county" class="address2">
            </div>
          </div>
          <div class="main-address">        
            <div class="address">
              <span class="address1">Postcode</span><br>
              <input type="text" name="ob_deliver_to_post_code" class="address2">
            </div>
            <div class="address">
              <span class="address1">Country</span><br>
              <input type="text" name="ob_deliver_to_country" class="address2">
            </div>
          </div>
          <div class="notes-all">
            <span class="loan11">Notes:</span><br>
            <textarea id="notes1" name="ob_deliver_to_deliver_notes" rows="4" cols="58"> </textarea>
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
                <!-- <hr style="margin-top: 0px;">
                <button type="submit" class="btn custom-modal-btn btn-success" id="btn">Save change</button>
                <button type="button" class="btn custom-modal-btn btn-danger" data-dismiss="modal">Cancel</button>  -->
                             
              </div>
                
                <!-- end -->
        </div>
        </div>   
         <!-- start third-->
                   <script>
$(document).ready(function(){
  $("#chekckk2").click(function(){
  $("#aaa2").toggle();
    // $('#chekckk').css('transform','rotate(180deg)');
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
  
      <div class="col-md-7">

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
          <input type="text" name="ib_pick_from_address_1" class="address2">
        </div>
        <div class="address">
          <span class="address1">Address2</span><br>
          <input type="text" name="ib_pick_from_address_2" class="address2">
        </div>
        </div>
          <div class="main-address">        
        <div class="address">
          <span class="address1">Twon/City</span><br>
          <input type="text" name="ib_pick_from_town_city" class="address2">
        </div>
        <div class="address">
          <span class="address1">County</span><br>
          <input type="text" name="ib_pick_from_county" class="address2">
        </div>
        </div>
          <div class="main-address">        
        <div class="address">
          <span class="address1">Postcode</span><br>
          <input type="text" name="ib_pick_from_post_code" class="address2">
        </div>
        <div class="address">
          <span class="address1">Country</span><br>
          <input type="text" name="ib_pick_from_country" class="address2">
        </div>
        </div>
         <div class="notes-all">
           <span class="loan11">Notes:</span><br>
         <textarea id="notes1" name="ib_pick_from_notes" rows="4" cols="58">
            </textarea>
        </div>
        </div>
   </div>
       <div class="col-md-5">
        <div class="main-for-checking1">
               
        <div class="for-checking">
            <span>Deliver To</span><br>
       <label class="switcha">
  <input type="checkbox" checked name="ib_deliver_to">
  <span class="slidera rounda"></span>
</label>
        </div>

        <div class="notes">
           <span class="loan1">Notes:</span><br>
         <textarea id="w3review" name="ib_deliver_to_notes" rows="4" cols="45" > </textarea>
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
                <button type="submit" class="btn custom-modal-btn btn-success" id="btn">Save change</button>
                <button type="button" class="btn custom-modal-btn btn-danger" data-dismiss="modal">Cancel</button> 
                             
              </div><br>
              </form>
           <!-- end -->
    </div>
    </div>
</div>
<!-- end -->
<!-- <div id="popup_model" class="modal fade">
    <div class="modal-dialog modal-lg">
      <div class="modal-content" style="background-color: #f2f2f2;">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal"><i class="icon-cancel-circle2"></i></button>
          
        </div>
        <h6 class="modal-title md-heading-custom" id="form_heading"></h6>
        <div class="modal-body md-body-custom">
         
          <form action="{{route('vehicles.store')}}" id="itemform" class="form-horizontal" method="POST" enctype="multipart/form-data">
              @csrf
              <div class="row">
                <div class="col-md-12 main">
                  <div class="col-md-3">
                     <div class="car-img">
                        <img class="image-1" src="{{ asset('assets/images/logo1.png') }}">               
                      </div>
                      <div class="sides-1">
                        <button class="rt-number">9867RT</button><br>
                        <span>Brand:</span><br>
                        <span>Model:</span><br>
                        <span>Derivative:</span>
                      </div>
                  </div>
                  <div class="col-md-4">
                     <div class="main-date">
                        <span class="stratdate">Start Date</span>
                        <span class="enddate">End Date</span>
                        <div class="form-groupdate">
                           <span class="datepicker"><input type="text" id="feRouteDate" />  
                           <img class="fa fa-calendar ass" src="{{ asset('assets/images/icon/calendar.png') }}" alt="">
                           </span> 
                           <span class="datepickers"><input type="text" id="feRouteDate" />  
                           <img class="fa fa-calendar as" src="{{ asset('assets/images/icon/calendar.png') }}" alt="">
                           </span> 
                        </div>
                     </div>
                     <br>
                     <div class="booking-set">
                        <span class="booknow">Booking Reference</span>
                        <span class="booknowaa">purpose of loan</span>
                     </div>
                     <div class="book-loan">
                        <input type="" name="" class="ref-name">&nbsp&nbsp           
                        <input type="" name="" class="loan-name">
                     </div>
                     <br>
                     <div class="">
                        <span class="loan1">Loan Type:</span><br>
                        <select id="cars" name="cars">
                           <option value="volvo">Volvo</option>
                           <option value="saab">Saab</option>
                        </select>
                     </div>
                     <br>
                     <span class="loan1">Review of W3Schools:</span>
                     <textarea id="w3review" name="w3review" rows="4" cols="38"></textarea>
                     <div class="booking-set">
                        <span class="booknow">Lag time (days)</span>
                        <span class="booknowa1">Lead time (days)</span>
                     </div>
                     <div class="book-loan">
                        <input type="" name="" class="ref-name">&nbsp;&nbsp;           
                        <input type="" name="" class="loan-name">
                     </div>
                     <br>
                     <span class="loan1">Lead Time Notes:</span>
                     <textarea id="w3review" name="w3review" rows="4" cols="38"></textarea>
                     <span class="loan1">Load Time Note:</span>
                     <textarea id="w3review" name="w3review" rows="4" cols="38"></textarea>
                  </div>
                  <div class="col-md-5">
                     <div class="checking-box">
                        <div class="form-check">
                           <label class="form-check-label" for="defaultCheck1">
                           Show delivery day
                           </label>
                           <input class="form-check-input-reverse" type="checkbox" value="" id="defaultCheck1">
                        </div>&nbsp  &nbsp  &nbsp  
                        <div class="form-check">
                           <label class="form-check-label" for="defaultCheck1">
                           Show collection day
                           </label>
                           <input class="form-check-input-reverse" type="checkbox" value="" id="defaultCheck1">
                        </div>
                     </div>
                     <label for="w3review">Contacts:</label>
                     <textarea id="" name="w3review" rows="5" cols="47">
                          </textarea>
                     
                     <div class="button1">
                        <button class="editss">Edit</button>&nbsp 
                        <button class="editss">Mark as primary</button>&nbsp 
                        <button class="editss" style="background-color:#ff4e4e">Delete</button>
                     </div>
                     
                     <div class="button2">
                        <button class="editss">Select from existing contact</button>&nbsp 
                        <button class="editss">Select from existing list</button>
                     </div>
                    
                     <div class="button3">
                        <button  class="editss">Add new contact</button>&nbsp 
                        <button class="editss">Add new list</button>
                     </div>
                     <label for="w3review">Vehicle:</label>
                     <textarea id="" name="w3review" rows="5" cols="47">
                          </textarea>
                     <div class="text-edit">
                        <button>Edit</button>
                     </div>
                     <span>Select Email Tampalet for Booking</span>
                     <div class="checkings">
                        <div class="checkin-box11" style="margin-left:10px">
                          <input type="checkbox" /> This is checkbox <br />
                          <input type="checkbox" /> This is checkbox <br />
                          <input type="checkbox" /> This is checkbox <br />
                          <input type="checkbox" /> This is checkbox <br />
                          <input type="checkbox" /> This is checkbox <br />
                          <input type="checkbox" /> This is checkbox <br />
                          <input type="checkbox" /> This is checkbox <br />
                          <input type="checkbox" /> This is checkbox <br />
                          <input type="checkbox" /> This is checkbox <br />
                          <input type="checkbox" /> This is checkbox <br />
                        </div>
                      </div>
                     
                  </div>
                </div>
                <div class="createby">
                    <span>createbysonsoncheckit@gmail.com on 12/02/2022</span><br>
                    <span>createbysonsoncheckit@gmail.com on 12/02/2022</span>
                </div>
                <div class="modal-footer md-footer-custom">
                    <hr style="margin-top: 0px;">
                    <button type="submit" class="btn custom-modal-btn btn-success" id="btn">Save change</button>
                    <button type="button" class="btn custom-modal-btn btn-danger" data-dismiss="modal">Cancel</button> 
                    <div class="delete-booking">
                       <button type="button" class="btn custom-modal-btn btn-danger" data-dismiss="modal">Delete Booking</button>
                    </div>              
                </div>
              </div>

              <div class="modal-footer md-footer-custom">
                  <hr style="margin-top: 0px;">
                  <button type="submit" class="btn custom-modal-btn btn-success" id="btn"></button>
                  <button type="button" class="btn custom-modal-btn btn-danger" data-dismiss="modal">Cancel</button>
                  
              </div>
            </form>
            </div>
        </div>
        
    </div>
</div> -->
 <script>
   function step_fast_backward_date(){
     
    $('#date_range').val(4);
     $('#custom_input').html('<input type="hidden" name="mode" value="backward"/>');
     
     $('#search_form').submit();
   }
   function step_backward_date(){
     
     
     $('#custom_input').html('<input type="hidden" name="mode" value="backward"/>');
     
     $('#search_form').submit();
   }
   function step_forward_date(){
     
     
     $('#custom_input').html('<input type="hidden" name="mode" value="forward"/>');
     
     $('#search_form').submit();
   }
   function step_fast_forward_date(){
     
     $('#date_range').val(4);
     $('#custom_input').html('<input type="hidden" name="mode" value="forward"/>');
     
     $('#search_form').submit();
   }
   function custom_search(){
    $('#search_form').submit();
   }
  $('#additem').click(function() {
      $('#itemform').trigger("reset");
      $('#form_heading').html("Booking Overview");
      $('#btn').html('Submit');
      $('#uploaded_spec').html('');
      $('#image-review').html('');
      $('#image-text').html('');
      $('#image-text').css('background-color','');
      $('#popup_model1').modal('show');
  });

  $("#itemform").submit(function(event) {
      event.preventDefault();
       $.ajaxSetup({
       headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
       }
      });
    /*console.log(new FormData(this));
    console.log($("#itemform").serialize());*/
    $("#btn").html('Please Wait...');
      $.ajax({
          type:"POST",
          url: "{{ url('store-booking') }}",
          // data: $("#itemform").serialize(),
          data: new FormData(this),
          contentType: false,       
          cache: false,             
          processData:false, 
          dataType: 'json',
          success: function(res){
            if(res.success == true){
              window.location.reload();
            } else{
              $("#btn").html('Submit');
              $('.text-danger').html(res.error-msg);
              $("#btn").html(btn);
              $("#btn"). attr("disabled", false);
            } 
         }
      });
  });
 </script>  
@endsection