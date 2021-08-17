@extends('layouts.theme')

@section('heading','Users')
@section('content')

<div class="row">		
  <div class="col-md-8" style="padding: 30px;">
  <a onclick="location.reload();" class="btn btn-primary"><i class="icon-reload-alt position-left"></i> Refresh @yield('heading')</a>
  <a href="{{ route('users.index') }}" class="btn btn-primary"><i class=" icon-list-unordered position-left"></i> Item List</a>
  </div>
  <div class="col-md-4" style="padding: 30px;">
  <form class="example" action="#">
    <input type="text" placeholder="Search.." name="search">
    <button type="submit"><i class="fa fa-search"></i></button>
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
    <div class="panel-heading">
      <h5 class="panel-title">@yield('heading')</h5>
      <div class="heading-elements"> </div>
      
    </div>
    <div class="panel-body">
      <form action="javascript:void(0)" id="itemform" class="form-horizontal" method="POST" enctype="multipart/form-data">
      <div class="row">
        <div class="col-md-12">
          <div class="col-md-6">
            <div id="image-review" style="height: 220px; border: 1px solid #bbb8b8;
            background-color: #f2f2f2; width:75%; margin:20px 20px 20px 0px;">
            </div>
            <div class="form-group">
              <strong>Upload Image:</strong>
              {!! Form::file('image', null, array('placeholder' => 'Registration No.','class' =>
              'form-control custom-modal-textbox', 'id' =>'image','style'=>'padding:10px!important;')) !!}
              <div class="text-danger" id="image"></div>
            </div>
            <div class="form-group">
              <strong>Other Details:</strong>
              {!! Form::textarea('other_details', null, array('class' =>
              'form-control custom-modal-textbox', 'id' =>'other_details','rows'=>'2','style'=>'width:75%;')) !!}
              <div class="text-danger" id="other_details"></div>
            </div>
            <div class="form-group">
              <strong>Notes:</strong>
              {!! Form::textarea('notes', null, array('class' =>
              'form-control custom-modal-textbox', 'id' =>'notes','rows'=>'2','style'=>'width:75%;')) !!}
              <div class="text-danger" id="notes"></div>
            </div>
            <div class="form-group">
              <strong>Vehicle Spec Sheets:</strong>
              {!! Form::file('spec_sheet[]', null, array('class' =>
              'form-control custom-modal-textbox','style'=>'padding:10px!important;','multiple'=>'multiple')) !!}
              <div class="text-info">Can be upload multiple files (Only PDF)</div>
              <div class="text-danger" id="spec_sheet[]"></div>
            </div>
          </div> 
          <div class="col-md-3">
            <input type="hidden" id="item_id" name="id">
              <div class="form-group">
                <strong>Brand:</strong>
                    <select name="brand_id" class="form-control custom-modal-textbox">
                      <option value=""></option>
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
                  <select name="region_id" class="form-control custom-modal-textbox">
                    <option value=""></option>
                  </select>  
                <div class="text-danger" id="region_id"></div>
              </div>
                      
                      
              <div class="form-group">
                <strong>Department:</strong>
                <select name="department_id" class="form-control custom-modal-textbox">
                  <option value=""></option>
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
                {!! Form::text('loan_cost', null, array('placeholder' => '0.00','class' =>
                'form-control custom-modal-textbox', 'id' =>'loan_cost')) !!}
                <div class="text-danger" id="loan_cost"></div>
              </div>
                        
              <div class="form-group">
                <strong>Registation Plate Colour:</strong>
                {!! Form::color('registration_plate_colour', '#FAF43D', array('placeholder' => '0.00','class' =>
                'form-control custom-modal-textbox', 'id' =>'registration_plate_colour','style' =>'padding:0px!important;width:25%;')) !!}
                <div class="text-danger" id="registration_plate_colour"></div>
              </div>
              <div class="form-group">
                <strong>VIN:</strong>
                {!! Form::text('vin', null, array('placeholder' => 'VIN','class' =>
                'form-control custom-modal-textbox', 'id' =>'vin')) !!}
                <div class="text-danger" id="vin"></div>
              </div>
            </div> 
            <div class="col-md-3">
                <div class="form-group">
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
                    {!! Form::time('lead_time', null, array('class' =>
                    'form-control custom-modal-textbox', 'id' =>'lead_time')) !!}
                    <div class="text-danger" id="lead_time"></div>
                </div>
                <div class="form-group">
                  <strong>Lag Time:</strong>
                  {!! Form::time('lag_time', null, array('class' =>
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
                  {!! Form::text('mileage', null, array('placeholder' => 'Mileage','class' =>
                  'form-control custom-modal-textbox', 'id' =>'mileage')) !!}
                  <div class="text-danger" id="mileage"></div>
                </div>
                <div class="form-group">
                  <strong>Value:</strong>
                  {!! Form::text('value', null, array('placeholder' => 'Value','class' =>
                  'form-control custom-modal-textbox', 'id' =>'value')) !!}
                  <div class="text-danger" id="value"></div>
                </div>
                <div class="form-group">
                  <strong>Order No.:</strong>
                  {!! Form::text('order_number', null, array('placeholder' => 'Order No','class' =>
                  'form-control custom-modal-textbox', 'id' =>'order_number')) !!}
                  <div class="text-danger" id="order_number"></div>
                </div>
              </div> 
            </div> 
        
         
            
            </div>
  
  {!! Form::close() !!}
       
   

 
      </div>
    </div>
  </div>

@endsection