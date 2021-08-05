@extends('layouts.theme')
@section('heading','Departments')
@section('content')
<div class="row">		
  <div class="col-md-8" style="padding: 30px;">
  <a onclick="location.reload();" class="btn btn-primary"><i class="icon-reload-alt position-left"></i> Refresh @yield('heading')</a>
  @can('department-create')	
  <a href="{{ route('departments.create') }}" class="btn btn-primary"><i class="icon-plus-circle2 position-left"></i> Add New Item</a>
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
      <div class="heading-elements"> </div>
      
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
     <th>Department Name</th>
     <th width="280px">Action</th>
  </tr>
    @foreach ($departments as $key => $department)
    <tr>
        <td>{{ ++$i }}</td>
        <td>{{ $department->department_name }}</td>
        <td>
            <a class="btn btn-info" href="{{ route('departments.show',$department->id) }}">Show</a>
            @can('department-edit')
                <a class="btn btn-primary" href="{{ route('departments.edit',$department->id) }}">Edit</a>
            @endcan
            @can('department-delete')
                {!! Form::open(['method' => 'DELETE','route' => ['departments.destroy', $department->id],'style'=>'display:inline']) !!}
                    {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                {!! Form::close() !!}
            @endcan
        </td>
    </tr>
    @endforeach
</table>


{!! $departments->render() !!}
      </div>
    </div>
  </div>
</div>

@endsection