@extends('layouts.theme')

@section('heading','BRANDS')
@section('content')
<div class="row">		
  <div class="col-md-8" style="padding: 30px;">
  <a onclick="location.reload();" class="btn btn-primary"><i class="icon-reload-alt position-left"></i> Refresh @yield('heading')</a>
  @can('brand-create')	
  <a href="{{ route('brands.create') }}" class="btn btn-primary"><i class="icon-plus-circle2 position-left"></i> Add New Item</a>
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
            <a class="btn btn-info" href="{{ route('brands.show',$brands->id) }}">Show</a>
            @can('contact-edit')
                <a class="btn btn-primary" href="{{ route('brands.edit',$brands->id) }}">Edit</a>
            @endcan
            @can('contact-delete')
                {!! Form::open(['method' => 'DELETE','route' => ['brands.destroy', $brands->id],'style'=>'display:inline']) !!}
                    {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                {!! Form::close() !!}
            @endcan
        </td>
    </tr>
    @endforeach
</table>


{!! $brand->render() !!}
      </div>
    </div>
  </div>
</div>

@endsection