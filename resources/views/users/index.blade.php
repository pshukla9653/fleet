@extends('layouts.theme')

@section('heading','Users')
@section('content')

<div class="row">
    <div class="col-md-8" style="padding: 30px;">
        <a onclick="location.reload();" class="btn btn-primary"><i class="icon-reload-alt position-left"></i> Refresh
            @yield('heading')</a>
        @can('user-create')
        <a id="additem" class="btn btn-primary"><i class="icon-plus-circle2 position-left"></i> Add New Item</a>
        @endcan
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
            <div class="heading-elements"></div>

        </div>
        <div class="panel-body">
            <div class="row">
                @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
                @endif


                <table class="table table-bordered">

                    @foreach ($data as $key => $user)
                    <tr>
                        <td>
                            @can('user-edit')
                            <a onclick="edititem({{ $user->id }})"><i class="icon-pencil7"></i></a>
                            @endcan
                        </td>
                        <td>{{ $user->first_name.' '.$user->last_name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>
                            @if(!empty($user->getRoleNames()))
                            @foreach($user->getRoleNames() as $v)
                            <label class="badge badge-success">{{ $v }}</label>
                            @endforeach
                            @endif
                        </td>
                        <td>


                            @can('user-delete')
                            <a onclick="deleteitem({{ $user->id }})"><i class="icon-trash"></i></a>
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
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h6 class="modal-title" id="form_heading"></h6>
            </div>

            <div class="modal-body">
                <form action="javascript:void(0)" id="itemform" class="form-horizontal" method="POST">
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">

                                <input type="hidden" id="item_id" name="id">
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>First Name:</strong>
                                        {!! Form::text('first_name', null, array('placeholder' => 'First Name','class'
                                        => 'form-control', 'id' =>'first_name')) !!}
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Last Name:</strong>
                                        {!! Form::text('last_name', null, array('placeholder' => 'Last Name','class' =>
                                        'form-control', 'id' =>'last_name')) !!}
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Email:</strong>
                                        {!! Form::text('email', null, array('placeholder' => 'Email','class' =>
                                        'form-control', 'id' =>'email')) !!}
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Password:</strong>
                                        {!! Form::password('password', array('placeholder' => 'Password','class' =>
                                        'form-control', 'id' =>'password')) !!}
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Confirm Password:</strong>
                                        {!! Form::password('confirm-password', array('placeholder' => 'Confirm
                                        Password','class' => 'form-control', 'id' =>'confirm-password')) !!}
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Role:</strong>
                                        {!! Form::select('roles[]', $roles,[], array('class' => 'form-control
                                        select2','id' =>'roles')) !!}
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" id="btn"></button>
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