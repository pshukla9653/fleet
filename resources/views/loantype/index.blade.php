@extends('layouts.theme')

@section('heading','Loan Types')
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
  <a href="{{ route('loantypes.index')}}" class="btn btn-primary"><img src="{{ asset('assets/images/icon/refresh.png') }}" alt="refresh" style="width: 20px;margin-left: -8px;"/>&nbsp; Refresh @yield('heading')</a>
@can('loantype-create')	
<a id="additem" class="btn btn-primary" style="margin-left: 20px;"><img src="{{ asset('assets/images/icon/add.png') }}" alt="add" style="width: 21px;margin-left: -8px;"/>&nbsp; Add New Item</a>
@endcan
</div>
<div class="col-md-4" style="padding: 15px 30px;">
  <form class="example" action="">
    <input type="text" placeholder="Search.." name="search">
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
      <h5 class="panel-title"><span style="margin-left: 12px;">Loan Types</span></h5>
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

        
          <table class="table table-bordered">
           
    @foreach ($loantypes as $key => $loantype)
    <tr>
        <td style="width: 15%">
      @can('loantype-edit')
      <a onclick="edititem({{ $loantype->id }})">
        <img src="{{ asset('assets/images/icon/edit.png') }}" alt="edit"/>
      </a>
      @endcan
      &nbsp;
      {{ $loantype->loan_type }}
        </td>
        <td style="width: 80%"></td>
        <td style="width: 5%">
          @can('loantype-delete')
          <a onclick="deleteitem({{ $loantype->id }})">
            <img src="{{ asset('assets/images/icon/delete.png') }}" alt="delete"/>
          </a>
          @endcan  
                
           
        </td>
    </tr>
    @endforeach
          
</table>

<br>
{!! $loantypes->render() !!}
      
      </div>
    </div>
  </div>
</div>
<div id="popup_model" class="modal fade" data-backdrop="false">
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
        <form action="javascript:void(0)" id="itemform" class="form-horizontal" style="padding: 20px 20px;" method="POST">
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
      <div class="form-group" style="margin-bottom: 0px;">
          
            <input type="hidden" id="item_id" name="id">
            <div class="form-group" style="margin-bottom: 0px;"> <strong>Loan Type:</strong> {!! Form::text('loan_type', null, array('placeholder' => 'Loan Type','class' => 'form-control custom-modal-textbox', 'id' => 'loan_type')) !!} </div>
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
            url: "{{ url('edit-loantype') }}",
            data: { id: id },
            dataType: 'json',
            success: function(res){
             $('#form_heading').html("Edit Loan Type");
             $('#btn').html('Update');
              $('#item_id').val(res.id);
              $('#loan_type').val(res.loan_type);
              $('#popup_model').modal('show');
              $('.text-danger').html('');
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
             url: "{{ url('delete-loantype') }}",
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
        $('#form_heading').html("Add Loan Type");
        $('#btn').html('Submit');
        $("#btn"). attr("disabled", false);
        $('.text-danger').html('');
        $('#item_id').val('');
        $('#popup_model').modal('show');
     });
  
     
     
     $('#btn').click(function () {
           var id = $("#item_id").val();
           var loan_type = $("#loan_type").val();
           if(loan_type ==''){
              $('.text-danger').html('Loan Type Required!');
          }
          else{ 
           $("#btn").html('Please Wait...');
           $("#btn"). attr("disabled", true);
          
         // ajax
         $.ajax({
             type:"POST",
             url: "{{ route('loantypes.store') }}",
             data: {
               id:id,
               loan_type:loan_type,
               
             },
             dataType: 'json',
             success: function(res){
              window.location.reload();
             //$("#btn").html('Submit');
             $("#btn"). attr("disabled", false);
            },
            error: function(xhr, status, error) {
              var err = JSON.parse(xhr.responseText);
              $(".text-danger").html(err.errors.loan_type);
              $("#btn").html('Submit');
              $("#btn"). attr("disabled", false);
            }
         });
        }
     });
  
 });
 </script>

@endsection