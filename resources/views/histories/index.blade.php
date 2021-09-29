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
    </div>
    <div class="col-md-4" style="padding: 15px 30px;">
    <form class="example" action="">
      <input type="text" placeholder="Search" name="search" value="{{ $query ?? "" }}">
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
                  <thead>
                  <tr>
                    <th style="border-top: none;padding: 10px;font-weight: 600;text-align: center;">Date and Time</th>
                    <th  style="width: 15%; border-top: none;font-weight: 600;text-align: left;">User</th>
                    <th style="border-top: none;font-weight: 600;text-align: left;" colspan="2">Action</th>



                </tr>
                  </thead>
                    @foreach ($histories as $key => $history)
                    <tr>
                        <td style="width: 15%; padding: 0px 5px;">
                            {{date('d M Y H:i:s', strtotime($history->created_at))}}

                        </td>

                        <td style="text-align: left;">{{$history->user_id}}</td>
                        <td style="text-align: left;">{{$history->event}} Booking</td>


                        <td style="width: 5%">


                            @can('vehicle-delete')
                            <a onclick="deleteitem({{ $history->id }})">
                                <img src="{{ asset('assets/images/icon/delete.png') }}" alt="delete"/>
                            </a>
                            @endcan
                        </td>
                    </tr>
                    @endforeach
                </table>
                <br>
                {!! $histories->withQueryString()->links() !!}

            </div>
        </div>
    </div>
</div>


<script type="text/javascript">


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
            url: "{{ url('delete-history') }}",
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

</script>
@endsection
