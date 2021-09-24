@extends('layouts.theme')

@section('heading-pre', 'Configure ')
@section('heading', 'Vehicles')
@section('content')
    <div class="page-header">
        <div class="page-header-content">
            <div class="page-title" style="margin: 0px 20px;">
                <h6><i class="icon-home2 position-left"></i> <i class="fa fa-angle-double-right"></i> <span
                        style="color: #3a6d7f;">Configure</span> <i class="fa fa-angle-double-right"></i> @yield('heading')
                </h6>
            </div>

        </div>
    </div>
    <hr style="margin: 0px 20px;">
    <div class="row">
        <div class="col-md-8" style="padding: 15px 30px;">
            <a href="{{ route('vehicles.index') }}" class="btn btn-primary"><img
                    src="{{ asset('assets/images/icon/refresh.png') }}" alt="refresh"
                    style="width: 20px;margin-left: -8px;" />&nbsp; Refresh @yield('heading')</a>
            @can('user-create')
                <a id="additem" class="btn btn-primary" style="margin-left: 20px;"><img
                        src="{{ asset('assets/images/icon/add.png') }}" alt="add"
                        style="width: 21px;margin-left: -8px;" />&nbsp; Add New Item</a>
            @endcan
        </div>
        <div class="col-md-4" style="padding: 15px 30px;">
            <form class="example" action="">
                <input type="text" placeholder="Search" name="search">
                <button type="submit"><img src="{{ asset('assets/images/icon/search.png') }}" alt="search" /></button>
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
                                <th style="border-top: none;padding: 10px;font-weight: 600;text-align: center;">Vehicles
                                    Images</th>
                                <th style="border-top: none;padding: 10px;font-weight: 600;text-align: center;">Registration
                                    No.</th>
                                <th style="border-top: none;padding: 10px;font-weight: 600;text-align: center;">Brand</th>
                                <th style="border-top: none;padding: 10px;font-weight: 600;text-align: center;">Model</th>
                                <th style="border-top: none;padding: 10px;font-weight: 600;text-align: center;">Derivative
                                </th>
                                <th style="border-top: none;padding: 10px;font-weight: 600;text-align: center;">Region</th>
                                <th style="border-top: none;padding: 10px;font-weight: 600;text-align: center;">Department
                                </th>
                                <th style="border-top: none;padding: 10px;font-weight: 600;text-align: center;">Vin</th>
                                <th style="border-top: none;padding: 10px;font-weight: 600;text-align: center;">Adoption
                                    Date</th>
                                <th style="border-top: none;padding: 0px 0px 0px 10px;font-weight: 600;" colspan="2">
                                    Projected Defleet Date</th>

                            </tr>
                        </thead>
                        @foreach ($vehicles as $key => $vehicle)
                            <tr>
                                <td style="width: 15%; padding: 0px 5px;">
                                    @can('vehicle-edit')
                                        <a onclick="edititem({{ $vehicle->id }})">
                                            <img src="{{ asset('assets/images/icon/edit.png') }}" alt="edit" />
                                        </a>
                                    @endcan
                                    &nbsp;
                                    <img src="{{ asset('storage/' . $vehicle->image) }}"
                                        alt="{{ $vehicle->registration_number }}" style="width: 100px; height:auto;" />
                                </td>
                                <td style="text-align: center;"><span
                                        style="padding: 5px;border-radius: 5px;background-color:{{ $vehicle->registration_plate_colour }}">{{ $vehicle->registration_number }}</span>

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
                                            <img src="{{ asset('assets/images/icon/delete.png') }}" alt="delete" />
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

        input[type="date"]::-webkit-calendar-picker-indicator {
            position: absolute;
            margin-left: 72%;
            background-color: #f2f2f2;
            padding: 7px;
            border: 1px solid #bbb8b8;
            border-radius: 2px;
        }

    </style>
    <div id="popup_model" class="modal fade">
        <div class="modal-dialog modal-lg">
            <div class="modal-content" style="background-color: #f2f2f2;">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><i
                            class="icon-cancel-circle2"></i></button>

                </div>
                <h6 class="modal-title md-heading-custom" id="form_heading"></h6>
                <div class="modal-body md-body-custom">

                    <form action="{{ route('vehicles.store') }}" id="itemform" class="form-horizontal" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="col-md-6">
                                    <div id="image-text"
                                        style="position: relative;bottom: -140px;left: 15px;width: fit-content;padding: 5px;border-radius: 5px;">
                                    </div>
                                    <div id="image-review" style="height: 130px; border: 1px solid #bbb8b8;
                      background-color: #f2f2f2; width:80%; margin:20px 20px 0px 0px;">

                                    </div>

                                    <div class="form-group">
                                        <div style="text-align: right; width: 78%;">
                                            <div class="upload-btn-wrapper" style="margin-top: 4px;margin-right: -3px;">
                                                <button class="btnsss">Upload Image</button>
                                                <input type="file" name="image" id="vehicle_img" onchange="loadFile(event)"
                                                    style="width: 111px;height: 10px;" required>
                                            </div>
                                            <button type="button" id="remove_img"
                                                style="margin-left: 5px; margin-top: -15px;"
                                                class="btn custom-modal-btn btn-danger">Remove</button>
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
                                        {!! Form::textarea('other_details', null, ['class' => 'form-control custom-modal-textbox', 'id' => 'other_details', 'rows' => '2', 'style' => 'margin-bottom: 0px;margin-left: 10px !important;width:77%;']) !!}
                                        <div class="text-danger" id="other_details"></div>
                                    </div>
                                    <div class="form-group">
                                        <strong style="padding: 0px 0px 0px 10px;">Notes:</strong>
                                        {!! Form::textarea('notes', null, ['class' => 'form-control custom-modal-textbox', 'id' => 'notes', 'rows' => '2', 'style' => 'margin-bottom: 0px;margin-left: 10px!important;width:77%;']) !!}
                                        <div class="text-danger" id="notes"></div>
                                    </div>
                                    <strong>Vehicle Spec Sheets:</strong>
                                    <select name="sp" size="4" style="border: 1px solid #bbb8b8;
                      background-color: #f2f2f2; width:80%; margin:20px 20px 20px 0px; padding:5px;" id="uploaded_spec">
                                    </select>
                                    <div class="form-group" style="text-align:right;width:82%;">
                                        <button type="button" id="view_specs"
                                            class="btn custom-modal-btn btn-info">View</button>
                                        <button type="button" id="delete_specs"
                                            class="btn custom-modal-btn btn-danger">Delete</button>
                                    </div>
                                    <div class="form-group">

                                        <div style="text-align:right;width: 79%;margin-top:10px;">

                                            <div class="upload-btn-wrapper">
                                                <button class="btnsss">Upload </button>
                                                <input type="file" name="spec_sheet[]" id="spec_sheet"
                                                    onchange="get_file_name(this.files);" multiple>
                                            </div>
                                        </div>
                                        <div class="text-info">Can be upload multiple files (Only PDF)</div>
                                        <div class="text-danger"></div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <input type="hidden" id="item_id" name="id">
                                    <div class="form-group" style="margin-top: 15px;">
                                        <strong>Brand:</strong>
                                        <select name="brand_id" id="brand_id" class="form-control custom-modal-textbox"
                                            required>
                                            <option value="" selected>Select</option>
                                            @foreach ($brands as $key => $brand)
                                                <option value="{{ $brand->id }}">{{ $brand->brand_name }}</option>
                                            @endforeach
                                        </select>
                                        <div class="text-danger" id="brand_id"></div>
                                    </div>

                                    <div class="form-group">
                                        <strong>Model:</strong>
                                        {!! Form::text('model', null, ['placeholder' => 'Model', 'class' => 'form-control custom-modal-textbox', 'id' => 'model', 'required' => 'required']) !!}
                                        <div class="text-danger" id="model"></div>
                                    </div>


                                    <div class="form-group">
                                        <strong>Derivative:</strong>
                                        {!! Form::text('derivative', null, ['placeholder' => 'Derivative', 'class' => 'form-control custom-modal-textbox', 'id' => 'derivative', 'required' => 'required']) !!}
                                        <div class="text-danger" id="derivative"></div>
                                    </div>

                                    <div class="form-group">
                                        <strong>Region:</strong>
                                        <select name="region_id" id="region_id" class="form-control custom-modal-textbox"
                                            required>
                                            <option value="" selected>Select</option>
                                            @foreach ($regions as $key => $region)
                                                <option value="{{ $region->id }}">{{ $region->region_name }}</option>
                                            @endforeach
                                        </select>
                                        <div class="text-danger" id="region_id"></div>
                                    </div>


                                    <div class="form-group">
                                        <strong>Department:</strong>
                                        <select name="department_id" id="department_id"
                                            class="form-control custom-modal-textbox" required>
                                            <option value="" selected>Select</option>
                                            @foreach ($departments as $key => $department)
                                                <option value="{{ $department->id }}">{{ $department->department_name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        <div class="text-danger" id="department_id"></div>
                                    </div>
                                    <div class="form-group">
                                        <strong>Registration Number:</strong>
                                        {!! Form::text('registration_number', null, ['placeholder' => 'Registration No.', 'class' => 'form-control custom-modal-textbox', 'id' => 'registration_number', 'required' => 'required']) !!}
                                        <div class="text-danger" id="registration_number"></div>
                                    </div>

                                    <div class="form-group">
                                        <strong>Loan Cost:</strong>
                                        {!! Form::number('loan_cost', null, ['placeholder' => '0.00', 'class' => 'form-control custom-modal-textbox', 'id' => 'loan_cost', 'required' => 'required']) !!}
                                        <div class="text-danger" id="loan_cost"></div>
                                    </div>

                                    <div class="form-group">
                                        <strong>Registation Plate Colour:</strong>
                                        {!! Form::color('registration_plate_colour', '#FAF43D', ['placeholder' => '0.00', 'class' => 'form-control custom-modal-textbox', 'id' => 'registration_plate_colour', 'style' => 'padding:0px!important;width:25%;']) !!}
                                        <div class="text-danger" id="registration_plate_colour"></div>
                                    </div>
                                    <div class="form-group">
                                        <strong>VIN:</strong>
                                        {!! Form::text('vin', null, ['placeholder' => 'VIN', 'class' => 'form-control custom-modal-textbox', 'id' => 'vin', 'required' => 'required']) !!}
                                        <div class="text-danger" id="vin"></div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group" style="margin-top: 15px;">
                                        <strong>Adoption Date:</strong>
                                        <div id="start_date_picker" class="input-group date">
                                            <input type="text" name="adoption_date" placeholder="yyyy-mm-dd"
                                                class="form-control custom-modal-textbox" style="width: 116px;"
                                                id="adoption_date" required />
                                            <span class="input-group-addon" style="float: right;">
                                                <img src="{{ asset('assets/images/icon/calendar.png') }}" alt="icon"
                                                    style="width: 17px;margin-left: -14px;margin-top: 6px;" />
                                            </span>
                                        </div>
                                        <div class="text-danger" id="adoption_date"></div>
                                    </div>

                                    <div class="form-group">
                                        <strong>Projected Defleet Date:</strong>

                                        <div id="end_date_picker" class="input-group date">
                                            <input type="text" name="projected_defleet_date" placeholder="yyyy-mm-dd"
                                                class="form-control custom-modal-textbox" style="width: 116px;"
                                                id="projected_defleet_date" required />
                                            <span class="input-group-addon" style="float: right;">
                                                <img src="{{ asset('assets/images/icon/calendar.png') }}" alt="icon"
                                                    style="width: 17px;margin-left: -14px;margin-top: 6px;" />
                                            </span>
                                        </div>
                                        <div class="text-danger" id="projected_defleet_date"></div>
                                    </div>
                                    <div class="form-group">
                                        <strong>Lead Time:</strong>
                                        {!! Form::text('lead_time', 0, ['class' => 'form-control custom-modal-textbox', 'id' => 'lead_time', 'required' => 'required']) !!}
                                        <div class="text-danger" id="lead_time"></div>
                                    </div>
                                    <div class="form-group">
                                        <strong>Lag Time:</strong>
                                        {!! Form::text('lag_time', 0, ['class' => 'form-control custom-modal-textbox', 'id' => 'lag_time', 'required' => 'required']) !!}
                                        <div class="text-danger" id="lag_time"></div>
                                    </div>

                                    <div class="form-group">
                                        <strong>Engine:</strong>
                                        {!! Form::text('engine', null, ['placeholder' => 'Engine', 'class' => 'form-control custom-modal-textbox', 'id' => 'engine']) !!}
                                        <div class="text-danger" id="engine"></div>
                                    </div>
                                    <div class="form-group">
                                        <strong>Colour:</strong>
                                        {!! Form::text('colour', null, ['placeholder' => 'Colour', 'class' => 'form-control custom-modal-textbox', 'id' => 'colour']) !!}
                                        <div class="text-danger" id="colour"></div>
                                    </div>
                                    <div class="form-group">
                                        <strong>Mileage:</strong>
                                        {!! Form::number('mileage', null, ['placeholder' => 'Mileage', 'class' => 'form-control custom-modal-textbox', 'id' => 'mileage']) !!}
                                        <div class="text-danger" id="mileage"></div>
                                    </div>
                                    <div class="form-group">
                                        <strong>Value:</strong>
                                        {!! Form::number('value', null, ['placeholder' => 'Value', 'class' => 'form-control custom-modal-textbox', 'id' => 'value', 'required' => 'required']) !!}
                                        <div class="text-danger" id="value"></div>
                                    </div>
                                    <div class="form-group">
                                        <strong>Order No.:</strong>
                                        {!! Form::number('order_number', null, ['placeholder' => 'Order No', 'class' => 'form-control custom-modal-textbox', 'id' => 'order_number']) !!}
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
            var filepath = "{{ asset('storage') }}";
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
                    $('#vehicle_img').removeAttr('required', 'required');
                    $.each(res, function(key, value) {
                        $('#' + key).val(value);
                        if (key == 'adoption_date') {
                            $('#start_date_picker.date').datepicker("update", value);
                        }
                        if (key == 'projected_defleet_date') {
                            $('#end_date_picker.date').datepicker("update", value);
                        }
                    });

                    var specs = res.specs;
                    $.each(specs, function(key, value) {

                        $('#uploaded_spec').append('<option value="' + value.id + '">' + value
                            .file_name + '</option>');
                    });


                    var filesrc = filepath + '/' + res.image;
                    $('#image-review').html('<img src="' + filesrc + '" style="width:100%;height:100%"/>');
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
                $('#image-text').css('background-color', '');
                $('#popup_model').modal('show');
            });
            $('#view_specs').click(function() {

                var filepath = "{{ asset('storage') }}/";
                var filename = $('#uploaded_spec option:selected').text();
                window.open(filepath + filename, '_blank');

            });
            $('#delete_specs').click(function() {

                if (confirm("Delete Vehicle Spec?") == true) {
                    var id = $('#uploaded_spec').val();
                    if(id ==''){
                      $('#uploaded_spec option:selected').remove();
                    }
                    else{
                    $.ajax({
                        type: "POST",
                        url: "{{ url('deletespec-vehicle') }}",
                        data: {
                            id: id
                        },
                        dataType: 'json',
                        success: function(res) {
                            alert('Vehicle Spec deleted successfully!');
                            $('#uploaded_spec option:selected').remove();
                        }
                    });
                }
              }

            });

            //remove_img
            $('#remove_img').click(function() {

                if (confirm("Remove Vehicle Image?") == true) {
                    var id = $('#item_id').val();

                    $.ajax({
                        type: "POST",
                        url: "{{ url('remove-img-vehicle') }}",
                        data: {
                            id: id
                        },
                        dataType: 'json',
                        success: function(res) {
                            $('#image-review').html('');
                            $('#vehicle_img').attr('required', 'required');
                        }
                    });
                }

            });

            $('#start_date_picker.date').datepicker({
                format: "yyyy-mm-dd",
                daysOfWeekHighlighted: "0",
                autoclose: true
            });
            $('#end_date_picker.date').datepicker({
                format: "yyyy-mm-dd",
                daysOfWeekHighlighted: "0",
                autoclose: true
            });

        });

        function get_file_name(files) {

            for (var i = 0; i < files.length; i++) {
                filename = files[i].name;

                $('#uploaded_spec').append(new Option(filename, ''));
            }
        }
    </script>
@endsection
