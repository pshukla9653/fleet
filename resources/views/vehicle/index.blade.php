@extends('layouts.theme')

@section('heading-pre','Configure ')
@section('heading','Vehicles')
@section('content')
<div class="page-header">
	<div class="page-header-content">
	  <div class="page-title" style="margin: 0px 20px;">
		<h6><i class="icon-home2 position-left"></i> <i class="fa fa-angle-double-right"></i> <span style="color: #3a6d7f;">Configure</span> <i class="fa fa-angle-double-right"></i> @yield('heading')</h6>
	  </div>  
	  
	</div>
	</div>
  <hr style="margin: 0px 20px;">
  <div class="row">		
    <div class="col-md-8" style="padding: 15px 30px;">
    <a href="{{ route('vehicles.index')}}" class="btn btn-primary"><img src="{{ asset('assets/images/icon/refresh.png') }}" alt="refresh" style="width: 20px;margin-left: -8px;"/>&nbsp;  Refresh @yield('heading')</a>
    @can('user-create')	
    <a id="additem" class="btn btn-primary" style="margin-left: 20px;"><img src="{{ asset('assets/images/icon/add.png') }}" alt="add" style="width: 21px;margin-left: -8px;"/>&nbsp;  Add New Item</a>
    <!-- button 2-->
      <a id="additem1" class="btn btn-primary" style="margin-left: 20px;"><img src="{{ asset('assets/images/icon/add.png') }}" alt="add" style="width: 21px;margin-left: -8px;"/>&nbsp;  Add New Item2</a>
      <!-- button 3-->
       <a id="additem3" class="btn btn-primary" style="margin-left: 20px;"><img src="{{ asset('assets/images/icon/add.png') }}" alt="add" style="width: 21px;margin-left: -8px;"/>&nbsp;  Add New Item3</a>
    @endcan
    </div>
    <div class="col-md-4" style="padding: 15px 30px;">
    <form class="example" action="">
      <input type="text" placeholder="Search" name="search">
      <button type="submit"><img src="{{ asset('assets/images/icon/search.png') }}" alt="search"/></button>
      </form>		
    </div>
    
    </div>	
<!-- /page header -->

<!-- Content area -->
<div class="content">

    <!-- Main charts -->
    <!-- Quick stats boxes -->

    <!-- /quick stats boxes -->
    <!-- /main charts -->
    <div class="panel panel-flat">
        <div class="panel-heading" style="padding: 0px;">
            
            <div class="heading-elements">
              </div>
              @error('registration_number')
              <div class="alert alert-danger">
                   <strong>{{ $message }}</strong>
                  </div>
              @enderror
              @error('model')
              <div class="alert alert-danger">
                   <strong>{{ $message }}</strong>
                  </div>
              @enderror
              @error('derivative')
              <div class="alert alert-danger">
                   <strong>{{ $message }}</strong>
                  </div>
              @enderror
              @error('vin')
              <div class="alert alert-danger">
                   <strong>{{ $message }}</strong>
                  </div>
              @enderror
              @error('adoption_date')
              <div class="alert alert-danger">
                   <strong>{{ $message }}</strong>
                  </div>
              @enderror
              @error('projected_defleet_date')
              <div class="alert alert-danger">
                   <strong>{{ $message }}</strong>
                  </div>
              @enderror
              @error('loan_cost')
              <div class="alert alert-danger">
                   <strong>{{ $message }}</strong>
                  </div>
              @enderror
              @error('value')
              <div class="alert alert-danger">
                   <strong>{{ $message }}</strong>
                  </div>
              @enderror
              @error('order_number')
              <div class="alert alert-danger">
                   <strong>{{ $message }}</strong>
                  </div>
              @enderror
          </div>
          <div class="panel-body" style="padding: 0px 10px 10px 10px;">
            <div class="row">
                @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
                @endif


                <table class="table table-bordered table-responsive">
                  <thead>
                  <tr>
                    <th style="border-top: none;padding: 10px;font-weight: 600;text-align: center;">Vehicles Images</th>
                    <th style="border-top: none;padding: 10px;font-weight: 600;text-align: center;">Registration No.</th>
                    <th style="border-top: none;padding: 10px;font-weight: 600;text-align: center;">Brand</th>
                    <th style="border-top: none;padding: 10px;font-weight: 600;text-align: center;">Model</th>
                    <th style="border-top: none;padding: 10px;font-weight: 600;text-align: center;">Derivative</th>
                    <th style="border-top: none;padding: 10px;font-weight: 600;text-align: center;">Region</th>
                    <th style="border-top: none;padding: 10px;font-weight: 600;text-align: center;">Department</th>
                    <th style="border-top: none;padding: 10px;font-weight: 600;text-align: center;">Vin</th>
                    <th style="border-top: none;padding: 10px;font-weight: 600;text-align: center;">Adoption Date</th>
                    <th style="border-top: none;padding: 0px 0px 0px 10px;font-weight: 600;" colspan="2">Projected Defleet Date</th>
                    
                </tr>
                  </thead>
                    @foreach ($vehicles as $key => $vehicle)
                    <tr>
                        <td style="width: 15%; padding: 0px 5px;">
                            @can('vehicle-edit')
                            <a onclick="edititem({{ $vehicle->id }})">
                                <img src="{{ asset('assets/images/icon/edit.png') }}" alt="edit"/>
                            </a>
                            @endcan
                            &nbsp;
                            <img src="{{ asset('storage/'.$vehicle->image) }}" alt="{{$vehicle->registration_number}}" style="width: 100px; height:auto;"/>
                        </td>
                        <td style="text-align: center;"><span style="padding: 5px;border-radius: 5px;background-color:{{$vehicle->registration_plate_colour}}">{{$vehicle->registration_number}}</span>
                        
                        <td style="text-align: center;">{{ $vehicle->brand->brand_name }}</td>
                        <td style="text-align: center;">{{ $vehicle->model }}</td>
                        <td style="text-align: center;">{{ $vehicle->derivative }}</td>
                        <td style="text-align: center;">{{ $vehicle->region->region_name }}</td>
                        <td style="text-align: center;">{{ $vehicle->department->department_name }}</td>
                        <td style="text-align: center;">{{ $vehicle->vin }}</td>
                        <td style="">{{ $vehicle->adoption_date }}</td>
                        <td style="">{{ $vehicle->projected_defleet_date }}</td>
                        <td style="width: 5%">


                            @can('vehicle-delete')
                            <a onclick="deleteitem({{ $vehicle->id }})">
                                <img src="{{ asset('assets/images/icon/delete.png') }}" alt="delete"/>
                            </a>
                            @endcan
                        </td>
                    </tr>
                    @endforeach
                </table>
                <br>
                {!! $vehicles->render() !!}

            </div>
        </div>
    </div>
</div>
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
<div id="popup_model" class="modal fade">
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
              <div class="col-md-12">
                <div class="col-md-6">
                  <div id="image-text" style="position: relative;bottom: -140px;left: 15px;width: fit-content;padding: 5px;border-radius: 5px;"></div>
                  <div id="image-review" style="height: 130px; border: 1px solid #bbb8b8;
                  background-color: #f2f2f2; width:80%; margin:20px 20px 0px 0px;">
 
                  </div>
                  
                  <div class="form-group">
                  <div style="text-align: right; width: 78%;">
                    <div class="upload-btn-wrapper" style="margin-top: 4px;margin-right: -3px;">
                       <button class="btnsss">Upload Image</button>
                       <input type="file" name="image" onchange="loadFile(event)">
                    </div>
                     <button id="imagecolor">8885VF</button>
                 </div>
                 <script>
                    var loadFile = function(event) {
                      var output = document.getElementById('output');
                      output.src = URL.createObjectURL(event.target.files[0]);
                      output.onload = function() {
                        URL.revokeObjectURL(output.src) // free memory
                      }
                    };
                 </script>
                 
                 </div>
                
                  <div class="form-group">
                    <strong style="padding: 0px 0px 0px 10px;">Other Details:</strong>
                    {!! Form::textarea('other_details', null, array('class' =>
                    'form-control custom-modal-textbox', 'id' =>'other_details','rows'=>'2','style'=>'margin-bottom: 0px;margin-left: 10px;width:76%;')) !!}
                    <div class="text-danger" id="other_details"></div>
                  </div>
                  <div class="form-group">
                    <strong style="padding: 0px 0px 0px 10px;">Notes:</strong>
                    {!! Form::textarea('notes', null, array('class' =>
                    'form-control custom-modal-textbox', 'id' =>'notes','rows'=>'2','style'=>'margin-bottom: 0px;margin-left: 10px;width:76%;')) !!}
                    <div class="text-danger" id="notes"></div>
                  </div>
                  <strong>Vehicle Spec Sheets:</strong>
                  <select name="sp" size="4" style="border: 1px solid #bbb8b8;
                  background-color: #f2f2f2; width:80%; margin:20px 20px 20px 0px; padding:5px;" id="uploaded_spec">
                  </select>
                  <div class="form-group" style="text-align:right;width:82%;">
                  <button type="button" id="view_specs" class="btn custom-modal-btn btn-info">View</button>
                <button type="button" id="delete_specs" class="btn custom-modal-btn btn-danger">Delete</button>
                  </div>
                  <div class="form-group">
                   
                    <div style="text-align:right;width: 78%;">
                     
                      <div class="upload-btn-wrapper">
                         <button class="btnsss" >Upload </button>
                         <input  type="file" name="spec_sheet[]" multiple>
                      </div>
                   </div>
                    <div class="text-info">Can be upload multiple files (Only PDF)</div>
                    <div class="text-danger" id="spec_sheet[]"></div>
                  </div>
                </div> 
                <div class="col-md-3">
                  <input type="hidden" id="item_id" name="id">
                    <div class="form-group" style="margin-top: 15px;">
                      <strong>Brand:</strong>
                          <select name="brand_id" id="brand_id" class="form-control custom-modal-textbox">
                           
                            @foreach ($brands as $key=>$brand)
                            <option value="{{$brand->id}}">{{$brand->brand_name}}</option>
                            @endforeach
                          </select>  
                          <div class="text-danger" id="brand_id"></div>
                    </div>                                    
                            
                    <div class="form-group">
                      <strong>Model:</strong>
                        {!! Form::text('model', null, array('placeholder' => 'Model','class' =>
                        'form-control custom-modal-textbox', 'id' =>'model')) !!}
                        <div class="text-danger" id="model"></div>
                    </div>
                           
                           
                    <div class="form-group">
                      <strong>Derivative:</strong>
                        {!! Form::text('derivative', null, array('placeholder' => 'Derivative','class' =>
                        'form-control custom-modal-textbox', 'id' =>'derivative')) !!}
                      <div class="text-danger" id="derivative"></div>
                    </div>
                            
                    <div class="form-group">
                      <strong>Region:</strong>
                        <select name="region_id" id="region_id" class="form-control custom-modal-textbox">
                           
                            @foreach ($regions as $key=>$region)
                            <option value="{{$region->id}}">{{$region->region_name}}</option>
                            @endforeach
                        </select>  
                      <div class="text-danger" id="region_id"></div>
                    </div>
                            
                            
                    <div class="form-group">
                      <strong>Department:</strong>
                      <select name="department_id" id="department_id" class="form-control custom-modal-textbox">
                        
                            @foreach ($departments as $key=>$department)
                            <option value="{{$department->id}}">{{$department->department_name}}</option>
                            @endforeach
                      </select>  
                      <div class="text-danger" id="department_id"></div>
                    </div>
                    <div class="form-group">
                      <strong>Registration Number:</strong>
                      {!! Form::text('registration_number', null, array('placeholder' => 'Registration No.','class' =>
                      'form-control custom-modal-textbox', 'id' =>'registration_number')) !!}
                      <div class="text-danger" id="registration_number"></div>
                    </div>
                              
                    <div class="form-group">
                      <strong>Loan Cost:</strong>
                      {!! Form::number('loan_cost', null, array('placeholder' => '0.00','class' =>
                      'form-control custom-modal-textbox', 'id' =>'loan_cost')) !!}
                      <div class="text-danger" id="loan_cost"></div>
                    </div>
                              
                   <!--  <div class="form-group">
                      <strong>Registation Plate Colour:</strong>
                      {!! Form::color('registration_plate_colour', '#FAF43D', array('placeholder' => '0.00','class' =>
                      'form-control custom-modal-textbox', 'id' =>'registration_plate_colour','style' =>'padding:0px!important;width:25%;')) !!}
                      <div class="text-danger" id="registration_plate_colour"></div>
                    </div> -->
             <!-- end --> 
             <!-- strart third 3 -->  




             <!--  -->    
<!-- color chooser -->
<script type="text/javascript">

  function colorchanger(color){
  
    $('#imagecolor').css('background-color',color);
   $('#colorselecter').css('background-color',color);
  }
</script>
<style type="text/css">
  select option.red{
    background-color: red;
  }
   select option.green{
    background-color: green;
  }
   select option.blue{
    background-color: blue;
  }
</style>
<select onchange ="colorchanger(this.value)" id="colorselecter">
  <option selected value="red" class="red">
    
  </option>
   <option value="green" class="green">
  
  </option>
   <option value="blue" class="blue">
    
  </option>
</select>





<!-- end -->

                    <div class="form-group">
                      <strong>VIN:</strong>
                      {!! Form::text('vin', null, array('placeholder' => 'VIN','class' =>
                      'form-control custom-modal-textbox', 'id' =>'vin')) !!}
                      <div class="text-danger" id="vin"></div>
                    </div>
                  </div> 
                  <div class="col-md-3">
                      <div class="form-group" style="margin-top: 15px;">
                        <strong>Adoption Date:</strong>
                        {!! Form::date('adoption_date', null, array('class' =>
                        'form-control custom-modal-textbox', 'id' =>'adoption_date','style' =>'padding:0px!important;')) !!}
                        <div class="text-danger" id="adoption_date"></div>
                      </div>                                   
                    
                      <div class="form-group">
                        <strong>Projected Defleet Date:</strong>
                        {!! Form::date('projected_defleet_date', null, array('class' =>
                        'form-control custom-modal-textbox', 'id' =>'projected_defleet_date','style' =>'padding:0px!important;')) !!}
                        <div class="text-danger" id="projected_defleet_date"></div>
                      </div> 
                      <div class="form-group">
                          <strong>Lead Time:</strong>
                          {!! Form::text('lead_time', 0, array('class' =>
                          'form-control custom-modal-textbox', 'id' =>'lead_time')) !!}
                          <div class="text-danger" id="lead_time"></div>
                      </div>
                      <div class="form-group">
                        <strong>Lag Time:</strong>
                        {!! Form::text('lag_time', 0, array('class' =>
                        'form-control custom-modal-textbox', 'id' =>'lag_time')) !!}
                        <div class="text-danger" id="lag_time"></div>
                      </div>
                    
                      <div class="form-group">
                          <strong>Engine:</strong>
                          {!! Form::text('engine', null, array('placeholder' => 'Engine','class' =>
                          'form-control custom-modal-textbox', 'id' =>'engine')) !!}
                          <div class="text-danger" id="engine"></div>
                      </div>
                      <div class="form-group">
                        <strong>Colour:</strong>
                        {!! Form::text('colour', null, array('placeholder' => 'Colour','class' =>
                        'form-control custom-modal-textbox', 'id' =>'colour')) !!}
                        <div class="text-danger" id="colour"></div>
                      </div>
                      <div class="form-group">
                        <strong>Mileage:</strong>
                        {!! Form::number('mileage', null, array('placeholder' => 'Mileage','class' =>
                        'form-control custom-modal-textbox', 'id' =>'mileage')) !!}
                        <div class="text-danger" id="mileage"></div>
                      </div>
                      <div class="form-group">
                        <strong>Value:</strong>
                        {!! Form::number('value', null, array('placeholder' => 'Value','class' =>
                        'form-control custom-modal-textbox', 'id' =>'value')) !!}
                        <div class="text-danger" id="value"></div>
                      </div>
                      <div class="form-group">
                        <strong>Order No.:</strong>
                        {!! Form::number('order_number', null, array('placeholder' => 'Order No','class' =>
                        'form-control custom-modal-textbox', 'id' =>'order_number')) !!}
                        <div class="text-danger" id="order_number"></div>
                      </div>
                    </div> 
                  </div>        
                  </div>
            </div>

            <div class="modal-footer md-footer-custom">
                <hr style="margin-top: 0px;">
                <button type="submit" class="btn custom-modal-btn btn-success" id="btn"></button>
                <button type="button" class="btn custom-modal-btn btn-danger" data-dismiss="modal">Cancel</button>
                
              </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>
<style type="text/css">
  span.iptionsub {
    margin-left: 141px;
}
.first-textarea {
    margin-left: 35px;
}
.text-area-1 {
    margin-left: -45px;
}

span.iptionsubs {
    margin-left: 158px;
}
.view-button {
    display: flex;
    justify-content: center;
    margin-left: 238px;
}
.upload-btn-wrapper.cdn {
    margin-left: 105px;
    margin-top: 14px;
    height: 22px;
}
i.fa.fa-question-circle {
    display: flex;
    justify-content: center;
    margin-left: 226px;
}
textarea#textara1w {
    margin-left: 19px;
    }
</style>
<!-- start-third-button -->
<div id="popup_model3" class="modal fade">
    <div class="modal-dialog modal-lg">
      <div class="modal-content" style="background-color: #f2f2f2;">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal"><i class="icon-cancel-circle2"></i></button>
          
        </div>
        <h6 class="modal-title md-heading-custom" id="form_heading">CONFIGURE EMAIL TEMPLATE</h6>

        <div class="modal-body md-body-custom"><br>
         
        <form action="{{route('vehicles.store')}}" id="itemform" class="form-horizontal" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
              <div class="col-md-12">
                <div class="col-md-7">
                  <div class="first-textarea">
                 <div class="description">
                   <div class="des-cription">
                     <span class="iption">Description:</span>
                    <span class="iptionsub">Subject:</span>
                   </div>
                   <input type="text" name="" class="discription">&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp;                
                   <input type="text" name="" class="discription">
                 </div>
                  <div class="description">
                   <div class="des-cription">
                     <span class="iption">From Name:</span>
                    <span class="iptionsub">Reply To Email:</span>
                   </div>
                   <input type="text" name="" class="discription">&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp;                
                   <input type="text" name="" class="discription">
                 </div>
                  <div class="description">
                   <div class="des-cription">
                     <span class="iption">From Email:</span>
                    <span class="iptionsub">To Email:</span>
                   </div>
                   <input type="text" name="" class="discription">&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp;                
                   <input type="text" name="" class="discription">
                 </div>
                  <div class="description">
                   <div class="des-cription">
                     <span class="iption">CC Email:</span>
                    <span class="iptionsubs">BCC Email:</span>
                   </div>
                   <input type="text" name="" class="discription">&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp;                
                   <input type="text" name="" class="discription">
                 </div>
                     <span>Status</span><br>
                     <input type="checkbox" id="defaultCheck" name="example2">
                      <label for="defaultCheck">Active</label>
                      <input type="checkbox" id="defaultCheck" name="example2">
                      <label for="defaultCheck">Inactive</label><br>
                      <div class="toolstips">
                      
                      <span>Email Boy</span>
                       <a href="#" data-toggle="tooltip" data-placement="top" title="Tooltip on top">
                           <i class="fa fa-question-circle"></i>
                          </a>
                     
                      <textarea id="textara1" name="" rows="8" cols="53">

                    </textarea>
                      <!-- Trigger the modal with a button -->
                    <!-- pop -->

                         <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Open Modal</button>

  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Modal Header</h4>
        </div>
         <textarea id="textara1w" name="" rows="8" cols="90">

                    </textarea>
          <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
                       <!--  -->

                     </div>
                    </div>
                </div> 

                <div class="col-md-5">
                  <div class="text-area-1">
                    <span>Attachments</span><br>
                      <textarea id="textara1" name="" rows="8" cols="50">
                    </textarea>
                    <div class="view-button">
                    <button style="background-color:#486288;color: #fff;">View</button>&nbsp&nbsp&nbsp;
                    <button style="background-color:#ff4e4e;color: #fff;">Delete</button>  
                    </div>
                    <div class="img-up-load">
                     
                    </div>
                 <div class="imgs-upload1">
                   <input type="" name="" class="image-up">
<div class="upload-btn-wrapper cdn">
                       <button class="btnsss">Upload Image</button>
                       <input type="file" name="image" onchange="loadFile(event)">
                    </div>
                 </div>
                  </div>
               
                </div>  
                  </div>        
                  </div>
            </div>

            <div class="modal-footer md-footer-custom">
                <hr style="margin-top: 0px;">
                <button type="submit" class="btn custom-modal-btn btn-success" id="btn">Upload</button>
                <button type="button" class="btn custom-modal-btn btn-danger" data-dismiss="modal">Cancel</button>
                
              </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>
<!-- end-third-button -->
<!-- modal -->

<script>
$(document).ready(function(){
  /**/
  colorchanger('red');
  
  /**/
  $("#chekckk").click(function(){
  $("#aaa").toggle();
    // $('#chekckk').css('transform','rotate(180deg)');
    $(this).find("i").toggleClass("fa-angle-down fa-angle-up");
  });
});
</script>
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
        <div id="aaa">
        <div class="modal-body md-body-custom allset">
         
        <form action="{{route('vehicles.store')}}" id="itemform" class="form-horizontal" method="POST" enctype="multipart/form-data">
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
         <textarea id="w3review" name="w3review" rows="4" cols="38">
  </textarea>
         <div class="booking-set">
            <span class="booknow">Lag time (days)</span>
            <span class="booknowa1">Lead time (days)</span>
         </div>
         <div class="book-loan">
            <input type="" name="" class="ref-name">&nbsp&nbsp           
            <input type="" name="" class="loan-name">
         </div>
         <br>
         <span class="loan1">Lead time Notes:</span>
         <textarea id="w3review" name="w3review" rows="4" cols="38">
  </textarea>
         <span class="loan1">Load time Note:</span>
         <textarea id="w3review" name="w3review" rows="4" cols="38">
  </textarea>
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
         <!--  -->
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
         <!--     <h6 class="modal-title md-heading-custom" style="background-color:#ff4e4e;" id="form_heading">Booking Overview</h6> -->


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
         
        <form action="{{route('vehicles.store')}}" id="itemform" class="form-horizontal" method="POST" enctype="multipart/form-data">
            @csrf
          <div class="row">
   <div class="col-md-12 main">
      <div class="col-md-5">
        <div class="main-for-checking">
               
        <div class="for-checking">
          <label>Pickup Form</label><br>
  <label class="switch" for="checkbox">
    <input type="checkbox" id="checkbox" />
    <div class="slider round"></div>
  </label>
        </div>
        <div class="notes">
           <span class="loan1">Notes:</span><br>
         <textarea id="w3review" name="w3review" rows="4" cols="45">
  </textarea>
        </div>
    </div>
      </div>
      <div class="col-md-7">
         <div class="main-for-checking1">

    <div class="container">
      <span>Deliver To</span><br>
  <label class="switch1" for="checkbox1">
    <input type="checkbox" id="checkbox1" />
    <div class="slider1 round1"></div>
  </label>
</div>
        <!--  -->
        <div class="main-address">        
        <div class="address">
          <span class="address1">Address1</span><br>
          <input type="text" name="name" class="address2">
        </div>
        <div class="address">
          <span class="address1">Address2</span><br>
          <input type="text" name="name" class="address2">
        </div>
        </div>
          <div class="main-address">        
        <div class="address">
          <span class="address1">Twon/City</span><br>
          <input type="text" name="name" class="address2">
        </div>
        <div class="address">
          <span class="address1">Country</span><br>
          <input type="text" name="name" class="address2">
        </div>
        </div>
          <div class="main-address">        
        <div class="address">
          <span class="address1">Postcode</span><br>
          <input type="text" name="name" class="address2">
        </div>
        <div class="address">
          <span class="address1">Country</span><br>
          <input type="text" name="name" class="address2">
        </div>
        </div>
         <div class="notes-all">
           <span class="loan11">Notes:</span><br>
         <textarea id="notes1" name="name" rows="4" cols="58">
            </textarea>
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
                             
              </div>
                {!! Form::close() !!}
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
         
        <form action="{{route('vehicles.store')}}" id="itemform" class="form-horizontal" method="POST" enctype="multipart/form-data">
            @csrf
          <div class="row">
   <div class="col-md-12 main">
  
      <div class="col-md-7">

         <div class="main-for-checking11">
            <div class="for-checking11">
        <span>Pickup From</span><br>
       <label class="switcha">
  <input type="checkbox" checked>
  <span class="slidera rounda"></span>
</label>
    
        </div>
        <!--  -->
        <div class="main-address">        
        <div class="address">
          <span class="address1">Address1</span><br>
          <input type="text" name="name" class="address2">
        </div>
        <div class="address">
          <span class="address1">Address2</span><br>
          <input type="text" name="name" class="address2">
        </div>
        </div>
          <div class="main-address">        
        <div class="address">
          <span class="address1">Twon/City</span><br>
          <input type="text" name="name" class="address2">
        </div>
        <div class="address">
          <span class="address1">Country</span><br>
          <input type="text" name="name" class="address2">
        </div>
        </div>
          <div class="main-address">        
        <div class="address">
          <span class="address1">Postcode</span><br>
          <input type="text" name="name" class="address2">
        </div>
        <div class="address">
          <span class="address1">Country</span><br>
          <input type="text" name="name" class="address2">
        </div>
        </div>
         <div class="notes-all">
           <span class="loan11">Notes:</span><br>
         <textarea id="notes1" name="name" rows="4" cols="58">
            </textarea>
        </div>
        </div>
   </div>
       <div class="col-md-5">
        <div class="main-for-checking1">
               
        <div class="for-checking">
            <span>Deliver To</span><br>
       <label class="switcha">
  <input type="checkbox" checked>
  <span class="slidera rounda"></span>
</label>
        </div>

        <div class="notes">
           <span class="loan1">Notes:</span><br>
         <textarea id="w3review" name="w3review" rows="4" cols="45">
  </textarea>
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
                {!! Form::close() !!}
           <!-- end -->
    </div>
    </div>
</div>
<!-- end -->
<script type="text/javascript">
function edititem(id) {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    var filepath = "{{asset('storage')}}";
    $('#itemform').trigger("reset");
    // ajax
    $.ajax({
        type: "POST",
        url: "{{ url('edit-vehicle') }}",
        data: {
            id: id
        },
        dataType: 'json',
        success: function(res) {
            $('#form_heading').html("Configure Vehicle");
            $('#btn').html('Update');
            $('#item_id').val(res.id);
            $.each(res, function(key, value) {
              $('#'+key).val(value);
            });
            
            var specs = res.specs;
            $.each(specs, function(key, value) {
             
              $('#uploaded_spec').append('<option value="'+value.id+'">'+value.file_name+'</option>');
            });
            
            
            var filesrc = filepath+'/'+res.image;
            $('#image-review').html('<img src="'+filesrc+'" style="width:100%;height:100%"/>');
            $('#image-text').html(res.registration_number);
            $('#image-text').css('background-color', res.registration_plate_colour);
            $('#popup_model').modal('show');
            //console.log(res.specs);
//uploaded_spec

       

        }
    });
}

function deleteitem(id) {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    if (confirm("Delete Record?") == true) {


        // ajax
        $.ajax({
            type: "POST",
            url: "{{ url('delete-vehicle') }}",
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

$(document).ready(function($) {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $('#additem').click(function() {

        $('#itemform').trigger("reset");
        $('#form_heading').html("Configure Vehicle");
        $('#btn').html('Submit');
        $('#uploaded_spec').html('');
        $('#image-review').html('');
        $('#image-text').html('');
        $('#image-text').css('background-color','');
        $('#popup_model').modal('show');
    });
       $('#additem1').click(function() {

        $('#itemform').trigger("reset");
        $('#form_heading').html("Configure Vehicle");
        $('#btn').html('Submit');
        $('#uploaded_spec').html('');
        $('#image-review').html('');
        $('#image-text').html('');
        $('#image-text').css('background-color','');
        $('#popup_model1').modal('show');
    });
        $('#additem3').click(function() {

        $('#itemform').trigger("reset");
        $('#form_heading').html("Configure Vehicle");
        $('#btn').html('Submit');
        $('#uploaded_spec').html('');
        $('#image-review').html('');
        $('#image-text').html('');
        $('#image-text').css('background-color','');
        $('#popup_model3').modal('show');
    });
    $('#view_specs').click(function() {
      
      var filepath = "{{asset('storage')}}/";
      var filename = $('#uploaded_spec option:selected').text();
      window.open(filepath+filename, '_blank');

    });
    $('#delete_specs').click(function() {

      if (confirm("Delete Vehicle Spec?") == true) {
        var id = $('#uploaded_spec').val();
          $.ajax({
              type: "POST",
              url: "{{ url('deletespec-vehicle') }}",
              data: {
                  id: id
              },
              dataType: 'json',
              success: function(res) {
                  window.location.reload();
              }
          });
  }
        
    });

    //view_specs



});   
</script>
@endsection