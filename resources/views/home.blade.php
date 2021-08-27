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
<div class="col-md-8" style="padding: 30px;">
  <select class="form-control border-0" style="background: transparent;width:6%;">
    <option>Filter</option>
 </select>

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
      <div class="col-md-2" style="width: 28.56%">
        <form action="#" id="search_form">
        <div class="form-group" style="margin-bottom: -10px;">
          <strong>Start Date</strong>
          
          <input type="date" onchange="submit();" value="{{$start_date}}" id="start_date" class="form-control custom-modal-textbox" style="padding:0px!important;width:150px;" name="start_date"/>
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
          
              <select name="date_range" id="date_range" onchange="submit();" style="padding:5px;" class="form-control custom-modal-textbox">
               
                <option value="1" {{($date_range=='1')?'selected':''}}>1 weeks</option>
                <option value="2" {{($date_range=='2')?'selected':''}}>2 weeks</option>
                <option value="3" {{($date_range=='3')?'selected':''}}>3 weeks</option>
                <option value="4" {{($date_range=='4')?'selected':''}}>4 weeks</option>
              </select>  
              
            </form> 
        </div>  
      </div>
      <div class="col-md-2" style="width: 14.28%">
        <div class="form-group">
          <strong>Brand</strong>
          <form action="#">
              <select name="brand_id" id="brand_id" onchange="submit();" style="padding:5px;" class="form-control custom-modal-textbox">
                <option value="">All Brands</option>
                @foreach ($brands as $key=>$brand)
                <option value="{{$brand->id}}">{{$brand->brand_name}}</option>
                @endforeach
              </select>  
          </form> 
        </div>  
      </div>
      <div class="col-md-2" style="width: 14.28%">
        <div class="form-group">
          <strong>Department</strong>
          <form action="#">
            <select name="department_id" style="padding:5px;" onchange="submit();" id="department_id" class="form-control custom-modal-textbox">
                <option value="">All Departments</option>
                  @foreach ($departments as $key=>$department)
                  <option value="{{$department->id}}">{{$department->department_name}}</option>
                  @endforeach
            </select> 
          </form> 
        </div>  
      </div>
      <div class="col-md-2" style="width: 14.28%">
        <div class="form-group">
          <strong>Region</strong>
          <form action="#">
            <select name="region_id" style="padding:5px;" onchange="submit();" id="region_id" class="form-control custom-modal-textbox">
              <option value="">All Regions</option>
                @foreach ($regions as $key=>$region)
                <option value="{{$region->id}}">{{$region->region_name}}</option>
                @endforeach
            </select> 
          </form>
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
 </script>  
@endsection
