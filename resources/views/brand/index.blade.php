@extends('layouts.theme')

@section('heading','Brands')
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
    <a href="{{ route('brands.index')}}" class="btn btn-primary"><img src="{{ asset('assets/images/icon/refresh.png') }}" alt="refresh" style="width: 20px;margin-left: -8px;"/>&nbsp;  Refresh @yield('heading')</a>
    @can('brand-create')	
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
      <h5 class="panel-title">Brand</h5>
      <div class="heading-elements">
        </div>
      
    </div>
    @if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
    @endif
    @error('brand_name')
    <div class="alert alert-danger">
         <strong>{{ $message }}</strong>
        </div>
    @enderror
    @error('image')
    <div class="alert alert-danger">
         <strong>{{ $message }}</strong>
        </div>
    @enderror
    <div class="panel-body" style="padding: 0px 10px 10px 10px;">
      <div class="row"> 
    

          <table class="table table-bordered">
  
    @foreach ($brand as $key => $brands)
    <tr>
      <td style="width: 15%">
        @can('brand-edit')
        <a onclick="edititem({{ $brands->id }});">
          <img src="{{ asset('assets/images/icon/edit.png') }}" alt="delete"/>
        </a>
        @endcan
        &nbsp;
        {{ $brands->brand_name }}
      </td>
        
      <td style="width: 80%">
		<img src="{{asset('storage/'.$brands->file_name)}}" width="50" height="50" style="border-radius:50%"/>
		</td>
          
    <td style="width: 5%">
            
      @can('brand-delete')
        <a onclick="deleteitem({{ $brands->id }})">
          <img src="{{ asset('assets/images/icon/delete.png') }}" alt="delete"/>
        </a>
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
      {!! Form::open(array('route' => 'brands.store','method'=>'POST', 'enctype'=>'multipart/form-data','id'=>'itemform')) !!}
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
          
          <input type="hidden" id="item_id" name="id">
            <div class="form-group"> <strong>{{ __('Brand Name') }}:</strong> {!! Form::text('brand_name', null, array('placeholder' => 'Brand Name','class' => 'form-control custom-modal-textbox', 'id' => 'brand_name')) !!} </div>
            <div class="text-danger" id="error_name"></div>
          </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
      <div class="form-group">
        
         
          <div class="form-group"> <strong>{{ __('Brand Logo') }}:</strong>
            <input type="file" class="form-control @error('image') is-invalid @enderror" name="image" value="{{ old('image') }}" autocomplete="image" id="image" >

                                @error('filenames[]')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                              </div>
      </div>
  </div>
  <div id="img-review" style="padding: 10px;"></div>
  
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
        var filepath = "{{asset('storage')}}";
     $.ajax({
            type:"POST",
            url: "{{ url('edit-brand') }}",
            data: { id: id },
            dataType: 'json',
            success: function(res){
             $('#form_heading').html("Edit Brand");
             $('#btn').html('Update');
              $('#item_id').val(res.id);
              $('#brand_name').val(res.brand_name);
              var filesrc = filepath+'/'+res.file_name;
              $('#popup_model').modal('show');
              $('#image').removeAttr('required','required');
              $('#img-review').html('<img src="'+filesrc+'" width="50" height="50"/>');
             
              
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
        $('#brand_name').val();
        $('#btn').html('Submit');
        $('#image').removeAttr('required','required');
        $('#image').attr('required','required');
        $('#img-review').html('');
        $('#item_id').val('');
        $('#popup_model').modal('show');
     });
  
     
     
     
 });
 </script>
@endsection