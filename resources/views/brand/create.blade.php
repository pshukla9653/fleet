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
      <div class="pull-right"> <a class="btn btn-primary" href="{{ route('roles.index') }}"> Back</a> </div>
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
        <fieldset>
          <legend class="text-semibold"> Add Brand</legend>
          {!! Form::open(array('route' => 'brand.store','method'=>'POST', 'enctype'=>'multipart/form-data')) !!}
          <div class="row">
					<div class="col-md-6">
                        <div class="form-group row">
                            <label for="first_name" class="col-md-4 col-form-label text-md-right">{{ __('Brand Name') }}</label>

                            <div class="col-md-6">
                                <input id="brand_name" type="text" class="form-control @error('brand_name') is-invalid @enderror" name="brand_name" value="{{ old('brand_name') }}" required autocomplete="brand_name" autofocus>

                                @error('brand_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="file_name" class="col-md-4 col-form-label text-md-right">{{ __('Brand Logo') }}</label>

                            <div class="col-md-6">
                                <input id="file_name" type="file" class="form-control @error('image') is-invalid @enderror" name="image" value="{{ old('image') }}" required autocomplete="image" >

                                @error('filenames[]')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
						
                       
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Submit') }}
                                </button>
                            </div>
                        </div>
                    </div>
                        
                        </div>
          {!! Form::close() !!}
        </fieldset>
      </div>
    </div>
  </div>
</div>
@endsection