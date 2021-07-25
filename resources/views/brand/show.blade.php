@extends('layouts.theme')


@section('content')
<div class="page-header page-header-default">
  <div class="page-header-content">
    <div class="page-title">
      <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Home</span> - Brand</h4>
    </div>
  </div>
  <div class="breadcrumb-line">
    <ul class="breadcrumb">
      <li><a href="#"><i class="icon-home2 position-left active"></i>Brand</a></li>
    </ul>
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
      <h5 class="panel-title"></h5>
      <div class="heading-elements"> </div>
      <div class="pull-right"> <a class="btn btn-primary" href="{{ route('brand.index') }}"> Back</a> </div>
    </div>
    <div class="panel-body">
      <div class="row"> 
      @if (count($errors) > 0)
        <div class="alert alert-danger"> <strong>Whoops!</strong> There were some problems with your input.<br>
          <br>
          <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
      @endif
        <fieldset>
          <legend class="text-semibold"> Show Brand</legend>
          <div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Brand Name:</strong>
            {{ $brand->brand_name }}
        </div>
         <div class="form-group">
            <strong>Brand Logo:</strong>&nbsp;&nbsp;&nbsp;&nbsp;
		
		<img src="{{asset('upload/'.$brand->file_name)}}" width="100" height="100" />
		
            
        </div>
         
</div>
        </fieldset>
      </div>
    </div>
  </div>
</div>




@endsection