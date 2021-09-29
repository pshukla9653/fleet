@extends('layouts.theme')

@section('heading','Contacts')
@section('content')
    <div class="page-header">
        <div class="page-header-content">
            <div class="page-title" style="margin: 0px 20px;">
                <h6><i class="icon-home2 position-left"></i> <i class="fa fa-angle-double-right"></i> <span
                        style="color: #3a6d7f;">Configure</span> <i
                        class="fa fa-angle-double-right"></i> @yield('heading')</h6>
            </div>


        </div>
    </div>
    <hr style="margin: 0px 20px;">
    <div class="row">
        <div class="col-md-8" style="padding: 15px 30px;">
            @can('contact-create')
                <a id="additem" class="btn btn-primary"><img src="{{ asset('assets/images/icon/add.png') }}" alt="add"
                                                             style="width: 21px;margin-left: -8px;"/>&nbsp; Add New Item</a>
            @endcan
        </div>
        <div class="col-md-4" style="padding: 15px 30px;">
            <form class="example" action="">
                <input type="text" placeholder="Search" name="search" value="{{ $query ?? "" }}">
                <button type="submit"><img src="{{ asset('assets/images/icon/search.png') }}" alt="search"/></button>
            </form>
        </div>
    </div>

    <div class="content">
        <div class="panel panel-flat">
            <div class="panel-heading" style="padding: 0px;">
                <h5 class="panel-title">
                    <table width="100%" style="font-size: small; font-weight: 700; text-align: left; margin: 7px;">
                        <tr>
                            <td style="width: 20%;">Name</td>
                            <td style="width: 25%;">Surname</td>
                            <td style="width: 25%;">Email</td>
                            <td style="width: 25%;">Phone</td>
                            <td style="width: 5%;">&nbsp;&nbsp;</td>
                        </tr>
                    </table>
                </h5>
                <div class="heading-elements">
                </div>
            </div>
            <div class="panel-body" style="padding: 0px 0px 10px 0px;">
                @if ($message = Session::get('success'))
                    <div class="alert alert-success">
                        <p>{{ $message }}</p>
                    </div>
                @endif

                <table class="table table-bordered table-responsive">
                    @foreach ($contacts as $key => $contact)
                        <tr>
                            <td style="width: 20%">
                                @can('contact-edit')
                                    <a onclick="edititem({{ $contact->id }})">
                                        <img src="{{ asset('assets/images/icon/edit.png') }}" alt="edit"/>
                                    </a>
                                @endcan
                                &nbsp;
                                {{$contact->first_name}}
                            </td>
                            <td style="width: 25%">{{ $contact->last_name }}</td>
                            <td style="width: 25%">{{ $contact->email }}</td>
                            <td style="width: 25%">{{ $contact->phone_number }}</td>
                            <td style="width: 5%">
                                @can('contact-delete')
                                    <a onclick="deleteitem({{ $contact->id }})">
                                        <img src="{{ asset('assets/images/icon/delete.png') }}" alt="delete"/>
                                    </a>
                                @endcan
                            </td>
                        </tr>
                    @endforeach
                </table>
                <br>
                {!! $contacts->withQueryString()->links() !!}
            </div>
        </div>
    </div>
    <div id="popup_model" class="modal fade" data-backdrop="false">
        <div class="modal-dialog modal-lg">
            <div class="modal-content" style="background-color: #f2f2f2;">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><i class="icon-cancel-circle2"></i>
                    </button>

                </div>
                <h6 class="modal-title md-heading-custom" id="form_heading"></h6>
                <div class="modal-body md-body-custom">
                    <div class="alert alert-danger print-error-msg" style="display:none">
                        <ul></ul>
                    </div>
                    <form action="javascript:void(0)" id="itemform" class="form-horizontal" method="POST">
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">

                                    <input type="hidden" id="item_id" name="id">
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <input id="first_name" type="text" placeholder="First Name"
                                                   class="form-control custom-modal-textbox @error('first_name') is-invalid @enderror"
                                                   name="first_name" value="{{ old('first_name') }}" autofocus/>
                                            <div class="text-danger" id="error_name"></div>
                                        </div>
                                        <div class="form-group row">

                                            <input id="last_name" type="text" placeholder="Last Name"
                                                   class="form-control custom-modal-textbox @error('last_name') is-invalid @enderror"
                                                   name="last_name" value="{{ old('last_name') }}"/>

                                        </div>

                                        <div class="form-group row">

                                            <input id="job_title" type="text" placeholder="Job Title"
                                                   class="form-control custom-modal-textbox @error('job_title') is-invalid @enderror"
                                                   name="job_title" value="{{ old('job_title') }}"/>
                                            <div class="text-danger" id="error_job"></div>
                                        </div>
                                        <div class="form-group row">

                                            <input id="email" type="email" placeholder="E-Mail Address"
                                                   class="form-control custom-modal-textbox @error('email') is-invalid @enderror"
                                                   name="email" value="{{ old('email') }}"/>
                                            <div class="text-danger" id="error_email"></div>
                                        </div>
                                        <div class="form-group row">

                                            <input id="phone_number" type="text" placeholder="Phone Number"
                                                   class="form-control custom-modal-textbox @error('phone_number') is-invalid @enderror"
                                                   name="phone_number" value="{{ old('phone_number') }}"/>
                                            <div class="text-danger" id="error_phone"></div>
                                        </div>


                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group row">

                                            <input id="address1" type="text" placeholder="Address1"
                                                   class="form-control custom-modal-textbox @error('address1') is-invalid @enderror"
                                                   name="address1" value="{{ old('address1') }}"/>


                                        </div>
                                        <div class="form-group row">

                                            <input id="address2" type="text" placeholder="Address2"
                                                   class="form-control custom-modal-textbox @error('address2') is-invalid @enderror"
                                                   name="address2" value="{{ old('address2') }}"/>

                                        </div>
                                        <div class="form-group row">

                                            <input id="address3" type="text" placeholder="Address3"
                                                   class="form-control custom-modal-textbox @error('address3') is-invalid @enderror"
                                                   name="address3" value="{{ old('address3') }}"/>

                                        </div>
                                        <div class="form-group">

                                            <input id="city" type="text" placeholder="Town/City"
                                                   class="form-control custom-modal-textbox @error('city') is-invalid @enderror"
                                                   name="city" value="{{ old('city') }}"/>

                                        </div>
                                        <div class="form-group">
                                            <input id="country" type="text" placeholder="Country"
                                                   class="form-control custom-modal-textbox @error('country') is-invalid @enderror"
                                                   name="country" value="{{ old('country') }}"/>

                                        </div>
                                        <div class="form-group">
                                            <input id="post_code" type="text" placeholder="Post Code"
                                                   class="form-control custom-modal-textbox @error('post_code') is-invalid @enderror"
                                                   name="post_code" value="{{ old('post_code') }}"/>

                                        </div>

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
                url: "{{ url('edit-contact') }}",
                data: {id: id},
                dataType: 'json',
                success: function (res) {
                    $('#form_heading').html("Edit Contact");
                    $('#btn').html('Update');
                    $('#item_id').val(res.id);
                    $('#first_name').val(res.first_name);
                    $('#last_name').val(res.last_name);
                    $('#job_title').val(res.job_title);
                    $('#email').val(res.email);
                    $('#phone_number').val(res.phone_number);
                    $('#address1').val(res.address1);
                    $('#address2').val(res.address2);
                    $('#address3').val(res.address3);
                    $('#city').val(res.city);
                    $('#country').val(res.country);
                    $('#post_code').val(res.post_code);
                    $('#popup_model').modal('show');

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
                    url: "{{ url('delete-contact') }}",
                    data: {id: id},
                    dataType: 'json',
                    success: function (res) {
                        console.log(res);
                        //window.location.reload();
                    }
                });
            }
        }

        $(document).ready(function ($) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('#additem').click(function () {

                $('#itemform').trigger("reset");
                $('#form_heading').html("Add Contact");
                $('#btn').html('Submit');
                $('#popup_model').modal('show');
            });

            $('#btn').click(function () {
                var id = $("#item_id").val();
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
                    $("#btn").html('Please Wait...');
                    $("#btn").attr("disabled", true);

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
                        success: function (res) {
                            window.location.reload();
                            //$("#btn").html('Submit');
                            $("#btn").attr("disabled", false);
                        }
                    });
                }
            });
        });
    </script>
@endsection
