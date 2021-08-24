@extends('layouts.theme')

@section('heading','Booking Overview')
<style>
  input[type="date"]::-webkit-calendar-picker-indicator{
    position: absolute;
    margin-left: 72%;
    background-color: #f2f2f2;
    padding: 7px;
    border: 1px solid #bbb8b8;
    border-radius: 2px;
}
.tooltip-inner{
  background-color: #fff!important;
  
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
  <input type="text" placeholder="Search.." name="search">
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
      <div class="col-md-2">
        <div class="form-group">
          <strong>Start Date</strong>
          {!! Form::date('adoption_date', null, array('class' =>
          'form-control custom-modal-textbox', 'id' =>'adoption_date','style' =>'padding:0px!important;')) !!}
          <div class="text-danger" id="adoption_date"></div>
        </div> 
      </div>
      <div class="col-md-2">
        <div class="form-group">
          <strong>Date Range</strong>
              <select name="date_range" id="date_range" style="width:90%;" class="form-control custom-modal-textbox">
                <option value="1">1 weeks</option>
                <option value="2">2 weeks</option>
                <option value="3">3 weeks</option>
                <option value="4">4 weeks</option>
              </select>  
              <div class="text-danger" id="date_range"></div>
        </div>  
      </div>
      <div class="col-md-2">
        <div class="form-group">
          <strong>Brand</strong>
              <select name="brand_id" id="brand_id" style="width:90%;" class="form-control custom-modal-textbox">
               
                @foreach ($brands as $key=>$brand)
                <option value="{{$brand->id}}">{{$brand->brand_name}}</option>
                @endforeach
              </select>  
              <div class="text-danger" id="brand_id"></div>
        </div>  
      </div>
      <div class="col-md-2">
        <div class="form-group">
          <strong>Department</strong>
            <select name="department_id" style="width:90%;" id="department_id" class="form-control custom-modal-textbox">
              
                  @foreach ($departments as $key=>$department)
                  <option value="{{$department->id}}">{{$department->department_name}}</option>
                  @endforeach
            </select>  
        </div>  
      </div>
      <div class="col-md-2">
        <div class="form-group">
          <strong>Region</strong>
            <select name="region_id" style="width:90%;" id="region_id" class="form-control custom-modal-textbox">
                
                @foreach ($regions as $key=>$region)
                <option value="{{$region->id}}">{{$region->region_name}}</option>
                @endforeach
            </select> 
        </div>  
      </div>
      <div class="col-md-2">
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
              @for($i=1; $i< 32; $i++)
                <th style="width:3% !impotant;padding:10px; font-size:8px;font-weight: 600;
                @if($i==3  || $i==4) 
                background-color:#fbf8a0
                @endif
                @if($i==10  || $i==11) 
                background-color:#a9a0fb
                @endif
                @if($i==25  || $i==26) 
                background-color:#efbaba
                @endif
                ;">{{$i}}.07.<br>2021</th>
              @endfor
            </tr>
          </thead>
          <tbody>
            @foreach ($vehicles as $key => $vehicle)
            <tr>
              <td style="width: 7%; font-weight: 600;"><span data-popup="tooltip" title="
                <div style='background-color:#fff;width:800px;height:auto;padding:10px;border: 1px solid #bbb8b8;'>
                  <table cellpadding = '10' cellspacing = '10'>
                    <tr><td colspan='3' style='text-align:center;color:#376473;font-weight:600;'>Vehicle Information</td></tr>
                    <tr>
                      <td style='width:33.33%;padding:10px;'>
                        <table style='width:100%'>
                          <tr><td colspan='2'><img src='{{ asset("storage/".$vehicle->image) }}' alt='{{$vehicle->registration_number}}' style='width: 100%; height:auto;padding:10px;'/></td></tr>
                          <tr><td colspan='2'>&nbsp;</td></tr>
                          <tr><td colspan='2' style='text-align:center;'><span style='font-size:18px;color:black;padding:5px;border-radius: 5px;background-color:{{$vehicle->registration_plate_colour}}'>{{$vehicle->registration_number}}</span></td></tr>
                          <tr><td colspan='2'>&nbsp;</td></tr>
                          <tr><td><b>Brand:</b></td><td> {{ $vehicle->brand->brand_name }}</td></tr>
                          <tr><td><b>Model:</b></td><td> {{ $vehicle->model }}</td></tr>
                          <tr><td><b>Derivative:</b></td><td> {{ $vehicle->derivative }}</td></tr>
                          <tr><td><b>Start Date:</b></td><td>10-Aug-2021</td></tr>
                          <tr><td><b>End Date:</b></td><td>11-Aug-2021</td></tr>
                          <tr><td><b>Primary Contact:</b></td><td>Donato Bilancia</td></tr>
                          
                        </table>
                      </td>
                      <td style='width:33.33%;padding:10px; '>
                        <table style='width:100%'>
                          <tr style='background-color:{{$vehicle->registration_plate_colour}}'><td><b>Start Date:</b></td><td>10-Aug-2021</td></tr>
                          <tr style='background-color:{{$vehicle->registration_plate_colour}}'><td><b>End Date:</b></td><td>11-Aug-2021</td></tr>
                          <tr style='background-color:{{$vehicle->registration_plate_colour}}'><td><b>Primary Contact:</b></td><td>Donato Bilancia</td></tr>
                          <tr><td><b>Department:</b></td><td>{{ $vehicle->department->department_name }}</td></tr>
                          <tr style='background-color:#eeeeee;'><td><b>Registration NO:</b></td><td>{{$vehicle->registration_number}}</td></tr>
                          <tr><td><b>VIN:</b></td><td>{{$vehicle->vin}}</td></tr>
                          <tr style='background-color:#eeeeee;'><td><b>Adoption Date:</b></td><td>{{$vehicle->adoption_date}}</td></tr>
                          <tr><td><b>Projected Defleet Date:</b></td><td>{{$vehicle->projected_defleet_date}}</td></tr>
                        </table>
                      </td>
                      <td style='width:33.33%;padding:10px;'>
                        <table style='width:100%'>
                          
                          <tr style='background-color:#eeeeee;'><td><b>Regions:</b></td><td>{{ $vehicle->region->region_name }}</td></tr>
                          <tr><td><b>Other Details:</b></td><td>{{$vehicle->other_details}}</td></tr>
                          <tr style='background-color:#eeeeee;'><td><b>Lead Time:</b></td><td>{{$vehicle->lead_time}}</td></tr>
                          <tr><td><b>Lag Time:</b></td><td>{{$vehicle->lag_time}}</td></tr>
                          <tr style='background-color:#eeeeee;'><td><b>Engine:</b></td><td>{{$vehicle->engine}}</td></tr>
                          <tr><td><b>Colour:</b></td><td>{{$vehicle->colour}}</td></tr>
                          <tr style='background-color:#eeeeee;'><td><b>Mileage:</b></td><td>{{$vehicle->mileage}}</td></tr>
                          <tr><td><b>Value:</b></td><td>{{$vehicle->value}}</td></tr>
                          <tr style='background-color:#eeeeee;'><td><b>Notes:</b></td><td>{{$vehicle->notes}}</td></tr>
                        </table>
                      </td>
                    </tr>

                  </table>
                </div>
                " data-html="true" data-placement="right" style="padding: 5px;border-radius: 5px;background-color:{{$vehicle->registration_plate_colour}}">{{$vehicle->registration_number}}</span>
              <br>{{$vehicle->vin}}</td>
              @for($i=1; $i< 32; $i++)
                <td style="
                @if($i==3  || $i==4) 
                background-color:#fbf8a0
                @endif
                @if($i==10  || $i==11) 
                background-color:#a9a0fb
                @endif
                @if($i==25  || $i==26) 
                background-color:#efbaba
                @endif
                "></td>
              @endfor
            </tr>
            @endforeach
          </tbody>

        </table>

	
      </div>
    </div>
  </div>
</div>

@endsection
