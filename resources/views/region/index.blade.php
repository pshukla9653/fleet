@extends('layouts.theme')

@section('heading','Regions')
@section('content')

<div class="row">		
<div class="col-md-8" style="padding: 30px;">
<a onclick="location.reload();" class="btn btn-primary"><i class="icon-reload-alt position-left"></i> Refresh @yield('heading')</a>
@can('region-create')	
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

<div class="content"> 
  
  <!-- Main charts --> 
  <!-- Quick stats boxes --> 
  
  <!-- /quick stats boxes --> 
  <!-- /main charts -->
  <div class="panel panel-flat">
    <div class="panel-heading">
      <h5 class="panel-title">@yield('heading')</h5>
      <div class="heading-elements">
        </div>
      
    </div>
    <div class="panel-body">
      <div class="row"> 
      @if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
@endif

        
          <table class="table table-bordered">
  
    @foreach ($regions as $key => $region)
    <tr>
      <td style="width: 5%">
        @can('region-edit')
        <a onclick="edititem({{ $region->id }})"><i class="icon-pencil7"></i></a>
           
        @endcan
      </td>
        
        <td style="width: 90%">{{ $region->region_name }}</td>
        <td style="width: 5%">
            
          @can('region-delete')
            <a onclick="deleteitem({{ $region->id }})"><i class="icon-trash"></i></a>
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
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-primary">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h6 class="modal-title" id="form_heading"></h6>
      </div>

      <div class="modal-body">
        <div class="alert alert-danger print-error-msg" style="display:none">
          <ul></ul>
      </div>
        <form action="javascript:void(0)" id="itemform"  class="form-horizontal" method="POST">
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
          
            <input type="hidden" id="item_id" name="id">
            <div class="form-group"> <strong>Region Name:</strong> {!! Form::text('region_name', null, array('placeholder' => 'Region Name','class' => 'form-control', 'id' => 'region_name')) !!} </div>
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
            type:"POST",
            url: "{{ url('edit-region') }}",
            data: { id: id },
            dataType: 'json',
            success: function(res){
             $('#form_heading').html("Update Region");
             $('#btn').html('Update');
              $('#item_id').val(res.id);
              $('#region_name').val(res.region_name);
              $('#popup_model').modal('show');
              
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
     function printErrorMsg (msg) {
            $(".print-error-msg").find("ul").html('');
            $(".print-error-msg").css('display','block');
            $.each( msg, function( key, value ) {
                $(".print-error-msg").find("ul").append('<li>'+value+'</li>');
            });
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
        $('#popup_model').modal('show');
     });
  
     
     
     $('#btn').click(function () {
           var id = $("#item_id").val();
           var region_name = $("#region_name").val();
         
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
              if($.isEmptyObject(res.error)){
              window.location.reload();
             //$("#btn").html('Submit');
             $("#btn"). attr("disabled", false);
              }
              else{
                        printErrorMsg(res.error);
                    }
            }
         });
     });
 });
 </script>
@endsection