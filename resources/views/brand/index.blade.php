@extends('layouts.theme')


@section('content')
<div class="page-header page-header-default">
  <div class="page-header-content">
    <div class="page-title">
      <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Home</span> -Brand</h4>
    </div>
  </div>
  <div class="breadcrumb-line">
    <ul class="breadcrumb">
      <li><a href="#"><i class="icon-home2 position-left active"></i>Brand</a></li>
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
       @can('contact-create')
            <a class="btn btn-success" href="{{ route('brand.create') }}"> Create New Brand</a>
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
          <legend class="text-semibold"> Brand List</legend>
          <table class="table table-bordered">
  <tr>
     <th>No</th>
     <th>Brand Name</th>
     <th>Brand Logo</th>
     
     
     <th width="280px">Action</th>
  </tr>
    @foreach ($brand as $key => $brands)
    <tr>
        <td>{{ ++$i }}</td>
        <td>{{ $brands->brand_name }}</td>
         <td>
		<img src="{{asset('upload/'.$brands->file_name)}}" width="100" height="100" style="border-radius:50%"/>
		</td>
          
        <td>
            <a class="btn btn-info" href="{{ route('brand.show',$brands->id) }}">Show</a>
            @can('contact-edit')
                <a class="btn btn-primary" href="{{ route('brand.edit',$brands->id) }}">Edit</a>
            @endcan
            @can('contact-delete')
                {!! Form::open(['method' => 'DELETE','route' => ['brand.destroy', $brands->id],'style'=>'display:inline']) !!}
                    {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                {!! Form::close() !!}
            @endcan
        </td>
    </tr>
    @endforeach
</table>


{!! $brand->render() !!}
        </fieldset>
      </div>
    </div>
  </div>
</div>

@endsection