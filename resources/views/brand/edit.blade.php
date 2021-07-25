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
      <li><a href="#"><i class="icon-home2 position-left active"></i> Brand</a></li>
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
      <div class="pull-right"> <a class="btn btn-primary" href="{{ route('brand.index') }}"> Back</a> </div>
    </div>
    <div class="panel-body">
      <div class="row"> 
      @if (count($errors) > 0)
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
        </ul>
    </div>
	@endif
        <fieldset>
          <legend class="text-semibold"> Update Brand</legend>
<form action="{{ route('brand.update',$brand->id) }}" method="POST" enctype="multipart/form-data"> 
        @csrf
          {!! Form::model($brand, ['method' => 'PATCH','route' => ['brand.update', $brand->id]]) !!}
				<div class="row">
					<div class="col-md-6">
                        <div class="form-group row">
                            <label for="brand_name" class="col-md-4 col-form-label text-md-right">{{ __('Brand Name') }}</label>

                            <div class="col-md-6">
                                
                                {!! Form::text('brand_name', null, array('placeholder' => 'Brand Name','class' => 'form-control')) !!}

                                @error('brand_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
					{!! Form::open(array('route' => 'brand.store','method'=>'POST', 'enctype'=>'multipart/form-data')) !!}
                        <div class="form-group row">
                            
                            <label for="brand_name" class="col-md-4 col-form-label text-md-right">{{ __('Brand Logo') }}</label>
                            <div class="col-md-6">
                                <input id="file_name" type="file" class="form-control @error('image') is-invalid @enderror" name="image" value="{{ old('image') }}" required autocomplete="image" >

                                @error('image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
						</div>
              		<div class="col-md-6">
							<img src="{{asset('upload/'.$brand->file_name)}}" width="100" height="100" />
                            </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Update') }}
                                </button>
                            </div>
                        </div>
                   {!! Form::close() !!}
                        
             </div>
{!! Form::close() !!}
</form>
        </fieldset>
      </div>
    </div>
  </div>
</div>
@endsection
