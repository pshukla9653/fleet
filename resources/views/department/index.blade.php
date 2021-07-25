@extends('layouts.theme')


@section('content')
<div class="page-header page-header-default">
  <div class="page-header-content">
    <div class="page-title">
      <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Home</span> - Department</h4>
    </div>
  </div>
  <div class="breadcrumb-line">
    <ul class="breadcrumb">
      <li><a href="#"><i class="icon-home2 position-left active"></i> Department</a></li>
    </ul>
  </div>
</div>

<div class="content"> 
  
  <!-- Main charts --> 
  <!-- Quick stats boxes --> 
  
  <!-- /quick stats boxes --> 
  <!-- /main charts -->
  <div class="panel panel-flat">
    <div class="panel-heading">
      <h5 class="panel-title"></h5>
      <div class="heading-elements"> </div>
      <div class="pull-right"> 
       @can('department-create')
            <a class="btn btn-success" href="{{ route('departments.create') }}"> Create New Department</a>
            @endcan
       </div>
    </div>
    <div class="panel-body">
      <div class="row"> 
      @if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
@endif

        <fieldset>
          <legend class="text-semibold"> Department List</legend>
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
        </fieldset>
      </div>
    </div>
  </div>
</div>

@endsection