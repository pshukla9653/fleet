@extends('layouts.theme')

@section('heading','Users')
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
    <a href="{{ route('users.index')}}" class="btn btn-primary"><img src="{{ asset('assets/images/icon/refresh.png') }}" alt="refresh" style="width: 20px;margin-left: -8px;"/>&nbsp;  Refresh @yield('heading')</a>
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
                <table width="100%" style="font-size: small; font-weight: 700; text-align: left; margin: 7px;">
                    <tr>
                        <td style="width: 30%;">Name</td>
                        <td style="width: 20%;">Surname</td>
                        <td style="width: 20%;">Email</td>
                        <td style="width: 20%;">Password</td>
                        <td style="width: 5%;">Role</td>
                        <td style="width: 5%;">&nbsp;&nbsp;</td>
                    </tr>
                </table>
            </h5>
            <div class="heading-elements">
              </div>
            
          </div>
          <div class="panel-body" style="padding: 0px 10px 10px 10px;">
            <div class="row">
                @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
                @endif


                <table class="table table-bordered table-responsive">

                    @foreach ($data as $key => $user)
                    <tr>
                        <td style="width: 30%;">
                            @can('user-edit')
                            <a onclick="edititem({{ $user->id }})">
                                <img src="{{ asset('assets/images/icon/edit.png') }}" alt="edit"/>
                            </a>
                            @endcan
                            &nbsp;
                            {{ $user->first_name }}
                        </td>
                        <td style="width: 20%;padding-left: 20px;">{{$user->last_name}}
                        
                        <td style="width: 20%;padding-left: 20px;">{{ $user->email }}</td>
                        <td style="width: 20%;padding-left: 20px;"><span class="password-visible">********</span><span class="show-password">&nbsp;<i class="fa fa-eye" aria-hidden="true"></i></i></span></td>
                        <td style="width: 5%">
                            @if(!empty($user->getRoleNames()))
                            @foreach($user->getRoleNames() as $v)
                            <label class="badge badge-success">{{ $v }}</label>
                            @endforeach
                            @endif
                        </td>
                        <td style="width: 5%">


                            @can('user-delete')
                            <a onclick="deleteitem({{ $user->id }})">
                                <img src="{{ asset('assets/images/icon/delete.png') }}" alt="delete"/>
                            </a>
                            @endcan
                        </td>
                    </tr>
                    @endforeach
                </table>
                <br>
                {!! $data->render() !!}

            </div>
        </div>
    </div>
</div>
<div id="popup_model" class="modal fade">
    <div class="modal-dialog modal-lg">
      <div class="modal-content" style="background-color: #f2f2f2;">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal"><i class="icon-cancel-circle2"></i></button>
          
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
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>First Name:</strong>
                                        {!! Form::text('first_name', null, array('placeholder' => 'First Name','class'
                                        => 'form-control custom-modal-textbox', 'id' =>'first_name')) !!}
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Last Name:</strong>
                                        {!! Form::text('last_name', null, array('placeholder' => 'Last Name','class' =>
                                        'form-control custom-modal-textbox', 'id' =>'last_name')) !!}
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Email:</strong>
                                        {!! Form::text('email', null, array('placeholder' => 'Email','class' =>
                                        'form-control custom-modal-textbox', 'id' =>'email')) !!}
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Password:</strong>
                                        {!! Form::password('password', array('placeholder' => 'Password','class' =>
                                        'form-control custom-modal-textbox', 'id' =>'password')) !!}
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Confirm Password:</strong>
                                        {!! Form::password('confirm-password', array('placeholder' => 'Confirm Password','class' => 'form-control custom-modal-textbox', 'id' =>'confirm-password')) !!}
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Role:</strong>
                                        {!! Form::select('roles[]', $roles,[], array('class' => 'form-control
                                        select2 custom-modal-textbox','id' =>'roles')) !!}
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



    $('#btn').click(function() {
        var id = $("#item_id").val();
        var first_name = $("#first_name").val();
        var last_name = $("#last_name").val();
        var email = $("#email").val();
        var password = $("#password").val();
        var confirmpassword = $("#confirm-password").val();
        var roles = $("#roles").val();

        $("#btn").html('Please Wait...');
        $("#btn").attr("disabled", true);

        // ajax
        $.ajax({
            type: "POST",
            url: "{{ route('users.store') }}",
            data: {
                id: id,
                first_name: first_name,
                last_name: last_name,
                email: email,
                password: password,
                'confirm-password': confirmpassword,
                roles: roles
            },
            dataType: 'json',
            success: function(res) {
                window.location.reload();
                //$("#btn").html('Submit');
                $("#btn").attr("disabled", false);
            }
        });
    });
});
</script>
@endsection