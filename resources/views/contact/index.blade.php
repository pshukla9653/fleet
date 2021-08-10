@extends('layouts.theme')

@section('heading','Contacts')
@section('content')
<div class="row">		
  <div class="col-md-8" style="padding: 30px;">
  <a onclick="location.reload();" class="btn btn-primary"><i class="icon-reload-alt position-left"></i> Refresh @yield('heading')</a>
  @can('contact-create')	
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
  
    @foreach ($contacts as $key => $contact)
    <tr>
        <td style="width: 5%">
          @can('contact-edit')
          <a onclick="edititem({{ $contact->id }})"><i class="icon-pencil7"></i></a>
          @endcan
        </td>
        <td style="width: 90%">{{ $contact->first_name.' '.$contact->last_name }}</td>
       
         
           
        <td style="width: 5%">
           
            
            @can('contact-delete')
            <a onclick="deleteitem({{ $contact->id }})"><i class="icon-trash"></i></a>
            @endcan
        </td>
    </tr>
    @endforeach
</table>


{!! $contacts->render() !!}
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
            <div class="col-md-6">
              <div class="form-group row">
                  <label for="first_name" class="col-md-4 col-form-label text-md-right">{{ __('First Name') }}</label>

                  <div class="col-md-6">
                      <input id="first_name" type="text" class="form-control @error('first_name') is-invalid @enderror" name="first_name" value="{{ old('first_name') }}" required autocomplete="first_name" autofocus>

                      @error('first_name')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                  </div>
              </div>
              <div class="form-group row">
                  <label for="last_name" class="col-md-4 col-form-label text-md-right">{{ __('Last Name') }}</label>

                  <div class="col-md-6">
                      <input id="last_name" type="text" class="form-control @error('last_name') is-invalid @enderror" name="last_name" value="{{ old('last_name') }}" required autocomplete="last_name" >

                      @error('last_name')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                  </div>
              </div>
  
              <div class="form-group row">
                  <label for="job_title" class="col-md-4 col-form-label text-md-right">{{ __('Job Title') }}</label>

                  <div class="col-md-6">
                      <input id="job_title" type="text" class="form-control @error('job_title') is-invalid @enderror" name="job_title" value="{{ old('job_title') }}" required autocomplete="job_title" >

                      @error('job_title')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                  </div>
              </div>
              <div class="form-group row">
                  <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                  <div class="col-md-6">
                      <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                      @error('email')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                  </div>
              </div>
   <div class="form-group row">
                  <label for="phone_number" class="col-md-4 col-form-label text-md-right">{{ __('Phone Number') }}</label>

                  <div class="col-md-6">
                      <input id="phone_number" type="text" class="form-control @error('phone_number') is-invalid @enderror" name="phone_number" value="{{ old('phone_number') }}" required autocomplete="phone_number">

                      @error('phone_number')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                  </div>
              </div>
              

             
</div>
          <div class="col-md-6">
           <div class="form-group row">
                  <label for="address1" class="col-md-4 col-form-label text-md-right">{{ __('Address1') }}</label>

                  <div class="col-md-6">
                      <input id="address1" type="text" class="form-control @error('address1') is-invalid @enderror" name="address1" value="{{ old('address1') }}" required autocomplete="address1" autofocus>

                      @error('address1')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                  </div>
              </div>
              <div class="form-group row">
                  <label for="address2" class="col-md-4 col-form-label text-md-right">{{ __('Address2') }}</label>

                  <div class="col-md-6">
                      <input id="address2" type="text" class="form-control @error('address2') is-invalid @enderror" name="address2" value="{{ old('address2') }}" required autocomplete="address2" autofocus>

                      @error('address2')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                  </div>
              </div>
              <div class="form-group row">
                  <label for="address3" class="col-md-4 col-form-label text-md-right">{{ __('Address3') }}</label>

                  <div class="col-md-6">
                      <input id="address3" type="text" class="form-control @error('address3') is-invalid @enderror" name="address3" value="{{ old('address3') }}" required autocomplete="address3" autofocus>

                      @error('address3')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                  </div>
              </div>
  <div class="form-group row">
                  <label for="city" class="col-md-4 col-form-label text-md-right">{{ __('Town/City') }}</label>

                  <div class="col-md-6">
                      <input id="city" type="text" class="form-control @error('city') is-invalid @enderror" name="city" value="{{ old('city') }}" required autocomplete="city" >

                      @error('city')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                  </div>
              </div>
              <div class="form-group row">
                  <label for="country" class="col-md-4 col-form-label text-md-right">{{ __('Country') }}</label>

                  <div class="col-md-6">
                      <input id="country" type="text" class="form-control @error('country') is-invalid @enderror" name="country" value="{{ old('country') }}" required autocomplete="country">

                      @error('country')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                  </div>
              </div>
<div class="form-group row">
                  <label for="post_code" class="col-md-4 col-form-label text-md-right">{{ __('Post Code') }}</label>

                  <div class="col-md-6">
                      <input id="post_code" type="text" class="form-control @error('post_code') is-invalid @enderror" name="post_code" value="{{ old('post_code') }}" required autocomplete="post_code">

                      @error('post_code')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                  </div>
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
            type:"POST",
            url: "{{ url('edit-contact') }}",
            data: { id: id },
            dataType: 'json',
            success: function(res){
             $('#form_heading').html("Update Contact");
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
             url: "{{ url('delete-contact') }}",
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
        $('#form_heading').html("Add Contact");
        $('#btn').html('Submit');
        $('#popup_model').modal('show');
     });
  
     
     
     $('#btn').click(function () {
           var id           = $("#item_id").val();
           var first_name   = $("#first_name").val();
           var last_name    = $("#last_name").val();
           var job_title    = $("#job_title").val();
           var email        = $("#email").val();
           var phone_number = $("#phone_number").val();
           var address1     = $("#address1").val();
           var address2     = $("#address2").val();
           var address3     = $("#address3").val();
           var city         = $("#city").val();
           var country      = $("#country").val();
           var post_code    = $("#post_code").val();
         
           $("#btn").html('Please Wait...');
           $("#btn"). attr("disabled", true);
           
         // ajax
         $.ajax({
             type:"POST",
             url: "{{ route('contacts.store') }}",
             data: {
               id:id,
               first_name:first_name,
               last_name:last_name,
               job_title:job_title,
               email:email,
               phone_number:phone_number,
               address1:address1,
               address2:address2,
               address3:address3,
               city:city,
               country:country,
               post_code:post_code,
               
             },
             dataType: 'json',
             success: function(res){
              window.location.reload();
             //$("#btn").html('Submit');
             $("#btn"). attr("disabled", false);
            }
         });
     });
 });
 </script>
@endsection