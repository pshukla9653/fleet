@extends('layouts.theme')

@section('heading','Lists')
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
    <!-- /main navbar -->
    <div class="row">
        <div class="col-md-8" style="padding: 15px 30px;">
            <a id="additem" class="btn btn-primary"><img src="{{ asset('assets/images/icon/add.png') }}" alt="add"
                                                         style="width: 21px;margin-left: -8px;"/>&nbsp; Add New Item</a>

        </div>
        <div class="col-md-4" style="padding: 15px 30px;">
            <form class="example" action="">
                <input type="text" placeholder="Search" name="search" value="{{ $query ?? "" }}">
                <button type="submit"><img src="{{ asset('assets/images/icon/search.png') }}" alt="search"/></button>
            </form>
        </div>

    </div>

    <div class="content">

        <!-- Main charts -->
        <!-- Quick stats boxes -->

        <!-- /quick stats boxes -->
        <!-- /main charts -->
        <div class="panel panel-flat">
            <div class="panel-heading" style="padding: 0px;">
                <h5 class="panel-title"><span style="margin-left: 12px;">Lists</span></h5>
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
                        <tr>
                            <th style="width: 15%">Lists</th>
                            <th style="width: 15%">Number of Contacts</th>

                            <th style="width: 80%"></th>
                            <th style="width: 4%"></th>
                        </tr>
                        @foreach ($lists as $key => $list)
                            <tr>
                                <td style="width: 15%">

                                    <a onclick="edititem({{ $list->id }})">
                                        <img src="{{ asset('assets/images/icon/edit.png') }}" alt="edit"/>
                                    </a>

                                    &nbsp;
                                    {{ $list->list_name }}
                                </td>
                                <td style="width: 15%"> {{ DB::table('list_contacts')->where('list_id', '=', $list->id)->get()->count() }} </td>

                                <td style="width: 80%"></td>
                                <td style="width: 4%">


                                    <a onclick="deleteitem({{ $list->id }})">
                                        <img src="{{ asset('assets/images/icon/delete.png') }}" alt="delete"/>
                                    </a>


                                </td>
                            </tr>
                        @endforeach
                    </table>

                    <br>
                    {!! $lists->withQueryString()->links() !!}

                </div>
            </div>
        </div>
    </div>

    <style type="text/css">
        .hide-row-div {
            display: none;
        }
    </style>
    <div id="popup_model" class="modal fade" data-backdrop="false">
        <div class="modal-dialog modal-lg">
            <div class="modal-content" style="background-color: #f2f2f2;">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><i class="icon-cancel-circle2"></i>
                    </button>

                </div>
                <h6 class="modal-title md-heading-custom" id="form_heading">Edit List</h6>
                <div class="modal-body md-body-custom">
                    <div class="alert alert-danger print-error-msg" style="display:none">
                        <ul></ul>
                    </div>
                    <div class="row">
                        <div class="col-xs-6 col-sm-6 col-md-6">
                            <div class="form-group" style="margin-bottom: 0px;">
                                <div class="form-group" style="margin-bottom: 0px;"><strong>List Name:</strong>
                                    <input type="text" form="itemform" name="list_name" id="list_name"
                                           placeholder="List" class="form-control custom-modal-textbox">
                                </div>
                                <div class="text-danger"></div>
                            </div>
                        </div>
                        <div class="col-xs-3 col-sm-3 col-md-3">
                            <button type="button" class="btn btn-primary" style="margin-top: 30px;font-size: 10px;"
                                    onclick="getContactList()">Add Existing Contact
                            </button>
                        </div>
                        <div class="col-xs-3 col-sm-3 col-md-3">
                            <a href="{{ route('contacts.index') }}" class="btn btn-primary"
                               style="margin-top: 30px;font-size: 10px;">Add New Contact</a>
                        </div>
                    </div>
                    <div class="row contact-list-row" style="display: none">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <hr>
                            <h4>List of Contacts</h4>
                            <div style="">

                                <table class="table table-bordered table-responsive" id="mytable">
                                    <tr>
                                        <th>Name</th>
                                        <th>Surname</th>
                                        <th>Email</th>
                                        <th>Action</th>
                                    </tr>

                                </table>
                            </div>
                            <button type="button" class="btn btn-primary text-end"
                                    style="margin-top: 30px;font-size: 10px;float: right;" id="add-rows">Add
                            </button>
                        </div>
                    </div>
                    <div class="row" style="">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <h4>Added List of Contact</h4>
                            <form action="javascript:void(0)" id="itemform" class="form-horizontal"
                                  style="padding: 20px 20px;" method="POST">
                                <div style="">
                                    <input type="hidden" id="item_id" name="id">
                                    <table class="table table-bordered table-responsive" id="final-contact">
                                        <tr>
                                            <th>Name</th>
                                            <th>Surname</th>
                                            <th>Email</th>
                                            <th>Action</th>
                                        </tr>
                                    </table>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>

                <div class="modal-footer md-footer-custom">
                    <hr style="margin-top: 0px;">
                    <button type="submit" class="btn custom-modal-btn btn-success" id="btn"></button>
                    <button type="button" class="btn custom-modal-btn btn-danger" data-dismiss="modal">Cancel</button>

                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        $('#add-rows').click(function () {
            $('#mytable').find('tr').each(function () {
                var row = $(this);
                if (row.find('input[type="checkbox"]').is(':checked')) {
                    row.children(".check-box").html('<button type="button" class="btn btn-danger delete" onclick="removethis(this)">Delete</button>');

                    var current_id = row.find('input[type="hidden"]').val();
                    var contact = [];
                    $('#final-contact').find('tr').each(function () {
                        var ids = $(this).find('input[type="hidden"]').val();
                        contact.push(ids);
                    });
                    if (contact.indexOf(current_id) == -1) {
                        $("#final-contact").append(row);
                        row.children(".contact-row").hide();
                    }
                }
            });
            $('.contact-list-row').css('display', 'none');
        });
        $('.delete').click(function () {
            console.log($(this));
            $(this).parents('tr').hide();
        });

        function removethis(_this) {
            //console.log(_this);
            $(_this).parents(".contact-row").remove();
        }

        function getContactList() {
            $.ajax({
                type: "GET",
                url: "{{ url('get-contact-lists') }}",
                data: {},
                success: function (res) {
                    //console.log(res);
                    $('#mytable').html(res);
                    $('.contact-list-row').css('display', 'block');
                }
            });
        }

        function edititem(id) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            // ajax
            $.ajax({
                type: "POST",
                url: "{{ url('edit-lists') }}",
                data: {id: id},
                /*dataType: 'json',*/
                success: function (res) {
                    getListsContact(id);
                    $('#form_heading').html("Edit List");
                    $('#btn').html('Update');
                    $('#item_id').val(res.id);
                    $('#list_name').val(res.list_name);
                    //$("#final-contact").append(row);
                    $('.text-danger').html('');
                    $('#popup_model').modal('show');
                    $("#btn").attr("disabled", false);

                }
            });
        }

        function getListsContact(id) {
            $.ajax({
                type: "POST",
                url: "{{ url('get-lists-contact-list') }}",
                data: {id: id},
                success: function (res) {
                    //console.log(res);
                    $('#final-contact').html(res);
                }
            });
        }

        function deleteContact(_this, id) {
            //console.log(_this);
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
                        $(_this).parents(".contact-row").remove();
                    }
                });
            }

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
                    url: "{{ url('delete-lists') }}",
                    data: {id: id},
                    dataType: 'json',
                    success: function (res) {
                        window.location.reload();
                    }
                });
            }
        }

        $("#itemform").submit(function (event) {
            event.preventDefault();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $("#btn").html('Please Wait...');
            $.ajax({
                type: "POST",
                url: "{{ route('lists.store') }}",
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                dataType: 'json',
                success: function (res) {
                    if (res.success == true) {
                        window.location.reload();
                    } else {
                        $('.text-danger').html(res.error - msg);
                        $("#btn").html(btn);
                        $("#btn").attr("disabled", false);
                    }
                }
            });
        });
        $(document).ready(function ($) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $('#additem').click(function () {

                $('#itemform').trigger("reset");
                $('#form_heading').html("Add List");
                $('#btn').html('Submit');
                $("#btn").attr("disabled", false);
                $('#item_id').val('');
                $('.text-danger').html('');
                $('#final-contact').html('<tr> <th>Name</th> <th>Surname</th> <th>Email</th> <th>Action</th> </tr>');
                $('#mytable').html('');
                $('#popup_model').modal('show');
            });

            $('#btn').click(function (event) {
                $("#itemform").submit();
            });
        });
    </script>
@endsection
