@extends('layouts.theme')

@section('heading','Loan Types')
@section('content')

<div class="row">		
<div class="col-md-8" style="padding: 30px;">
<a onclick="location.reload();" class="btn btn-primary"><i class="icon-reload-alt position-left"></i> Refresh @yield('heading')</a>
@can('loantype-create')	
<a href="{{ route('loantypes.create') }}" class="btn btn-primary"><i class="icon-plus-circle2 position-left"></i> Add New Item</a>
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
          <a href="{{ route('loantypes.edit',$loantype->id) }}"><i class="icon-pencil7"></i></a>
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
<script>
  function deleterow(){
    var x = confirm("Are you sure you want to delete?");
  if (x)
  $('#delete-form').submit()
  else
    return false;
  }
</script>
@endsection