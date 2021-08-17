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
            <h5 class="panel-title">
                <table width="100%" style="font-size: small; font-weight: 700; text-align: left;">
                    <tr>
                        <td style="width: 15%;">Vehicles Images</td>
                        <td style="width: 9%;">Registration No.</td>
                        <td style="width: 6%;">Brand</td>
                        <td style="width: 8%;">Model</td>
                        <td style="width: 10%;">Derivative</td>
                        <td style="width: 10%;">Region</td>
                        <td style="width: 10%;">Department</td>
                        <td style="width: 8%;">Vin</td>
                        <td style="width: 8%;">Adoption Date</td>
                        <td style="width: 8%;">Projected Defleet Date</td>
                        <td style="width: 4%;">&nbsp;&nbsp;</td>
                    </tr>
                </table>
            </h5>
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
          </div>
          <div class="panel-body" style="padding: 0px 10px 10px 10px;">
            <div class="row">
                @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
                @endif


                <table class="table table-bordered table-responsive">

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
                        <td style="width: 11%; padding: 0px 5px;text-align: center;"><span style="padding: 5px;border-radius: 5px;background-color:{{$vehicle->registration_plate_colour}}">{{$vehicle->registration_number}}</span>
                        
                        <td style="width:6%; padding: 0px 5px;">{{ $vehicle->brand->brand_name }}</td>
                        <td style="width:8%; padding: 0px 5px;">{{ $vehicle->model }}</td>
                        <td style="width:10%; padding: 0px 5px;">{{ $vehicle->derivative }}</td>
                        <td style="width:11%; padding: 0px 5px;">{{ $vehicle->region->region_name }}</td>
                        <td style="width:10%; padding: 0px 5px;">{{ $vehicle->department->department_name }}</td>
                        <td style="width:6%; padding: 0px 5px;">{{ $vehicle->vin }}</td>
                        <td style="width:10%; padding: 0px 5px;">{{ $vehicle->adoption_date }}</td>
                        
                        <td style="width:8%; padding: 0px 5px;">{{ $vehicle->projected_defleet_date }}</td>
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
<div id="popup_model" class="modal fade">
    <div class="modal-dialog modal-full">
      <div class="modal-content" style="background-color: #f2f2f2;">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal"><i class="icon-cancel-circle2"></i></button>
          
        </div>
        <h6 class="modal-title md-heading-custom" id="form_heading"></h6>
        <div class="modal-body md-body-custom">
          <div class="alert alert-danger print-error-msg" style="display:none">
            <ul></ul>
        </div>
        <form action="{{route('vehicles.store')}}" id="itemform" class="form-horizontal" method="POST" enctype="multipart/form-data">
            @csrf
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
                    
                    <input type="file" name="spec_sheet[]" class="form-control custom-modal-textbox" style="padding:10px!important;" multiple/>
                    <div class="text-info">Can be upload multiple files (Only PDF)</div>
                    <div class="text-danger" id="spec_sheet[]"></div>
                  </div>
                </div> 
                <div class="col-md-3">
                  <input type="hidden" id="item_id" name="id">
                    <div class="form-group">
                      <strong>Brand:</strong>
                          <select name="brand_id" class="form-control custom-modal-textbox">
                           
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
                        <select name="region_id" class="form-control custom-modal-textbox">
                           
                            @foreach ($regions as $key=>$region)
                            <option value="{{$region->id}}">{{$region->region_name}}</option>
                            @endforeach
                        </select>  
                      <div class="text-danger" id="region_id"></div>
                    </div>
                            
                            
                    <div class="form-group">
                      <strong>Department:</strong>
                      <select name="department_id" class="form-control custom-modal-textbox">
                        
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
<script type="text/javascript">
function edititem(id) {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    // ajax
    $.ajax({
        type: "POST",
        url: "{{ url('edit-user') }}",
        data: {
            id: id
        },
        dataType: 'json',
        success: function(res) {
            $('#form_heading').html("Update User");
            $('#btn').html('Update');
            $('#item_id').val(res.user.id);
            $('#first_name').val(res.user.first_name);
            $('#last_name').val(res.user.last_name);
            $('#email').val(res.user.email);
            $('#popup_model').modal('show');


        //     var first_name = $("#first_name").val();
        // var last_name = $("#last_name").val();
        // var email = $("#email").val();
        // var password = $("#password").val();
        // var confirmpassword = $("#confirm-password").val();
        // var roles = $("#roles").val();

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
            url: "{{ url('delete-user') }}",
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
        $('#form_heading').html("Add User");
        $('#btn').html('Submit');
        $('#popup_model').modal('show');
    });



});   
</script>
@endsection