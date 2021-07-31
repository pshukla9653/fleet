@extends('layouts.theme')

@section('heading','REGIONS')
@section('content')
<div class="row">		
  <div class="col-md-8" style="padding: 30px;">
  <a onclick="location.reload();" class="btn btn-primary"><i class="icon-reload-alt position-left"></i> Refresh @yield('heading')</a>
  <a href="{{ route('regions.index') }}" class="btn btn-primary"><i class=" icon-list-unordered position-left"></i> Item List</a>
  </div>
  <div class="col-md-4" style="padding: 30px;">
  <form class="example" action="#">
    <input type="text" placeholder="Search.." name="search">
    <button type="submit"><i class="fa fa-search"></i></button>
    </form>		
  </div>
  
  </div>	
<!-- /page header --> 

<!-- Content area -->
<div class="content"> 
  
  <!-- Main charts --> 
  <!-- Quick stats boxes --> 
  
  <!-- /quick stats boxes --> 
  <!-- /main charts -->
  <div class="panel panel-flat">
    <div class="panel-heading">
      <h5 class="panel-title">@yield('heading')</h5>
      <div class="heading-elements"> </div>
      
    </div>
    <div class="panel-body">
      <div class="row"> @if (count($errors) > 0)
        <div class="alert alert-danger"> <strong>Whoops!</strong> There were some problems with your input.<br>
          <br>
          <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
        @endif
       
          {!! Form::open(array('route' => 'regions.store','method'=>'POST')) !!}
          <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
              <div class="form-group"> <strong>Region Name:</strong> {!! Form::text('region_name', null, array('placeholder' => 'Region Name','class' => 'form-control')) !!} </div>
            </div>
            
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
          </div>
          {!! Form::close() !!}
      
      </div>
    </div>
  </div>
</div>
@endsection