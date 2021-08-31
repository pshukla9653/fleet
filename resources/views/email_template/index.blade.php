@extends('layouts.theme')

@section('heading', 'Email Templates')
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
            <a href="{{ route('email-template.index') }}" class="btn btn-primary"><img
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
                                <th style="width: 5%;  border: none;padding: 10px;font-weight: 600;text-align: center;">
                                    Desciption</th>
                                <th style="width: 5%; border: none;padding: 10px;font-weight: 600;text-align: center;">
                                    Subject</th>
                                <th style="width: 5%; border: none;padding: 10px;font-weight: 600;text-align: center;">
                                    Status</th>
                                <th style="width: 5%; border: none;padding: 10px;font-weight: 600;text-align: center;">
                                    Reminders</th>
                                <th style="width: 18%; border: none;padding: 10px;font-weight: 600;text-align: center;">
                                </th>
                                <th style="width: 3%; border: none;padding: 10px;font-weight: 600;text-align: center;"></th>


                            </tr>
                        </thead>
                        @foreach ($emailTemplate as $key => $email)
                            <tr>
                                <td style="padding: 0px 5px;">
                                    @can('vehicle-edit')
                                        <a onclick="edititem({{ $email->id }})">
                                            <img src="{{ asset('assets/images/icon/edit.png') }}" alt="edit" />
                                        </a>
                                    @endcan
                                    &nbsp;
                                    {{ $email->description }}
                                </td>

                                <td style="text-align: center;">{{ $email->subject }}</td>
                                <td style="text-align: center;">{{ $email->status == '1' ? 'Active' : 'Inactive' }}</td>
                                <td style="text-align: center;"></td>

                                <td style="text-align: right;">



                                    <a onclick="edititem({{ $email->id }})">
                                        <i class="icon-eye" style="color: #b1b1b1;"></i>
                                    </a>

                                </td>
                                <td>


                                    @can('vehicle-delete')
                                        <a onclick="deleteitem({{ $email->id }})">
                                            <img src="{{ asset('assets/images/icon/delete.png') }}" alt="delete" />
                                        </a>
                                    @endcan
                                </td>
                            </tr>
                        @endforeach
                    </table>
                    <br>
                    {!! $emailTemplate->render() !!}

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

        .tooltip-inner {
            background-color: #fff;
            color: #000;

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

                    <form action="{{ route('email-template.store') }}" id="itemform" class="form-horizontal"
                        method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="col-md-7">
                                    <div class="col-md-6" style="margin-top: 10px;">
                                        <div class="form-group">
                                            <strong>Description:</strong>
                                            {!! Form::text('description', null, ['placeholder' => 'Description', 'class' => 'form-control custom-modal-textbox', 'id' => 'description']) !!}

                                        </div>
                                        <div class="form-group">
                                            <strong>From Name:</strong>
                                            {!! Form::text('from_name', null, ['placeholder' => 'From Name', 'class' => 'form-control custom-modal-textbox', 'id' => 'from_name']) !!}

                                        </div>
                                        <div class="form-group">
                                            <strong>From Email:</strong>
                                            {!! Form::text('from_email', null, ['placeholder' => 'From Email', 'class' => 'form-control custom-modal-textbox', 'id' => 'from_email']) !!}

                                        </div>
                                        <div class="form-group">
                                            <strong>CC Email:</strong>
                                            {!! Form::text('cc_email', null, ['placeholder' => 'CC Email', 'class' => 'form-control custom-modal-textbox', 'id' => 'cc_email']) !!}

                                        </div>
                                        <div class="form-group">
                                            <strong>Status:</strong><br>
                                            <input type="radio" name="status" id="status_active" value="1" />Active
                                            <input type="radio" name="status" id="status_inactive" value="0" />Inactive
                                        </div>
                                    </div>
                                    <div class="col-md-6" style="margin-top: 10px;">
                                        <div class="form-group">
                                            <strong>Subject:</strong>
                                            {!! Form::text('subject', null, ['placeholder' => 'Subject', 'class' => 'form-control custom-modal-textbox', 'id' => 'subject']) !!}

                                        </div>
                                        <div class="form-group">
                                            <strong>Reply To Email:</strong>
                                            {!! Form::text('reply_to_email', null, ['placeholder' => 'Reply To Email', 'class' => 'form-control custom-modal-textbox', 'id' => 'reply_to_email']) !!}

                                        </div>
                                        <div class="form-group">
                                            <strong>To Email:</strong>
                                            {!! Form::text('to_email', null, ['placeholder' => 'To Email', 'class' => 'form-control custom-modal-textbox', 'id' => 'to_email']) !!}

                                        </div>
                                        <div class="form-group">
                                            <strong>BCC Email:</strong>
                                            {!! Form::text('bcc_email', null, ['placeholder' => 'BCC Email', 'class' => 'form-control custom-modal-textbox', 'id' => 'bcc_email']) !!}

                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <div><strong>Email Body:</strong><span style="padding-left: 68%;"
                                                    data-popup="tooltip" title="%%FirstName%% = First name of contact<br> 
                                %%LastName%% = Last name of contact<br>
                                %%BookingData%% = Booking Date<br>
                                %%InboundAdd%% = Inblund Address<br>
                                %%OutboundAdd%% = Outbound Address<br>
                                %%PlateNumber%% = Vehicle Plate Number<br>
                                %%VehicleModel%% = Vehicle Model<br>
                                %%VehicleBrand%% = Vehicle Brand" data-html="true">&quest;</span></div>
                                            {!! Form::textarea('email_body', null, ['class' => 'form-control custom-modal-textbox', 'id' => 'email_body', 'rows' => '5', 'style' => 'margin-bottom: 0px;width:85%;']) !!}

                                            <div class="form-group"
                                                style="text-align:right;width:82%;margin-top:5px;margin-left:15px;font-size: 12px !important;">
                                                <button type="button" id="insert_design" class="btn custom-modal-btn"
                                                    style="background-color: #486288;color:#fff;"><i
                                                        class="icon-pencil3"></i> Design</button>
                                                <button type="button" id="insert_html"
                                                    class="btn custom-modal-btn btn-warning">&lt;&sol;&gt;&nbsp;
                                                    HTML</button>
                                                <button type="button" id="preview_body"
                                                    class="btn custom-modal-btn bg-blue-800"><i class="icon-eye"></i>
                                                    Preview</button>
                                            </div>

                                        </div>
                                    </div>



                                </div>
                                <div class="col-md-5" style="margin-top: 10px;">
                                    <input type="hidden" id="item_id" name="id">
                                    <strong>Attachment:</strong>
                                    <select size="4" style="border: 1px solid #bbb8b8;
                          background-color: #f2f2f2; width:100%; margin:5px 20px 20px 0px; padding:5px;"
                                        id="uploaded_spec">
                                    </select>
                                    <div class="form-group"
                                        style="text-align:right;margin-top: -16px;margin-right: 0px;">
                                        <button type="button" id="view_specs" class="btn custom-modal-btn"
                                            style="background-color: #486288;color:#fff;">View</button>
                                        <button type="button" id="delete_specs"
                                            class="btn custom-modal-btn btn-warning">Delete</button>
                                    </div>
                                    <div class="form-group">

                                        <div style="text-align:right;width: 96%;">

                                            <div class="upload-btn-wrapper">
                                                <button class="btnsss">Upload </button>
                                                <input type="file" name="spec_sheet[]" multiple>
                                            </div>
                                        </div>


                                    </div>
                                    <div class="form-group">
                                        <input type="checkbox" name="is_spec" id="is_spec" value='1' /> Include Vehicle spec sheets?
                                    </div>


                                </div>
                            </div>

                        </div>

                        <div class="modal-footer md-footer-custom">
                            <hr style="margin-top: 0px;">
                            <button type="submit" class="btn custom-modal-btn btn-success" id="btn"></button>
                            <button type="button" class="btn custom-modal-btn btn-danger"
                                data-dismiss="modal">Cancel</button>

                        </div>
                        {!! Form::close() !!}
                </div>
            </div>
        </div>

        // Full feature editor modal
        <div id="popup_model_editor" class="modal fade second_model">
            <div class="modal-dialog modal-lg">
                <div class="modal-content" style="background-color: #f2f2f2;">
                    <div class="modal-header">
                        <button type="button" class="close" onclick="$('#popup_model_editor').modal('hide')"><i
                                class="icon-cancel-circle2"></i></button>

                    </div>
                    <h6 class="modal-title md-heading-custom" id="form_heading"></h6>
                    <div class="modal-body md-body-custom">

                        <div class="row">
                            <div class="col-md-12">
                                {!! Form::textarea('editor_area', null, ['class' => 'form-control custom-modal-textbox', 'id' => 'editor_area', 'rows' => '5', 'style' => 'margin-bottom: 0px;width:85%;']) !!}
                            </div>

                        </div>

                        <div class="modal-footer md-footer-custom">
                            <hr style="margin-top: 0px;">
                            <button type="button" class="btn custom-modal-btn btn-success"
                                id="insert_from_editor">Insert</button>
                            <button type="button" class="btn custom-modal-btn btn-danger"
                                onclick="$('#popup_model_editor').modal('hide')">Cancel</button>

                        </div>

                    </div>
                </div>
            </div>

            <script type="text/javascript">
                $(function() {

                    // Full featured editor
                    CKEDITOR.replace('editor_area', {
                        height: '200px',
                        extraPlugins: 'forms'
                    });
                });

                function edititem(id) {
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    var filepath = "{{ asset('storage') }}";
                    $('#itemform').trigger("reset");
                    $('#uploaded_spec').empty();
                    // ajax

                    $.ajax({
                        type: "POST",
                        url: "{{ url('edit-email-template') }}",
                        data: {
                            id: id
                        },
                        dataType: 'json',
                        success: function(res) {

                            $('#form_heading').html("Configure Email Template");
                            $('#btn').html('Update');
                            $('#item_id').val(res.id);
                            $.each(res, function(key, value) {
                                if(key !='is_spec'){
                                $('#' + key).val(value);
                                }
                            });
                            if (res.status == '1') {
                                $('#status_active').prop("checked", true);
                            } else {
                                $('#status_inactive').prop("checked", true);
                            }
                           
                            if(res.is_spec =='1'){
                                $('#is_spec').prop("checked", true);
                            }
                            
                            var specs = res.specs;
                            $.each(specs, function(key, value) {

                                $('#uploaded_spec').append('<option value="' + value.id + '">' + value
                                    .file_name + '</option>');
                            });
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
                            url: "{{ url('delete-email-template') }}",
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
                        $('#form_heading').html("Configure Email Template");
                        $('#btn').html('Submit');
                        $('#uploaded_spec').html('');
                        $('#popup_model').modal('show');
                    });
                    $('#view_specs').click(function() {

                        var filepath = "{{ asset('storage') }}/";
                        var filename = $('#uploaded_spec option:selected').text();

                        window.open(filepath + filename, '_blank');

                    });
                    $('#delete_specs').click(function() {

                        if (confirm("Delete file Record?") == true) {

                            var id = $('#item_id').val();
                            // ajax
                            $.ajax({
                                type: "POST",
                                url: "{{ url('deletefile-email-template') }}",
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

                    //view_specs insert_design
                    $('#insert_design').click(function() {
                        var data = $('#email_body').val();

                        CKEDITOR.instances['editor_area'].setData(data);
                        $('#popup_model_editor').modal('show');


                        //$('#editor_area').val('some text');

                    });
                    $('#insert_html').click(function() {
                        var data = $('#email_body').val();
                        
                         
                        CKEDITOR.instances['editor_area'].setData(data);
                        $('#popup_model_editor').modal('show');


                        //$('#editor_area').val('some text');

                    });
                    $('#preview_body').click(function() {
                        var data = $('#email_body').val();

                        CKEDITOR.instances['editor_area'].setData(data);
                        $('#popup_model_editor').modal('show');


                        //$('#editor_area').val('some text');

                    });
                    $('#insert_from_editor').click(function() {
                        var data = CKEDITOR.instances['editor_area'].getData();

                       console.log(data);
                        $('#email_body').val(data);
                        $('#popup_model_editor').modal('hide');


                    });

//insert_from_editor
                });
            </script>
        @endsection
