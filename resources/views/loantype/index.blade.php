@extends('layouts.theme')

@section('heading','Loan Types')
@section('content')

<div class="row">		
<div class="col-md-8" style="padding: 30px;">
<a onclick="location.reload();" class="btn btn-primary"><i class="icon-reload-alt position-left"></i> Refresh @yield('heading')</a>
@can('loantype-create')	
<a data-toggle="modal" data-target="#create_model" class="btn btn-primary"><i class="icon-plus-circle2 position-left"></i> Add New Item</a>
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
          <a onclick="editloantype('{{$loantype->id}}', '{{ $loantype->loan_type}}');"><i class="icon-pencil7"></i></a>
         
      @endcan
        </td>
        <td style="width: 90%">{{ $loantype->loan_type }}</td>
        <td style="width: 5%">
          @can('loantype-delete')
            <a onclick="deleterow();"><i class="icon-trash"></i></a>
          @endcan  
           
                {!! Form::open(['method' => 'DELETE','route' => ['loantypes.destroy', $loantype->id],'style'=>'display:inline','id'=>"delete-form"]) !!}
                    
                {!! Form::close() !!}
                
           
        </td>
    </tr>
    @endforeach
          
</table>


{!! $loantypes->render() !!}
      
      </div>
    </div>
  </div>
</div>
<div id="update_model" class="modal fade">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-primary">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h6 class="modal-title">Edit @yield('heading')</h6>
      </div>

      <div class="modal-body">
        {!! Form::model($loantype, ['method' => 'PATCH','route' => ['loantypes.update', $loantype->id]]) !!}
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Loan Type:</strong>
            <input type="hidden" id="loantype_id" name="id">
            {!! Form::text('loan_type', null, array('placeholder' => 'Loan Type','class' => 'form-control','id' => 'loan_type')) !!}
        </div>
    </div>
  
</div>

      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Update</button>
      </div>
{!! Form::close() !!}      
    </div>
  </div>
</div>
<div id="create_model" class="modal fade">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-primary">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h6 class="modal-title">Add @yield('heading')</h6>
      </div>

      <div class="modal-body">
        {!! Form::open(array('route' => 'loantypes.store','method'=>'POST')) !!}
        <div class="row">
          <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group"> <strong>Loan Type:</strong> {!! Form::text('loan_type', null, array('placeholder' => 'Loan Type','class' => 'form-control')) !!} </div>
          </div>
          
          
        </div>
       
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
{!! Form::close() !!}      
    </div>
  </div>
</div>
<script>
  function deleterow(){
    var x = confirm("Are you sure you want to delete?");
  if (x)
  $('#delete-form').submit()
  else
    return false;
  }
  function editloantype(id, loantype)
{
         $('#loantype_id').val(id);
         $('#loan_type').val(loantype);
         $("#update_model").modal('toggle');

}

            
     

</script>

@endsection