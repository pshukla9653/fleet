@extends('layouts.theme')

@section('heading','Contacts')
@section('content')
<div class="row">		
    <div class="col-md-8" style="padding: 30px;">
    <a onclick="location.reload();" class="btn btn-primary"><i class="icon-reload-alt position-left"></i> Refresh @yield('heading')</a>
    <a href="{{ route('contacts.index') }}" class="btn btn-primary"><i class=" icon-list-unordered position-left"></i> Item List</a>
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

          {!! Form::model($contact, ['method' => 'PATCH','route' => ['contacts.update', $contact->id]]) !!}
<div class="row">
					<div class="col-md-6">
                        <div class="form-group row">
                            <label for="first_name" class="col-md-4 col-form-label text-md-right">{{ __('First Name') }}</label>

                            <div class="col-md-6">
                                
                                {!! Form::text('first_name', null, array('placeholder' => 'First Name','class' => 'form-control')) !!}

                                @error('first_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="last_name" class="col-md-4 col-form-label text-md-right">{{ __('Last Name') }}</label>

                            <div class="col-md-6">
                                
							{!! Form::text('last_name', null, array('placeholder' => 'Last Name','class' => 'form-control')) !!}
                                @error('last_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
						
                        <div class="form-group row">
                            <label for="jab_title" class="col-md-4 col-form-label text-md-right">{{ __('Job Title') }}</label>

                            <div class="col-md-6">
                                {!! Form::text('job_title', null, array('placeholder' => 'Job Title','class' => 'form-control')) !!}

                                @error('job_title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                {!! Form::text('email', null, array('placeholder' => 'E-Mail Address','class' => 'form-control')) !!}

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
						 <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Phone Number') }}</label>

                            <div class="col-md-6">
                                {!! Form::text('phone_number', null, array('placeholder' => 'Phone Number','class' => 'form-control')) !!}

                                @error('phone_number')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        

                       
					</div>
                    <div class="col-md-6">
                     <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Address1') }}</label>

                            <div class="col-md-6">
                                {!! Form::text('address1', null, array('placeholder' => 'Address1','class' => 'form-control')) !!}

                                @error('address1')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Address2') }}</label>

                            <div class="col-md-6">
                                {!! Form::text('address2', null, array('placeholder' => 'Address2','class' => 'form-control')) !!}

                                @error('address2')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Address3') }}</label>

                            <div class="col-md-6">
                               {!! Form::text('address3', null, array('placeholder' => 'Address3','class' => 'form-control')) !!}

                                @error('address3')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
						<div class="form-group row">
                            <label for="city" class="col-md-4 col-form-label text-md-right">{{ __('Town/City') }}</label>

                            <div class="col-md-6">
                                {!! Form::text('city', null, array('placeholder' => 'Town/City','class' => 'form-control')) !!}

                                @error('city')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="country" class="col-md-4 col-form-label text-md-right">{{ __('Country') }}</label>

                            <div class="col-md-6">
                                 {!! Form::text('country', null, array('placeholder' => 'Country','class' => 'form-control')) !!}

                                @error('country')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
<div class="form-group row">
                            <label for="post_code" class="col-md-4 col-form-label text-md-right">{{ __('Post Code') }}</label>

                            <div class="col-md-6">
                                {!! Form::text('post_code', null, array('placeholder' => 'Post Code','class' => 'form-control')) !!}

                                @error('post_code')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        
                       
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Update') }}
                                </button>
                            </div>
                        </div>
                    </div>
                        
                        </div>
{!! Form::close() !!}
      </div>
    </div>
  </div>
</div>
@endsection
