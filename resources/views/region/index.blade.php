@extends('layouts.theme')

@section('heading','Regions')
@section('content')
<div class="page-header">
	<div class="page-header-content">
	  <div class="page-title" style="margin: 0px 20px;">
		<h6><i class="icon-home2 position-left"></i> <i class="fa fa-angle-double-right"></i> <span style="color: #3a6d7f;">Configure</span> <i class="fa fa-angle-double-right"></i> @yield('heading')</h6>
	  </div>
  
	  
	</div>
	</div>
  <hr style="margin: 0px 20px;">
<!-- /main navbar -->
<div class="row">		
<div class="col-md-8" style="padding: 15px 30px;">
<a href="{{ route('regions.index')}}" class="btn btn-primary"><img src="{{ asset('assets/images/icon/refresh.png') }}" alt="refresh" style="width: 20px;margin-left: -8px;"/>&nbsp;  Refresh @yield('heading')</a>
@can('region-create')	
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

<div class="content"> 
  
  <!-- Main charts --> 
  <!-- Quick stats boxes --> 
  
  <!-- /quick stats boxes --> 
  <!-- /main charts -->
  <div class="panel panel-flat">
    <div class="panel-heading" style="padding: 0px;">
      <h5 class="panel-title"><span style="margin-left: 12px;">Region</span></h5>
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
  
    @foreach ($regions as $key => $region)
    <tr>
      <td style="width: 15%">
        @can('region-edit')
        <a onclick="edititem({{ $region->id }})">
          <img src="{{ asset('assets/images/icon/edit.png') }}" alt="edit"/>
        </a>
        @endcan
        &nbsp;
        {{ $region->region_name }}
      </td>
        
        <td style="width: 80%"></td>
        <td style="width: 4%">
            
          @can('region-delete')
            <a onclick="deleteitem({{ $region->id }})">
              <img src="{{ asset('assets/images/icon/delete.png') }}" alt="delete"/>
            </a>
          @endcan  
          
           
        </td>
    </tr>
    @endforeach
</table>

<br>
{!! $regions->render() !!}
      
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
        <form action="javascript:void(0)" id="itemform"  class="form-horizontal" style="padding: 20px 20px;" method="POST">
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group" style="margin-bottom: 0px;">
          
            <input type="hidden" id="item_id" name="id">
            <div class="form-group" style="margin-bottom: 0px;"> <strong>Region:</strong> {!! Form::text('region_name', null, array('placeholder' => 'Region','class' => 'form-control custom-modal-textbox', 'id' => 'region_name')) !!} </div>
            <div class="text-danger"></div>
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
            type:"POST",
            url: "{{ url('edit-region') }}",
            data: { id: id },
            dataType: 'json',
            success: function(res){
             $('#form_heading').html("Edit Region");
             $('#btn').html('Update');
              $('#item_id').val(res.id);
              $('#region_name').val(res.region_name);
              $('.text-danger').html('');
              $('#popup_model').modal('show');
              $("#btn"). attr("disabled", false);
              
           }
        });
    }
   function deleteitem(id){
    $.ajaxSetup({
         headers: {
         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
         }
     });
        
        if (confirm("Delete Record?") == true) {
         
          
         // ajax
         $.ajax({
             type:"POST",
             url: "{{ url('delete-region') }}",
             data: { id: id },
             dataType: 'json',
             success: function(res){
               window.location.reload();
            }
         });
        }
     }
       
  $(document).ready(function($){
     $.ajaxSetup({
         headers: {
         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
         }
     });
     $('#additem').click(function () {
       
        $('#itemform').trigger("reset");
        $('#form_heading').html("Add Region");
        $('#btn').html('Submit');
        $("#btn"). attr("disabled", false);
        $('#item_id').val('');
        $('.text-danger').html('');
        $('#popup_model').modal('show');
     });
  
     
     
     $('#btn').click(function () {
           var id = $("#item_id").val();
           var region_name = $("#region_name").val();
           var btn = $('#btn').html();
          if(region_name ==''){
              $('.text-danger').html('Region Required!');
          }
          else{        
           $("#btn").html('Please Wait...');
           $("#btn"). attr("disabled", true);
          
         // ajax
         $.ajax({
             type:"POST",
             url: "{{ route('regions.store') }}",
             data: {
               id:id,
               region_name:region_name,
               
             },
             dataType: 'json',
             success: function(res){
              if(res.success == true){
              window.location.reload();
            }
            else{
              $('.text-danger').html(res.error-msg);
              $("#btn").html(btn);
              $("#btn"). attr("disabled", false);
            } 
            },
            error: function(xhr, status, error) {
              var err = JSON.parse(xhr.responseText);
              $(".text-danger").html(err.errors.region_name);
              $("#btn").html('Submit');
              $("#btn"). attr("disabled", false);
            }
         });
          }
     });
 });
 </script>
@endsection