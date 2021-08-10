@extends('layouts.theme')

@section('heading','Loan Types')
@section('content')

<div class="row">		
<div class="col-md-8" style="padding: 30px;">
<a onclick="location.reload();" class="btn btn-primary"><i class="icon-reload-alt position-left"></i> Refresh @yield('heading')</a>
@can('loantype-create')	
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
           
    @foreach ($loantypes as $key => $loantype)
    <tr>
        <td style="width: 5%">
      @can('loantype-edit')
      <a onclick="edititem({{ $loantype->id }})"><i class="icon-pencil7"></i></a>
         
      @endcan
        </td>
        <td style="width: 90%">{{ $loantype->loan_type }}</td>
        <td style="width: 5%">
          @can('loantype-delete')
          <a onclick="deleteitem({{ $loantype->id }})"><i class="icon-trash"></i></a>
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
            <div class="form-group"> <strong>Loan Type Name:</strong> {!! Form::text('loan_type', null, array('placeholder' => 'Loan Type Name','class' => 'form-control', 'id' => 'loan_type')) !!} </div>
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
            url: "{{ url('edit-loantype') }}",
            data: { id: id },
            dataType: 'json',
            success: function(res){
             $('#form_heading').html("Update Loan Type");
             $('#btn').html('Update');
              $('#item_id').val(res.id);
              $('#loan_type').val(res.loan_type);
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
        $('#popup_model').modal('show');
     });
  
     
     
     $('#btn').click(function () {
           var id = $("#item_id").val();
           var loan_type = $("#loan_type").val();
         
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
            }
         });
     });
 });
 </script>

@endsection