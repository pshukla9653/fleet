@extends('layouts.theme')


@section('content')
<div class="page-header page-header-default">
  <div class="page-header-content">
    <div class="page-title">
      <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Home</span> - Region</h4>
    </div>
  </div>
  <div class="breadcrumb-line">
    <ul class="breadcrumb">
      <li><a href="#"><i class="icon-home2 position-left active"></i> Region</a></li>
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
      <div class="heading-elements"><div class="pull-right"> 
       @can('region-create')
            <a class="btn btn-success" href="{{ route('regions.create') }}"> Create New Region</a>
            @endcan
       </div> </div>
      
    </div>
    <div class="panel-body">
      <div class="row"> 
      @if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
@endif

        <fieldset>
          <legend class="text-semibold"> Region List</legend>
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
        </fieldset>
      </div>
    </div>
  </div>
</div>

@endsection