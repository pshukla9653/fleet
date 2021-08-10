@extends('layouts.theme')

@section('heading','Brands')
@section('content')
<div class="row">		
  <div class="col-md-8" style="padding: 30px;">
  <a onclick="location.reload();" class="btn btn-primary"><i class="icon-reload-alt position-left"></i> Refresh @yield('heading')</a>
  @can('brand-create')	
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
     
      
    </div>
    <div class="panel-body">
      <div class="row"> 
      @if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
@endif

          <table class="table table-bordered">
  
    @foreach ($brand as $key => $brands)
    <tr>
      <td style="width: 5%">
        @can('brand-edit')
        <a onclick="edititem({{ $brands->id }})"><i class="icon-pencil7"></i></a>
           
        @endcan
      </td>
        <td>{{ $brands->brand_name }}</td>
         <td>
		<img src="{{asset('upload/'.$brands->file_name)}}" width="100" height="100" style="border-radius:50%"/>
		</td>
          
    <td style="width: 5%">
            
      @can('brand-delete')
        <a onclick="deleteitem({{ $brands->id }})"><i class="icon-trash"></i></a>
      @endcan  
      
       
    </td>
    </tr>
    @endforeach
</table>

<br>
{!! $brand->render() !!}
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
      {!! Form::open(array('route' => 'brands.store','method'=>'POST', 'enctype'=>'multipart/form-data')) !!}
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
          
            <input type="hidden" id="item_id" name="id">
            <div class="form-group"> <strong>{{ __('Brand Name') }}:</strong> {!! Form::text('brand_name', null, array('placeholder' => 'Brand Name','class' => 'form-control', 'id' => 'brand_name')) !!} </div>
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
      <div class="form-group">
        
          <input type="hidden" id="item_id" name="id">
          <div class="form-group"> <strong>{{ __('Brand Logo') }}:</strong>
            <input id="file_name" type="file" class="form-control @error('image') is-invalid @enderror" name="image" value="{{ old('image') }}" required autocomplete="image" >

                                @error('filenames[]')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
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
            type:"POST",
            url: "{{ url('edit-brand') }}",
            data: { id: id },
            dataType: 'json',
            success: function(res){
             $('#form_heading').html("Update Brand");
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
             url: "{{ url('delete-brand') }}",
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
        $('#form_heading').html("Add Brand");
        $('#btn').html('Submit');
        $('#popup_model').modal('show');
     });
  
     
     
     
 });
 </script>
@endsection