@extends('layouts.theme')

@section('heading','REGIONS')
@section('content')

<div class="row">		
<div class="col-md-8" style="padding: 30px;">
<a onclick="location.reload();" class="btn btn-primary"><i class="icon-reload-alt position-left"></i> Refresh @yield('heading')</a>
@can('region-create')	
<a href="{{ route('regions.create') }}" class="btn btn-primary"><i class="icon-plus-circle2 position-left"></i> Add New Item</a>
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
  <tr>
     <th>No</th>
     <th>Region Name</th>
     <th width="280px">Action</th>
  </tr>
    @foreach ($regions as $key => $region)
    <tr>
        <td>{{ ++$i }}</td>
        <td>{{ $region->region_name }}</td>
        <td>
            <a class="btn btn-info" href="{{ route('regions.show',$region->id) }}">Show</a>
            @can('region-edit')
                <a class="btn btn-primary" href="{{ route('regions.edit',$region->id) }}">Edit</a>
            @endcan
            @can('region-delete')
                {!! Form::open(['method' => 'DELETE','route' => ['regions.destroy', $region->id],'style'=>'display:inline']) !!}
                    {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                {!! Form::close() !!}
            @endcan
        </td>
    </tr>
    @endforeach
</table>


{!! $regions->render() !!}
      
      </div>
    </div>
  </div>
</div>

@endsection